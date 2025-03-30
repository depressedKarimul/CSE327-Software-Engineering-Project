<?php
session_start();
include('smtp/PHPMailerAutoload.php');

if(isset($_POST['email'])){
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $_POST['email'];
    
    $receiverEmail = $_POST['email'];
    $subject = "Email Verification";
    $emailbody = "Your 6 Digit OTP Code: $otp";

    if(smtp_mailer($receiverEmail, $subject, $emailbody)){
        echo "OTP has been sent to your email.";
        echo "<script>window.location.href='verify_otp.php';</script>";
        exit();
    } else {
        echo "Failed to send OTP. Try again.";
    }
}

function smtp_mailer($to, $subject, $msg){
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "karimul.hassan@northsouth.edu"; // Change this
    $mail->Password = "atuc wede qfvl xwae"; // Change this
    $mail->SetFrom("karimul.hassan@northsouth.edu");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    return $mail->Send();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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
        <h2 class="text-white text-2xl font-semibold text-center mb-4">Enter your email to receive OTP</h2>
        <form method="post" class="flex flex-col space-y-4">
            <input type="email" name="email" placeholder="Enter Email" required class="px-4 py-2 rounded-lg bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold transition">Send OTP</button>
        </form>
    </div>
</body>
</html>


