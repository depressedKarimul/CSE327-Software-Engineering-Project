<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../Styles/head_content.php'); ?>
</head>
<body class="text-gray-900">

<?php
include("../database/database.php");
session_start();

// Assuming the user is logged in and the user_id is stored in the session
$user_id = $_SESSION['user_id'];
$profilePic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'default_profile.jpg'; // Set a default image if not available

// Query to fetch user and instructor data including instructor_id
$query = "
    SELECT u.firstName, u.lastName, u.email, u.profile_pic, u.bio, i.instructor_id
    FROM User u
    LEFT JOIN Instructor i ON u.user_id = i.user_id
    WHERE u.user_id = $user_id
";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the user data
    $row = mysqli_fetch_assoc($result);
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $bio = $row['bio'];
    $instructor_id = $row['instructor_id']; // Fetching instructor_id
} else {
    echo "No data found for this user.";
    exit();
}

// Fetch all courses taught by the instructor
$courses_query = "
    SELECT title, description, category, difficulty, price 
    FROM Course 
    WHERE instructor_id = $instructor_id
";
$courses_result = mysqli_query($conn, $courses_query);
?>
<div class="font-sans antialiased text-white leading-normal tracking-wider bg-cover"
    style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');">
    <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">
        <!--Main Col-->
        <div id="profile"
            class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-[#283747] opacity-75 mx-6 lg:mx-0 h-full">
            <div class="p-4 md:p-12 text-center lg:text-left">
                <!-- Image for mobile view-->
                <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
                    style="background-image: url('../<?php echo $profile_pic; ?>')"></div>

                <h1 class="text-3xl font-bold pt-8 lg:pt-0 text-white"><?php echo $firstName . " " . $lastName; ?></h1>
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25">
                    Instructor ID: <?php echo $instructor_id ? $instructor_id : "Not yet assigned"; ?>
                </div>
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25">
                    User ID: <?php echo $user_id; ?>
                </div>
                <p class="pt-8 text-sm flex items-center justify-center lg:justify-start text-white">
                    <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M10 2a8 8 0 0 1 8 8c0 1.5-.5 2.9-1.4 4.1L12 10.3V13H8V7h5V2z"/>
                    </svg>
                    Bio: <?php echo $bio ? $bio : "No bio available."; ?>
                </p>

                <!-- Courses List -->
                <div class="pt-8 text-white">
                    <h2 class="text-lg font-bold">Courses:</h2>
                    <ul class="list-disc pl-5">
                        <?php
                        if ($courses_result && mysqli_num_rows($courses_result) > 0) {
                            while ($course = mysqli_fetch_assoc($courses_result)) {
                                echo "<li>";
                                echo "<strong>" . htmlspecialchars($course['title']) . "</strong><br>";
                                echo htmlspecialchars($course['description']) . "<br>";
                                echo "Category: " . htmlspecialchars($course['category']) . "<br>";
                                echo "Difficulty: " . htmlspecialchars($course['difficulty']) . "<br>";
                                echo "Price: $" . htmlspecialchars($course['price']) . "<br>";
                                echo "</li><br>";
                            }
                        } else {
                            echo "<li>No courses available.</li>";
                        }
                        ?>
                    </ul>
                </div>

                <div class="pt-12 pb-8">
                    <a href="mailto:<?php echo $email; ?>" class="block">
                        <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
                            Email: <?php echo $email; ?>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Img Col-->
        <div class="w-full lg:w-2/5 h-full">
        <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile" class="w-full h-full object-cover" />
        </div>
</body>
</html>
