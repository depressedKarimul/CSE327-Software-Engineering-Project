



<?php
// Include database configuration
include('database.php');
session_start();

$message = ""; // For success/error messages

// Assuming the user is logged in, and the user_id is stored in the session
$user_id = $_SESSION['user_id'];

$query = "SELECT instructor_id FROM Instructor WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$instructor_id = $row['instructor_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_title = $_POST['course_title'];
    $course_description = $_POST['course_description'];
    $category = $_POST['category'];
    $difficulty = $_POST['difficulty'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $insert_course_query = "
        INSERT INTO Course (instructor_id, title, description, category, difficulty, price, status)
        VALUES ('$instructor_id', '$course_title', '$course_description', '$category', '$difficulty', '$price', '$status')
    ";
    
    if (mysqli_query($conn, $insert_course_query)) {
        $course_id = mysqli_insert_id($conn);

 // Handle content file upload
$contentFileUrl = "";
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

            // Insert content data into the database
            $contentType = $_POST["content_type"];
            $contentTitle = $_POST["content_title"];
            $contentDuration = $_POST["content_duration"];
            $insertContentQuery = "
                INSERT INTO Course_Content (course_id, type, title, file_url, content_duration)
                VALUES ('$course_id', '$contentType', '$contentTitle', '$contentFileUrl', '$contentDuration')
            ";

            if (mysqli_query($conn, $insertContentQuery)) {
                $message = "Course and content uploaded successfully!";
            } else {
                $errors[] = "Error saving content: " . mysqli_error($conn);
            }
        } else {
            $errors[] = "Failed to upload content file.";
        }
    } else {
        $errors[] = "Invalid file type. Only MP4, PDF, DOCX, and JPG are allowed.";
    }
}


        $category_query = "SELECT * FROM Category WHERE category_name = '$category'";
        $category_result = mysqli_query($conn, $category_query);
        if (mysqli_num_rows($category_result) == 0) {
            $insert_category_query = "INSERT INTO Category (category_name) VALUES ('$category')";
            mysqli_query($conn, $insert_category_query);
        }

        $post_text = "Discussion for course: $course_title";
        $post_date = date('Y-m-d');
        $insert_post_query = "
            INSERT INTO Forum_Post (course_id, user_id, post_text, post_date)
            VALUES ('$course_id', '$user_id', '$post_text', '$post_date')
        ";
        if (mysqli_query($conn, $insert_post_query)) {
            $message .= " Forum post created!";
        } else {
            $message .= " Error creating forum post: " . mysqli_error($conn);
        }

    } else {
        $message = "Error creating course: " . mysqli_error($conn);
    }
}
?>


<!-- HTML form for uploading the course -->
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('head_content.php') ?>
</head>
<body class="p-6">
    <div class="max-w-4xl mx-auto bg-[#283747] p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl text-center bg-[#1D232A] p-5 font-semibold text-white mb-6">Upload Course Content</h1>

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

                        <input type="file" id="content_file" name="content_file" required class="hidden" />
                        <p id="file_name" class="text-xs font-medium text-gray-400 mt-2">VIDEO and PDF are Allowed.</p>
                    </label>
                    <script>
                        const fileInput = document.getElementById('content_file');
                        const fileNameDisplay = document.getElementById('file_name');

                        fileInput.addEventListener('change', function () {
                            if (fileInput.files.length > 0) {
                                fileNameDisplay.textContent = `Selected: ${fileInput.files[0].name}`;
                                fileNameDisplay.classList.add("text-green-600"); // Optional styling for success
                            }
                        });
                    </script>
                </div>
                <div>
                    <label for="course_title" class="block text-white">Course Title</label>
                    <input type="text" id="course_title" name="course_title" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                </div>

                <div>
                    <label for="course_description" class="block text-white">Course Description</label>
                    <textarea id="course_description" name="course_description" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" rows="4" required></textarea>
                </div>

                <div>
                    <label for="category" class="block text-white">Category</label>
                    <select id="category" name="category" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                        <option value="" disabled selected>Select Category</option>
                        <option value="Development">Development</option>
                        <option value="IT and Software">IT and Software</option>
                        <option value="Design">Design</option>
                    </select>
                </div>

                <div>
                    <label for="difficulty" class="block text-white">Difficulty</label>
                    <select id="difficulty" name="difficulty" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>

                <div>
                    <label for="price" class="block text-white">Price</label>
                    <input type="number" step="0.01" id="price" name="price" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                </div>

                <div>
                    <label for="status" class="block text-white">Status</label>
                    <select id="status" name="status" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <h2 class="text-xl font-semibold text-white mt-8 mb-4">Upload Course Content</h2>

                <div>
                    <label for="content_type" class="block text-white">Content Type</label>
                    <select id="content_type" name="content_type" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                        <option value="video">Video</option>
                        <option value="article">Article</option>
                        <option value="quiz">Quiz</option>
                    </select>
                </div>

                <div>
                    <label for="content_title" class="block text-white">Content Title</label>
                    <input type="text" id="content_title" name="content_title" class="w-full p-3 border rounded-lg bg-[#34495E] text-white" required>
                </div>

                <div>
                    <label for="content_duration" class="block text-white">Content Duration (e.g., 01:30:00)</label>
                    <input type="text" id="content_duration" name="content_duration" class="w-full p-3 border rounded-lg bg-[#34495E] text-white">
                </div>
            </div>

            <?php if ($message): ?>
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded m-10"><?php echo $message; ?></div>
            <?php endif; ?>

            <button type="submit" class="w-full mt-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-[black] hover:text-green-400">Upload Course</button>
        </form>
    </div>
</body>

</html>
