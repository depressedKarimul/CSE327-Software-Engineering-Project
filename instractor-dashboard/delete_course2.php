<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login-signup/login.php");
    exit();
}

// Fetch the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Include the database connection
include('../database/database.php');

// Check if the course_id is set in the request
if (isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];

    // Fetch the instructor ID of the logged-in user
    $query_instructor = "SELECT instructor_id FROM Instructor WHERE user_id = ?";
    $stmt_instructor = $conn->prepare($query_instructor);
    $stmt_instructor->bind_param("i", $user_id);
    $stmt_instructor->execute();
    $result_instructor = $stmt_instructor->get_result();
    $instructor = $result_instructor->fetch_assoc();

    if (!$instructor) {
        echo "No instructor profile found.";
        exit();
    }

    $instructor_id = $instructor['instructor_id'];

    // Check if the course belongs to the logged-in instructor
    $query_course = "SELECT * FROM Course WHERE course_id = ? AND instructor_id = ?";
    $stmt_course = $conn->prepare($query_course);
    $stmt_course->bind_param("ii", $course_id, $instructor_id);
    $stmt_course->execute();
    $result_course = $stmt_course->get_result();

    if ($result_course->num_rows == 0) {
        echo "You do not have permission to delete this course.";
        exit();
    }

    // Delete related content (video)
    $query_content = "DELETE FROM Course_Content WHERE course_id = ?";
    $stmt_content = $conn->prepare($query_content);
    $stmt_content->bind_param("i", $course_id);
    $stmt_content->execute();

    // Delete the course itself
    $query_delete_course = "DELETE FROM Course WHERE course_id = ?";
    $stmt_delete_course = $conn->prepare($query_delete_course);
    $stmt_delete_course->bind_param("i", $course_id);
    $stmt_delete_course->execute();

    // Check if the course was successfully deleted
    if ($stmt_delete_course->affected_rows > 0) {
        echo "Course deleted successfully.";
        header("Location: edit_course.php"); // Redirect back to the course management page
        exit();
    } else {
        echo "Error deleting course.";
    }
} else {
    echo "No course selected to delete.";
}
?>
