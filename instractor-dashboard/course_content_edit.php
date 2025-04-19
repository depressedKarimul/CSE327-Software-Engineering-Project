<?php

/**
 * Edit Course Script
 *
 * This script allows instructors to edit existing course details and upload content files.
 * It verifies the instructor's access to the course and updates both course and content info.
 *
 * PHP version 8.0+
 *
 * @category CourseManagement
 * @package  CoursePlatform
 */

// Include database connection and start session
include('../database/database.php');
session_start();

$message = ""; // Message for success or failure

// Ensure the user is logged in
$user_id = $_SESSION['user_id'];

/**
 * Fetch the instructor_id associated with the logged-in user
 *
 * @var int $instructor_id
 */
// Fetch instructor_id for the logged-in user
$query = "SELECT instructor_id FROM Instructor WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$instructor_id = $row['instructor_id'];

$course_id = isset($_GET['course_id']) ? $_GET['course_id'] : null; // Get course_id from URL

// Fetch current course data for editing
$course = null;
if ($course_id) {
    // Now, use the instructor_id instead of user_id
    $course_query = "SELECT * FROM Course WHERE course_id = '$course_id' AND instructor_id = '$instructor_id'";
    $course_result = mysqli_query($conn, $course_query);
    if ($course_result && mysqli_num_rows($course_result) > 0) {
        $course = mysqli_fetch_assoc($course_result);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $course_id) {
    // Course details
    $course_title = $_POST['course_title'];
    $course_description = $_POST['course_description'];
    $category = $_POST['category'];
    $difficulty = $_POST['difficulty'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Update course details
    $update_course_query = "
        UPDATE Course SET title = '$course_title', description = '$course_description', category = '$category', difficulty = '$difficulty', price = '$price', status = '$status'
        WHERE course_id = '$course_id' AND instructor_id = '$instructor_id'
    ";

    if (mysqli_query($conn, $update_course_query)) {
        // Handle content file upload
        if (isset($_FILES["content_file"]) && $_FILES["content_file"]["error"] == 0) {
            $uploadDir = "C:/xampp/htdocs/cse311/Upload Course/"; // Ensure this folder exists
            $fileName = basename($_FILES["content_file"]["name"]);
            $targetPath = $uploadDir . $fileName;

            // Check file type
            $allowedTypes = ["mp4", "pdf", "docx", "jpg"];
            $fileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES["content_file"]["tmp_name"], $targetPath)) {
                    $contentFileUrl = "Upload Course/" . $fileName; // Save relative path

                    // Update content data in the database
                    $contentType = $_POST["content_type"];
                    $contentTitle = $_POST["content_title"];
                    $contentDuration = $_POST["content_duration"];
                    $updateContentQuery = "
                        UPDATE Course_Content SET type = '$contentType', title = '$contentTitle', file_url = '$contentFileUrl', content_duration = '$contentDuration'
                        WHERE course_id = '$course_id'
                    ";

                    if (mysqli_query($conn, $updateContentQuery)) {
                        $message = "Course and content updated successfully!";
                    } else {
                        $errors[] = "Error updating content: " . mysqli_error($conn);
                    }
                } else {
                    $errors[] = "Failed to upload content file.";
                }
            } else {
                $errors[] = "Invalid file type. Only MP4, PDF, DOCX, and JPG are allowed.";
            }
        }
    } else {
        $message = "Error updating course: " . mysqli_error($conn);
    }
}
?>

<!-- HTML form for editing the course -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../Styles/head_content.php') ?>
</head>

