<?php
include('../database/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the course_id from the form submission
    $course_id = $_POST['course_id'];

    // Query to delete the course from the Course table
    $delete_course_sql = "DELETE FROM Course WHERE course_id = ?";
    $stmt = $conn->prepare($delete_course_sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();

    // Redirect back to admin.php with a success or failure message
    if ($stmt->affected_rows > 0) {
        header("Location: admin.php?message=Course deleted successfully");
    } else {
        header("Location: admin.php?message=Failed to delete course");
    }

    $stmt->close();
    $conn->close();
}
?>
