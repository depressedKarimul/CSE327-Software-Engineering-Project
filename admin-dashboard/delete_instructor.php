<?php
include('../database/database.php');

// Check if user_id is provided
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Start a transaction to ensure everything is handled safely
    $conn->begin_transaction();

    try {
        // Delete courses associated with the instructor first (optional, depending on your requirements)
        $delete_courses_sql = "DELETE FROM Course WHERE instructor_id = (SELECT instructor_id FROM Instructor WHERE user_id = ?)";
        $stmt = $conn->prepare($delete_courses_sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();

        // Delete the instructor record from the User table
        $delete_user_sql = "DELETE FROM User WHERE user_id = ?";
        $stmt = $conn->prepare($delete_user_sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();

        // Commit the transaction
        $conn->commit();

        // Redirect back to the admin page after successful deletion
        header("Location: admin.php?message=Instructor deleted successfully.");
        exit();
    } catch (Exception $e) {
        // Rollback if anything goes wrong
        $conn->rollback();
        // Handle the error (optional)
        echo "Error: " . $e->getMessage();
    }
}
?>