<body class="p-6">
    <div class="max-w-4xl mx-auto bg-[#283747] p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl text-center bg-[#1D232A] p-5 font-semibold text-white mb-6">Edit Course Content</h1>

        <?php if ($course): ?>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Course Details -->
                <div class="space-y-4">
                    <div>
                        <label for="content_file"
                            class="bg-[#34495E] text-gray-500 font-semibold text-base rounded max-w-md h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed mx-auto font-[sans-serif] relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500" viewBox="0 0 32 32">
                                <path
                                    d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                    data-original="#000000" />
                                <path
                                    d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                    data-original="#000000" />
                            </svg>
                            Upload file

                            <input type="file" id="content_file" name="content_file" class="hidden" />
                            <p id="file_name" class="text-xs font-medium text-gray-400 mt-2">VIDEO and PDF are Allowed.</p>
                        </label>
                        <script>
                            const fileInput = document.getElementById('content_file');
                            const fileNameDisplay = document.getElementById('file_name');

                            fileInput.addEventListener('change', function() {
                                if (fileInput.files.length > 0) {
                                    fileNameDisplay.textContent = `Selected: ${fileInput.files[0].name}`;
                                    fileNameDisplay.classList.add("text-green-600"); // Optional styling for success
                                }
                            });
                        </script>
                    </div>

                    <!-- Pre-fill course details for editing -->
                    <div>
                        <label for="course_title" class="block text-white">Course Title</label>
                        <input type="text" id="course_title" name="course_title" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" value="<?php echo $course['title']; ?>" required>
                    </div>

                    <div>
                        <label for="course_description" class="block text-white">Course Description</label>
                        <textarea id="course_description" name="course_description" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" rows="4" required><?php echo $course['description']; ?></textarea>
                    </div>

                    <div>
                        <label for="category" class="block text-white">Category</label>
                        <select id="category" name="category" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                            <option value="Development" <?php echo $course['category'] == 'Development' ? 'selected' : ''; ?>>Development</option>
                            <option value="IT and Software" <?php echo $course['category'] == 'IT and Software' ? 'selected' : ''; ?>>IT and Software</option>
                            <option value="Design" <?php echo $course['category'] == 'Design' ? 'selected' : ''; ?>>Design</option>
                        </select>
                    </div>

                    <div>
                        <label for="difficulty" class="block text-white">Difficulty</label>
                        <select id="difficulty" name="difficulty" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                            <option value="beginner" <?php echo $course['difficulty'] == 'beginner' ? 'selected' : ''; ?>>Beginner</option>
                            <option value="intermediate" <?php echo $course['difficulty'] == 'intermediate' ? 'selected' : ''; ?>>Intermediate</option>
                            <option value="advanced" <?php echo $course['difficulty'] == 'advanced' ? 'selected' : ''; ?>>Advanced</option>
                        </select>
                    </div>

                    <div>
                        <label for="price" class="block text-white">Price</label>
                        <input type="number" step="0.01" id="price" name="price" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" value="<?php echo $course['price']; ?>" required>
                    </div>

                    <div>
                        <label for="status" class="block text-white">Status</label>
                        <select id="status" name="status" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                            <option value="active" <?php echo $course['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                            <option value="inactive" <?php echo $course['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </div>

                    <!-- Add content type, title, and duration fields -->
                    <div>
                        <label for="content_type" class="block text-white">Content Type</label>
                        <select id="content_type" name="content_type" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                            <option value="video" <?php echo isset($_POST['content_type']) && $_POST['content_type'] == 'video' ? 'selected' : ''; ?>>Video</option>
                            <option value="article" <?php echo isset($_POST['content_type']) && $_POST['content_type'] == 'article' ? 'selected' : ''; ?>>Article</option>
                            <option value="quiz" <?php echo isset($_POST['content_type']) && $_POST['content_type'] == 'quiz' ? 'selected' : ''; ?>>Quiz</option>
                        </select>
                    </div>

                    <div>
                        <label for="content_title" class="block text-white">Content Title</label>
                        <input type="text" id="content_title" name="content_title" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" value="<?php echo isset($_POST['content_title']) ? $_POST['content_title'] : ''; ?>">
                    </div>

                    <div>
                        <label for="content_duration" class="block text-white">Content Duration (hh:mm:ss)</label>
                        <input type="text" id="content_duration" name="content_duration" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" value="<?php echo isset($_POST['content_duration']) ? $_POST['content_duration'] : ''; ?>">
                    </div>

                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-[#40d838eb] text-white p-3 rounded-lg">Save Changes</button>
                </div>

                <?php
                if ($message) {
                    echo "<p class='text-green-500 text-center'>$message</p>";
                }
                ?>

            </form>

        <?php else: ?>
            <p class="text-center text-red-600">Course not found or you do not have permission to edit this course.</p>
        <?php endif; ?>
    </div>
</body>

</html>