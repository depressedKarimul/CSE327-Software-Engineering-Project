<?php
include('../database/database.php');
session_start();

$message = "";
$errors = [];

$user_id = $_SESSION['user_id'];

$query = "SELECT instructor_id FROM Instructor WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$instructor_id = $row['instructor_id'];

$course_id = $_GET['course_id'] ?? null;
$course = null;

if ($course_id) {
    $course_query = "SELECT * FROM Course WHERE course_id = '$course_id' AND instructor_id = '$instructor_id'";
    $course_result = mysqli_query($conn, $course_query);
    if ($course_result && mysqli_num_rows($course_result) > 0) {
        $course = mysqli_fetch_assoc($course_result);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $course_id) {
    $course_title = $_POST['course_title'];
    $course_description = $_POST['course_description'];
    $category = $_POST['category'];
    $difficulty = $_POST['difficulty'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $update_course_query = "
        UPDATE Course SET title = '$course_title', description = '$course_description', category = '$category', difficulty = '$difficulty', price = '$price', status = '$status'
        WHERE course_id = '$course_id' AND instructor_id = '$instructor_id'
    ";

    if (mysqli_query($conn, $update_course_query)) {
        if (isset($_FILES["content_file"]) && $_FILES["content_file"]["error"] == 0) {
            $uploadDir = "C:/xampp/htdocs/cse311/Upload Course/";
            $fileName = basename($_FILES["content_file"]["name"]);
            $targetPath = $uploadDir . $fileName;

            $allowedTypes = ["mp4", "pdf", "docx", "jpg"];
            $fileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES["content_file"]["tmp_name"], $targetPath)) {
                    $contentFileUrl = "Upload Course/" . $fileName;

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
                $errors[] = "Invalid file type.";
            }
        }
    } else {
        $message = "Error updating course: " . mysqli_error($conn);
    }
}

// You can return $message, $errors, and $course as needed for the frontend
?>
