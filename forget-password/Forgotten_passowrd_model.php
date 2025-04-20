<?php
/**
 * Password Reset Script
 * 
 * This script allows users to reset their password after verifying their email.
 * It checks password length, ensures passwords match, and updates the database accordingly.
 *
 * PHP version 7.4+
 *
 * @category Authentication
 * @package  SkillPro
 * @author   karimul
 * @license  MIT License
 * @link     YourWebsite.com
 */

// Include database connection
require_once "../database/database.php";

$message = ""; // Initialize an empty message variable

/**
 * Handles password reset request
 * 
 * @return void
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    } elseif (strlen($password) < 8) {
        // Check if the password is at least 8 characters long
        $message = "Password must be at least 8 characters!";
    } else {
        // Check if the user exists and is either a student or instructor
        $query = "SELECT role FROM User WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $message = "No user found with this email address!";
        } else {
            $user = $result->fetch_assoc();
            if ($user['role'] === 'admin') {
                $message = "Admins cannot reset their password via this method!";
            } else {
                // Update the user's password
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $update_query = "UPDATE User SET password = ? WHERE email = ?";
                $update_stmt = $conn->prepare($update_query);
                $update_stmt->bind_param("ss", $hashed_password, $email);

                if ($update_stmt->execute()) {
                    $message = "Password updated successfully!";
                    header("Location: login.php");
                    exit;
                } else {
                    $message = "Error updating password: " . $conn->error;
                }
            }
        }
    }
}
?>