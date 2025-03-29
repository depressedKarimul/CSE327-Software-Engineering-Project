<?php
session_start();

if(isset($_POST['otp'])){
    if(isset($_SESSION['otp']) && $_POST['otp'] == $_SESSION['otp']){
        unset($_SESSION['otp']);
        echo "<script>alert('OTP Verified Successfully!'); window.location.href='../forget-password/Forgotten_password.php';</script>";

        exit();
    } else {
        echo "<script>alert('Invalid OTP! Try Again.'); window.location.href='verify_otp.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('https://www1.lovethatdesign.com/wp-content/uploads/2019/03/Love-that-Design-NOVO-01.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-black bg-opacity-50">
    <div class="bg-white bg-opacity-20 backdrop-blur-md p-8 rounded-2xl shadow-lg w-96 border border-blue-500">
        <h2 class="text-white text-2xl font-semibold text-center mb-4">Verify OTP</h2>
        <form method="post" class="flex flex-col space-y-4">
            <label for="otp" class="text-white">Enter OTP:</label>
            <input type="text" name="otp" required class="px-4 py-2 rounded-lg bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold transition">Verify</button>
        </form>
    </div>
</body>
</html>
