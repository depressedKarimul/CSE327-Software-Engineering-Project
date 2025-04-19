<?php
session_start();
include("database.php");

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch the current user's data from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM User WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle form submission (update data)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $password = $_POST["password"];
    $bio = $_POST["bio"];
    $profilePic = $user['profile_pic']; // Default to current profile picture

    // Handle file upload for profile picture
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $fileName = $_FILES['profile_pic']['name'];
        $fileTmp = $_FILES['profile_pic']['tmp_name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid('profile_', true) . '.' . $fileExt;
        $uploadDir = 'uploads/profile_pics/';

        // Check file size (limit to 2MB)
        if ($_FILES['profile_pic']['size'] > 2097152) {
            $error = "File size exceeds the 2MB limit.";
        } else {
            // Ensure the directory exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Create the directory if it doesn't exist
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmp, $uploadDir . $newFileName)) {
                $profilePic = $uploadDir . $newFileName;
            } else {
                $error = "Failed to upload the file.";
            }
        }
    }

    // If the password is not empty, hash it
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        // If no new password is provided, keep the old password
        $password = $user['password'];
    }

    // Update user information in the database
    $sql = "UPDATE User SET firstName = ?, lastName = ?, password = ?, profile_pic = ?, bio = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $firstName, $lastName, $password, $profilePic, $bio, $user_id);

    if ($stmt->execute()) {
        // Redirect after successful update
        header("Location: student.php");
        exit();
    } else {
        $error = "Failed to update information.";
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head_content.php'); ?>
</head>

<style>
    body {
        background-image: url('https://img.freepik.com/free-photo/blue-hex-backgrounds-networking_23-2149755770.jpg?t=st=1732244570~exp=1732248170~hmac=2371a728fb8b4c91ed7efe1a2320adef1a45def4f293e4cda80a625c7b6936d0&w=1060');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-3xl bg-blue-950 bg-opacity-70 border-2 border-white rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Update Your Information</h2>

        <?php if (isset($error)) { ?>
            <div class="text-red-500 mb-4"><?php echo $error; ?></div>
        <?php } ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="firstName" class="block text-white font-medium">First Name</label>
                <input type="text" name="firstName" id="firstName" value="<?php echo htmlspecialchars($user['firstName']); ?>"
                    class="w-full px-4 py-3 border border-white bg-transparent text-white rounded-md placeholder-gray-300 focus:outline-none focus:ring focus:ring-white">
            </div>
            <div>
                <label for="lastName" class="block text-white font-medium">Last Name</label>
                <input type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($user['lastName']); ?>"
                    class="w-full px-4 py-3 border border-white bg-transparent text-white rounded-md placeholder-gray-300 focus:outline-none focus:ring focus:ring-white">
            </div>

            <div>
                <label for="password" class="block text-white font-medium">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-3 border border-white bg-transparent text-white rounded-md placeholder-gray-300 focus:outline-none focus:ring focus:ring-white">
            </div>

            <div>
                <label for="profile_pic" class="block text-white font-medium">Profile Picture</label>
                <input type="file" name="profile_pic" id="profile_pic"
                    class="w-full px-4 py-3 border border-white bg-transparent text-white rounded-md focus:outline-none focus:ring focus:ring-white">
                <div class="mt-2 text-white">Current Profile Picture:</div>
                <img src="<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Image" class="w-20 h-20 object-cover rounded-full mt-2">
            </div>

            <div>
                <label for="bio" class="block text-white font-medium">Bio</label>
                <textarea name="bio" id="bio" rows="4"
                    class="w-full px-4 py-3 border border-white bg-transparent text-white rounded-md placeholder-gray-300 focus:outline-none focus:ring focus:ring-white"><?php echo htmlspecialchars($user['bio']); ?></textarea>
            </div>

            <div>
                <button type="submit" name="submit" class="w-full px-6 py-3 text-lg font-medium text-blue-500 bg-white rounded-md hover:bg-[#6dff3a] hover:text-white focus:outline-none focus:ring focus:ring-blue-300">
                    Update
                </button>
            </div>

            <div>
                <form action="delete_account.php" method="POST">
                    <button type="submit" name="submit" class="w-full px-6 py-3 text-lg font-medium text-[white] bg-[#ff3701] rounded-md hover:bg-[black] hover:text-[red] focus:outline-none focus:ring focus:ring-blue-300 mt-2">
                        <a href="delete_account.php">Permanently Delete Your SkillPro Account</a>
                    </button>
                </form>
            </div>

        </form>
    </div>
</body>

</html>
