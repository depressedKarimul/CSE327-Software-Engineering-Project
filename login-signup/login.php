<?php
/**
 * SkillPro - User Authentication Script
 * 
 * This script handles user login, authentication, and redirection based on user roles.
 * It verifies the email and password against the database and sets session variables accordingly.
 *
 * PHP version 7+
 *
 * @category Authentication
 * @package  SkillPro
 * @author   Karimul
 * @license  MIT License
 * @link     yourwebsite.com
 */

session_start();
include("../database/database.php");

$error = "";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and retrieve user inputs
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"]); // Trim whitespace

    /**
     * Prepare SQL statement to fetch user details
     *
     * @var string $sql SQL query
     */
    $sql = "SELECT * FROM User WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Check if the instructor is approved
            if ($user['role'] === 'instructor' && ($user['is_approved'] === NULL || $user['is_approved'] === 0)) {
                $error = "Your account is not yet approved.";
            } else {
                // Store user details in session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['profile_pic'] = $user['profile_pic'] ?: 'default.png'; // Default image

                /**
                 * Redirect user based on role
                 */
                switch ($user['role']) {
                    case 'instructor':
                        header("Location: instructor.php");
                        exit();
                    case 'student':
                        header("Location: student.php");
                        exit();
                    case 'admin':
                        header("Location: admin.php");
                        exit();
                    default:
                        $error = "Invalid role specified.";
                }
            }
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "No user found with this email.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skill Pro</title>
  <link rel="stylesheet" href="Styles/Nav.css">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.13/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Styles/Nav.css">
</head>
<body>
  <div class="flex items-center justify-center min-h-screen bg-[url('https://www1.lovethatdesign.com/wp-content/uploads/2019/03/Love-that-Design-NOVO-01.jpg')] bg-cover bg-center h-64 w-full">
    <div class="flex flex-col md:flex-row items-center md:items-start space-y-10 md:space-y-0 md:space-x-16">
      <div class="text-center md:text-left">
        <h1 class="text-blue-300 text-4xl font-bold text-center lg:mt-10 title">SkillPro</h1>
        <p class="text-blue-300 text-xl mt-2 text-center peregraph">SkillPro is an online platform providing top-tier computer science courses.</p>
      </div>
      <div id="profile-card" class="bg-blue-300 p-6 rounded-md shadow-md w-96">
        <form class="space-y-4" method="POST">
          <div>
            <input type="text" name="email" placeholder="Email address" class="w-full p-2 border bg-blue-200 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <input type="password" name="password" placeholder="Password" class="w-full p-2 border bg-blue-200 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md font-bold hover:bg-black">Log in</button>
          </div>
          <div class="text-center">
            <a href="Forgotten_password.php" class="text-blue-600 hover:underline">Forgotten password?</a>
          </div>
          <hr class="my-4">
          <div class="text-center">
            <button class="w-full bg-blue-500 text-white py-2 rounded-md font-bold hover:bg-black"><a href="Register.php">Create new account</a></button>
          </div>
          <?php if (!empty($error)): ?>
          <div class="mt-4 text-red-500 text-center">
            <p><?= htmlspecialchars($error) ?></p>
          </div>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
