<?php
require_once __DIR__ . '/../database/database.php';


function resetPassword($email, $password, $confirm_password, $conn) {
    $message = "";

    // Check if passwords match
    if ($password !== $confirm_password) {
        return "Passwords do not match!";
    } elseif (strlen($password) < 8) {
        // Check if the password is at least 8 characters long
        return "Password must be at least 8 characters!";
    } else {
        // Check if the user exists and is either a student or instructor
        $query = "SELECT role FROM User WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return "No user found with this email address!";
        } else {
            $user = $result->fetch_assoc();
            if ($user['role'] === 'admin') {
                return "Admins cannot reset their password via this method!";
            } else {
                // Update the user's password
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $update_query = "UPDATE User SET password = ? WHERE email = ?";
                $update_stmt = $conn->prepare($update_query);
                $update_stmt->bind_param("ss", $hashed_password, $email);

                if ($update_stmt->execute()) {
                    return "Password updated successfully!";
                } else {
                    return "Error updating password: " . $conn->error;
                }
            }
        }
    }
}
?>
