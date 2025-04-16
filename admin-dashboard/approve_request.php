<?php
/**
 * Admin Instructor Approval Page
 *
 * This script allows admin users to approve or reject pending instructor requests.
 * It performs the following:
 * - Verifies if the user is an admin
 * - Processes form submission for approval or rejection
 * - Updates the Instructor_Approval, Instructor, and User tables accordingly
 * - Displays pending instructor requests with action buttons
 *
 * PHP version 8.2
 *
 * @category Admin
 * @package  SkillProPlatform
 * @author   ramishaa
 * @license  MIT License
 * @link     https://example.com
 */

session_start();

// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Include the database connection file
include_once '../database/database.php';

/**
 * Handles the approval or rejection of instructor requests.
 *
 * Processes form submission based on 'approve' or 'reject' action:
 * - Approve:
 *    - Inserts into Instructor_Approval
 *    - Adds user to Instructor table
 *    - Updates User table (is_approved = 1)
 * - Reject:
 *    - Inserts into Instructor_Approval
 *    - Deletes user from User table
 *
 * Sets a session message on success or failure.
 *
 * @global int $_SESSION['user_id'] The ID of the admin
 * @global string $_SESSION['role'] The role of the user (must be 'admin')
 * @global mysqli $conn The MySQLi connection object
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action']; // 'approve' or 'reject'
    $user_id = intval($_POST['user_id']);
    $admin_id = $_SESSION['user_id'];

    $approval_status = ($action === 'approve') ? 'approved' : 'rejected';
    $approval_date = date('Y-m-d');

    $approval_query = "INSERT INTO Instructor_Approval (admin_id, user_id, approval_status, approval_date) 
                       VALUES (?, ?, ?, ?)";
    $approval_stmt = $conn->prepare($approval_query);
    $approval_stmt->bind_param("iiss", $admin_id, $user_id, $approval_status, $approval_date);

    if ($approval_stmt->execute()) {
        if ($action === 'approve') {
            $instructor_query = "INSERT INTO Instructor (user_id) VALUES (?)";
            $instructor_stmt = $conn->prepare($instructor_query);
            $instructor_stmt->bind_param("i", $user_id);

            if ($instructor_stmt->execute()) {
                $update_user_query = "UPDATE User SET is_approved = 1 WHERE user_id = ?";
                $update_user_stmt = $conn->prepare($update_user_query);
                $update_user_stmt->bind_param("i", $user_id);

                if ($update_user_stmt->execute()) {
                    $_SESSION['message'] = "User has been approved and added as an instructor successfully!";
                } else {
                    $_SESSION['error'] = "Failed to update user approval status. Please try again.";
                }

                $update_user_stmt->close();
            } else {
                $_SESSION['error'] = "Failed to add user as an instructor. Please try again.";
            }

            $instructor_stmt->close();
        } elseif ($action === 'reject') {
            $query = "DELETE FROM User WHERE user_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $user_id);

            if ($stmt->execute()) {
                $_SESSION['message'] = "User has been rejected successfully!";
            } else {
                $_SESSION['error'] = "Failed to reject the user. Please try again.";
            }

            $stmt->close();
        }
    } else {
        $_SESSION['error'] = "Failed to record approval status. Please try again.";
    }

    $approval_stmt->close();
    header('Location: approve_request.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../Styles/head_content.php') ?>
</head>
<body>
    <main class="min-h-screen p-5">
        <h2 class="text-center text-4xl text-white bg-[#283747] p-5 font-extrabold rounded-md">
            Authorize Instructor Requests
        </h2>

        <div class="container mx-auto mt-10">
            <!-- Display success or error messages -->
            <?php if (isset($_SESSION['message'])): ?>
                <div class="bg-green-100 text-green-700 p-4 rounded mb-5">
                    <?= htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 text-red-700 p-4 rounded mb-5">
                    <?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <!-- Fetch pending instructor requests -->
            <?php
            $query = "SELECT * FROM User WHERE role = 'instructor' AND NOT EXISTS (
                        SELECT 1 FROM Instructor WHERE Instructor.user_id = User.user_id)";
            $result = $conn->query($query);
            ?>

            <?php if ($result->num_rows === 0): ?>
                <p class="text-center text-white text-lg font-semibold">
                    No pending instructor requests at the moment.
                </p>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="bg-[#283747] shadow-md rounded-lg p-5">
                            <div class="flex items-center space-x-4">
                                <img 
                                    src="<?= htmlspecialchars($row['profile_pic']) ?>" 
                                    alt="Profile Picture" 
                                    class="w-20 h-20 rounded-full border-2 border-blue-500">
                                <div>
                                    <h3 class="text-xl font-bold"><?= htmlspecialchars($row['firstName'] . ' ' . $row['lastName']) ?></h3>
                                    <p class="text-sm text-white">Email: <?= htmlspecialchars($row['email']) ?></p>
                                    <p class="text-sm text-white">Bio: <?= htmlspecialchars($row['bio']) ?></p>
                                </div>
                            </div>
                            <div class="mt-4 flex gap-4">
                                <!-- Approve Form -->
                                <form action="approve_request.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
                                    <button 
                                        type="submit" 
                                        name="action" 
                                        value="approve" 
                                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                        Approve
                                    </button>
                                </form>
                                <!-- Reject Form -->
                                <form action="approve_request.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
                                    <button 
                                        type="submit" 
                                        name="action" 
                                        value="reject" 
                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                        Reject
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <?php $conn->close(); ?>
        </div>
    </main>
</body>
</html>
