<?php
session_start();
include("database.php");
$errors = [];
$successMessage = "";

// Check if the user is logged in (optional, depending on your system)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

$userId = $_SESSION['user_id']; // Get the logged-in user's ID from session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $currentPassword = $_POST["currentPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validate input
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($currentPassword)) {
        $errors[] = "Current password is required.";
    }
    if (empty($confirmPassword)) {
        $errors[] = "Confirm password is required.";
    }
    if ($currentPassword !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // Check if there are no errors before proceeding
    if (empty($errors)) {
        // Get user information from the database
        $query = "SELECT email, password FROM User WHERE user_id = '$userId'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            // Verify if the email matches and the password is correct
            if ($email === $user['email'] && password_verify($currentPassword, $user['password'])) {
                // Delete the account (only for the logged-in user)
                $deleteQuery = "DELETE FROM User WHERE user_id = '$userId'";
                if (mysqli_query($conn, $deleteQuery)) {
                    // Log the user out
                    session_destroy();
                    header("Location: login.php"); // Redirect after deletion
                    exit();
                } else {
                    $errors[] = "Error deleting account. Please try again.";
                }
            } else {
                $errors[] = "Email or password is incorrect.";
            }
        } else {
            $errors[] = "User not found.";
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
   <?php include('head_content.php') ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('https://img.freepik.com/free-vector/gradient-hexagonal-background_23-2148962038.jpg?t=st=1732254017~exp=1732257617~hmac=8b3eef7f28c93fe59cd257cef8d39bbfa00e6720d7357160568a15b2e303c2e7&w=996');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-3xl bg-[#cb4335] bg-opacity-70 border-2 border-white rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Delete Your SkillPro Account</h2>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="space-y-6">
            <div>
                <label for="email" class="block text-white font-medium">Email</label>
                <input type="email" name="email" id="email" 
                    class="w-full px-4 py-3 border border-white bg-transparent text-white rounded-md placeholder-gray-300 focus:outline-none focus:ring focus:ring-white">
            </div>
            <div>
                <label for="currentPassword" class="block text-white font-medium">Current Password</label>
                <input type="password" name="currentPassword" id="currentPassword" 
                    class="w-full px-4 py-3 border border-white bg-transparent text-white rounded-md placeholder-gray-300 focus:outline-none focus:ring focus:ring-white">
            </div>
            <div>
                <label for="confirmPassword" class="block text-white font-medium">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" 
                    class="w-full px-4 py-3 border border-white bg-transparent text-white rounded-md placeholder-gray-300 focus:outline-none focus:ring focus:ring-white">
            </div>
            <div>
                <button type="submit" 
                    name="submit" class="w-full px-6 py-3 text-lg font-medium text-[white] bg-[#ff3701] rounded-md hover:bg-[black] hover:text-[red] focus:outline-none focus:ring focus:ring-blue-300 mt-2">
                    Permanently Delete Your SkillPro Account
                </button>
            </div>

            <!-- Success and Error Messages -->
            <?php if (!empty($successMessage)): ?>
                <div class="mt-4 text-green-500">
                    <p><?= $successMessage ?></p>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="mt-4 text-red-500">
                    <?php foreach ($errors as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
