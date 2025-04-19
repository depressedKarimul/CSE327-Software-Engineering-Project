<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login-signup/login.php");
    exit();
}

// Fetch the profile picture from session
$profilePic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'default_profile.jpg'; // Set a default image if not available
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <?php
  include('../Styles/head_content.php')
 ?>


</head>
<body>


<header>
      <!-- Navigation -->
      <nav id="navigation">
        <div class="navbar bg-black">
          <div class="navbar-start">
            <!-- Dropdown menu -->
            <div class="dropdown">
              <div tabindex="0" role="button" class="hidden btn btn-ghost btn-circle">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h7"
                  />
                </svg>
              </div>
              <ul
                tabindex="0"
                class="hidden menu menu-sm dropdown-content bg-black rounded-box z-[1] mt-3 w-52 p-2 shadow"
              >
                <li><a>Homepage</a></li>
                <li><a>Portfolio</a></li>
                <li><a>About</a></li>
              </ul>
            </div>
          </div>

          <div class="navbar-center">
            <a class="btn btn-ghost text-xl">SkillPro</a>
          </div>

          <div class="navbar-end">
            <!-- Search button and input field -->
           
  <!-- Search form with button and input field -->
  <form action="search.php" method="GET" class="relative">
    <button id="search-btn" type="button" class="btn btn-ghost btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>
    <input
        id="search-input"
        type="text"
        name="query"
        placeholder="Search..."
        class="hidden absolute right-0 bg-black text-white rounded-md p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out"
        style="width: 150px"
    />
    <input type="hidden" name="sort" value="<?php echo isset($_GET['sort']) ? htmlspecialchars($_GET['sort']) : 'asc'; ?>" />
</form>

</div>

<script>
  // Toggle visibility of the search input when the search button is clicked
  document.getElementById("search-btn").addEventListener("click", function () {
    const searchInput = document.getElementById("search-input");
    searchInput.classList.toggle("hidden");
    searchInput.focus();
});

document.getElementById("search-input").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        // Add or update the sort parameter if necessary
        const form = document.querySelector("form");
        if (!form.querySelector('input[name="sort"]')) {
            const sortInput = document.createElement("input");
            sortInput.type = "hidden";
            sortInput.name = "sort";
            sortInput.value = "asc"; // Default value, adjust as needed
            form.appendChild(sortInput);
        }
        form.submit();
    }
});
</script>


            <!-- Notification button -->
            <button class="btn btn-ghost btn-circle">
              <div class="indicator">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                  />
                </svg>
                <span
                  class="badge badge-xs badge-primary indicator-item"
                ></span>
              </div>
            </button>
          </div>
        </div>

       

        <div class="navbar relative z-50">
          <div class="navbar-start">
            <!-- Dropdown menu and brand -->
            <div class="dropdown">
              <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h8m-8 6h16"
                  />
                </svg>
              </div>
              <ul
                tabindex="0"
                class="menu menu-sm dropdown-content rounded-box z-[1] mt-3 w-52 p-2 shadow bg-black text-white"
              >
                <li><a>Home</a></li>

                <li>
                  <a>Development</a>
                  
                </li>

                <li>
                  <a>IT & Software</a>
                  
                </li>

                <li>
                  <a>Design</a>
                  
                </li>

                <li><a href="all_instructor.php">Instructors</a></li>
               
                
              </ul>
            </div>

            <label class="flex cursor-pointer gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <circle cx="12" cy="12" r="5" />
                <path
                  d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"
                />
              </svg>
              <input
                type="checkbox"
                value="synthwave"
                class="toggle theme-controller"
              />
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path
                  d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"
                ></path>
              </svg>
            </label>
          </div>

          <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
              <li class="mark"><a>Home</a></li>
              <li>
                <a href="">Development</a>
              </li>
              <li>
               <a href=""> IT & Software</a>
              </li>

              <li>
               <a href=""> Design</a>
                 
              </li>

              <li><a href="all_instructor.php">Instructors</a></li>
              
            </ul>
          </div>

          
  <!-- Profile Image Button -->
  <div class="navbar-end">
                <!-- Profile Image Button -->
                <button id="profile-btn" class="rounded-full w-10 h-10 mr-10 overflow-hidden focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile" class="w-full h-full object-cover" />
                </button>

  <!-- Dropdown Menu -->
  <div
    id="dropdown-menu"
    class="hidden absolute right-0 mt-2 w-40 bg-[#021e3b] rounded-md shadow-lg z-10"
  >
    <ul class="py-2 text-sm text-gray-100">
      <li>
        <a href="student_profile.php" class="block px-4 py-2 hover:bg-[#01797a]">Profile</a>
      </li>
      <li>
        <a href="student_settings.php" class="block px-4 py-2 hover:bg-[#01797a]">Settings</a>
      </li>
      <li>
        <a href="logout.php" class="block px-4 py-2 text-red-500 hover:bg-[#01797a]">Log Out</a>
      </li>


 

    </ul>
  </div>
</div>



        </div>
      </nav>
    </header>




<main>

<!-- All Development Courses -->
<h2 class="mt-5 text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All Development Courses</h2>
<section class="lg:ml-32">

<?php
include('../database/database.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login-signup/login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get course_id from the form
    $course_id = $_POST['course_id'];
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in and their ID is stored in session

    // Query to check if the user is already enrolled in the course
    $query_check = "SELECT * FROM Enrollment WHERE user_id = ? AND course_id = ?";
    $stmt_check = $conn->prepare($query_check);
    $stmt_check->bind_param("ii", $user_id, $course_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    // If the user is already enrolled in the course, show a message
    if ($result_check->num_rows > 0) {
        $message = "You have already enrolled in this course.";
    } else {
        // Get current date for enrollment
        $enrollment_date = date('Y-m-d');

        // Insert the enrollment information into the database
        $query_enroll = "INSERT INTO Enrollment (user_id, course_id, enrollment_date) VALUES (?, ?, ?)";
        $stmt_enroll = $conn->prepare($query_enroll);
        $stmt_enroll->bind_param("iis", $user_id, $course_id, $enrollment_date);
        $stmt_enroll->execute();

        // Get the course price from the Course table
        $query_course = "SELECT price FROM Course WHERE course_id = ?";
        $stmt_course = $conn->prepare($query_course);
        $stmt_course->bind_param("i", $course_id);
        $stmt_course->execute();
        $result_course = $stmt_course->get_result();
        $course = $result_course->fetch_assoc();

        // Insert payment information
        $amount = $course['price'];  // Get the price from the Course table
        $transaction_id = uniqid('txn_');  // Generate a unique transaction ID
        $payment_date = date('Y-m-d'); // Set today's date for the payment date

        // Insert the payment record
        $query_payment = "INSERT INTO Payment (user_id, course_id, amount, payment_date, transaction_id) VALUES (?, ?, ?, ?, ?)";
        $stmt_payment = $conn->prepare($query_payment);
        $stmt_payment->bind_param("iisds", $user_id, $course_id, $amount, $payment_date, $transaction_id);
        $stmt_payment->execute();

        // Show a success message and redirect to the profile page
        // $message = "Enrollment and payment successful!";
        // header("Location: student_profile.php");  // Redirect after success
        // exit();
    }
}

// Query to get all courses with the forum post date
$query = "SELECT c.course_id, c.title, c.description, c.category, c.price, 
                 i.user_id AS instructor_id, u.firstName, u.lastName, u.profile_pic,
                 fp.post_date
          FROM Course c
          JOIN Instructor i ON c.instructor_id = i.instructor_id
          JOIN User u ON i.user_id = u.user_id
          LEFT JOIN Forum_Post fp ON c.course_id = fp.course_id
          WHERE c.status = 'active'"; // Optional: filter by active courses
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

// Initialize a counter to track the courses in each row
$counter = 0;

// Loop through all courses and display them
while ($course = $result->fetch_assoc()) {
    // Check if the category is 'Development'
    if ($course['category'] == 'Development') {
        // Query to get video content for the course
        $query_video = "SELECT file_url FROM Course_Content WHERE course_id = ? AND type = 'video'";
        $stmt_video = $conn->prepare($query_video);
        $stmt_video->bind_param("i", $course['course_id']);
        $stmt_video->execute();
        $result_video = $stmt_video->get_result();
        $video_content = $result_video->fetch_assoc();

        // Start a new row after every 3 cards
        if ($counter % 3 == 0) {
            echo '<div class="flex flex-wrap">';
        }
        ?>
        <!-- Course card HTML -->
        <div class="relative flex ml-5 flex-col my-6 text-white bg-[#283747] shadow-sm border border-slate-200 rounded-lg w-96">
          <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
            <video class="h-full w-full rounded-lg" id="video-<?php echo $course['course_id']; ?>" controls>
              <!-- Video fetched from Course_Content table -->
              <source src="<?php echo $video_content['file_url']; ?>" type="video/mp4" />
              Your browser does not support the video tag.
            </video>
            <div id="message-<?php echo $course['course_id']; ?>" class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black bg-opacity-60 text-white text-xl font-bold hidden">
              Please buy the course first to play the video.
            </div>
          </div>
          <div class="p-4">
            <!-- Title and description fetched from Course table -->
            <h6 class="mb-2 text-white text-xl font-semibold">
              <?php echo htmlspecialchars($course['title']); ?>
            </h6>
            <p class="text-white leading-normal font-light">
              <?php echo htmlspecialchars($course['description']); ?>
            </p>
            <p class="text-white leading-normal font-light">
              <h4 class="font-bold">Category: <?php echo htmlspecialchars($course['category']); ?></h4> 
            </p>
            <p class="text-white leading-normal font-light">
              <h4 class="font-bold">Price: $<?php echo number_format($course['price'], 2); ?></h4> 
            </p>
            <!-- Display message if user is already enrolled -->
           
          </div>
          <div class="flex items-center justify-between p-4">
            <div class="flex items-center">
              <!-- Instructor profile picture -->
              <img alt="<?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>"
                   src="<?php echo $course['profile_pic']; ?>"
                   class="relative inline-block h-8 w-8 rounded-full" />
              <div class="flex flex-col ml-3 text-sm">
                <span class="text-white font-semibold">
                  <?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>
                </span>
                <!-- Retrieve post date from Forum_Post table -->
                <span class="text-white">
                  <?php echo date('F j, Y', strtotime($course['post_date'])); ?>
                </span>
              </div>
            </div>
          </div>
          <!-- Buy Now button positioned at the bottom-right -->
          <div class="absolute bottom-4 right-4">
            <form method="POST" action="">
              <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>" />
              <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">
                Buy Now
              </button>
            </form>
          </div>
        </div>
        <?php
        // Close the row after 3 cards
        $counter++;
        if ($counter % 3 == 0) {
            echo '</div>';  // Close the div for the row
        }
    }
} // End of while loop

// If the last row has fewer than 3 cards, close the remaining row div
if ($counter % 3 != 0) {
    echo '</div>';  // Close the div for the last row
}
?>

<script>
// JavaScript to handle video play, stop it, and show message
document.addEventListener('DOMContentLoaded', function() {
    // Get all video elements on the page
    const videos = document.querySelectorAll('video');

    // Add event listeners to prevent video play, hide controls, and show the message
    videos.forEach(function(video) {
        // Disable the controls for the video
        video.controls = false;

        // Show the message overlay when the user tries to play
        video.addEventListener('play', function(event) {
            event.preventDefault(); // Prevent the video from playing

            // Show the message
            const courseId = video.id.split('-')[1];
            const messageDiv = document.getElementById('message-' + courseId);
            messageDiv.classList.remove('hidden');

            // Hide the message after 3 seconds
            setTimeout(function() {
                messageDiv.classList.add('hidden');
            }, 3000);
        });
    });
});
</script>

</section>
<!-- all design -->


<h2 class="mt-5 text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All Design Courses</h2>

<section class="lg:ml-32">
<?php
include('../database/database.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login-signup/login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get course_id from the form
    $course_id = $_POST['course_id'];
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in and their ID is stored in session

    // Query to check if the user is already enrolled in the course
    $query_check = "SELECT * FROM Enrollment WHERE user_id = ? AND course_id = ?";
    $stmt_check = $conn->prepare($query_check);
    $stmt_check->bind_param("ii", $user_id, $course_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    // If the user is already enrolled in the course, show a message
    if ($result_check->num_rows > 0) {
        $message = "You have already enrolled in this course.";
    } else {
        // Get current date for enrollment
        $enrollment_date = date('Y-m-d');

        // Insert the enrollment information into the database
        $query_enroll = "INSERT INTO Enrollment (user_id, course_id, enrollment_date) VALUES (?, ?, ?)";
        $stmt_enroll = $conn->prepare($query_enroll);
        $stmt_enroll->bind_param("iis", $user_id, $course_id, $enrollment_date);
        $stmt_enroll->execute();

        // Get the course price from the Course table
        $query_course = "SELECT price FROM Course WHERE course_id = ?";
        $stmt_course = $conn->prepare($query_course);
        $stmt_course->bind_param("i", $course_id);
        $stmt_course->execute();
        $result_course = $stmt_course->get_result();
        $course = $result_course->fetch_assoc();

        // Insert payment information
        $amount = $course['price'];  // Get the price from the Course table
        $transaction_id = uniqid('txn_');  // Generate a unique transaction ID
        $payment_date = date('Y-m-d'); // Set today's date for the payment date

        // Insert the payment record
        $query_payment = "INSERT INTO Payment (user_id, course_id, amount, payment_date, transaction_id) VALUES (?, ?, ?, ?, ?)";
        $stmt_payment = $conn->prepare($query_payment);
        $stmt_payment->bind_param("iisds", $user_id, $course_id, $amount, $payment_date, $transaction_id);
        $stmt_payment->execute();

        // Show a success message and redirect to the profile page
        // $message = "Enrollment and payment successful!";
        // header("Location: student_profile.php");  // Redirect after success
        // exit();
    }
}

// Query to get all courses with the forum post date
$query = "SELECT c.course_id, c.title, c.description, c.category, c.price, 
                 i.user_id AS instructor_id, u.firstName, u.lastName, u.profile_pic,
                 fp.post_date
          FROM Course c
          JOIN Instructor i ON c.instructor_id = i.instructor_id
          JOIN User u ON i.user_id = u.user_id
          LEFT JOIN Forum_Post fp ON c.course_id = fp.course_id
          WHERE c.status = 'active'"; // Optional: filter by active courses
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

// Initialize a counter to track the courses in each row
$counter = 0;

// Loop through all courses and display them
while ($course = $result->fetch_assoc()) {
    // Check if the category is 'IT and Software'
    if ($course['category'] == 'Design') {
        // Query to get video content for the course
        $query_video = "SELECT file_url FROM Course_Content WHERE course_id = ? AND type = 'video'";
        $stmt_video = $conn->prepare($query_video);
        $stmt_video->bind_param("i", $course['course_id']);
        $stmt_video->execute();
        $result_video = $stmt_video->get_result();
        $video_content = $result_video->fetch_assoc();

        // Start a new row after every 3 cards
        if ($counter % 3 == 0) {
            echo '<div class="flex flex-wrap">';
        }
        ?>
        <!-- Course card HTML -->
        <div class="relative flex ml-5 flex-col my-6 text-white bg-[#283747] shadow-sm border border-slate-200 rounded-lg w-96">
          <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
            <video class="h-full w-full rounded-lg" id="video-<?php echo $course['course_id']; ?>" controls>
              <!-- Video fetched from Course_Content table -->
              <source src="<?php echo $video_content['file_url']; ?>" type="video/mp4" />
              Your browser does not support the video tag.
            </video>
            <div id="message-<?php echo $course['course_id']; ?>" class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black bg-opacity-60 text-white text-xl font-bold hidden">
              Please buy the course first to play the video.
            </div>
          </div>
          <div class="p-4">
            <!-- Title and description fetched from Course table -->
            <h6 class="mb-2 text-white text-xl font-semibold">
              <?php echo htmlspecialchars($course['title']); ?>
            </h6>
            <p class="text-white leading-normal font-light">
              <?php echo htmlspecialchars($course['description']); ?>
            </p>
            <p class="text-white leading-normal font-light">
              <h4 class="font-bold">Category: <?php echo htmlspecialchars($course['category']); ?></h4> 
            </p>
            <p class="text-white leading-normal font-light">
              <h4 class="font-bold">Price: $<?php echo number_format($course['price'], 2); ?></h4> 
            </p>
            <!-- Display message if user is already enrolled -->
          
          </div>
          <div class="flex items-center justify-between p-4">
            <div class="flex items-center">
              <!-- Instructor profile picture -->
              <img alt="<?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>"
                   src="<?php echo $course['profile_pic']; ?>"
                   class="relative inline-block h-8 w-8 rounded-full" />
              <div class="flex flex-col ml-3 text-sm">
                <span class="text-white font-semibold">
                  <?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>
                </span>
                <!-- Retrieve post date from Forum_Post table -->
                <span class="text-white">
                  <?php echo date('F j, Y', strtotime($course['post_date'])); ?>
                </span>
              </div>
            </div>
          </div>
          <!-- Buy Now button positioned at the bottom-right -->
          <div class="absolute bottom-4 right-4">
            <form method="POST" action="">
              <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>" />
              <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">
                Buy Now
              </button>
            </form>
          </div>
        </div>
        <?php
        // Close the row after 3 cards
        $counter++;
        if ($counter % 3 == 0) {
            echo '</div>';  // Close the div for the row
        }
    }
} // End of while loop

// If the last row has fewer than 3 cards, close the remaining row div
if ($counter % 3 != 0) {
    echo '</div>';  // Close the div for the last row
}
?>

<script>
// JavaScript to handle video play, stop it, and show message
document.addEventListener('DOMContentLoaded', function() {
    // Get all video elements on the page
    const videos = document.querySelectorAll('video');

    // Add event listeners to prevent video play, hide controls, and show the message
    videos.forEach(function(video) {
        // Disable the controls for the video
        video.controls = false;

        // Show the message overlay when the user tries to play
        video.addEventListener('play', function(event) {
            event.preventDefault(); // Prevent the video from playing

            // Show the message
            const courseId = video.id.split('-')[1];
            const messageDiv = document.getElementById('message-' + courseId);
            messageDiv.classList.remove('hidden');

            // Hide the message after 3 seconds
            setTimeout(function() {
                messageDiv.classList.add('hidden');
            }, 3000);
        });
    });
});
</script>
</section>

<!-- all IT and Software -->


<h2 class="mt-5 text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All IT and Software Courses</h2>
<section class="lg:ml-32">
<?php
include('../database/database.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login-signup/login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get course_id from the form
    $course_id = $_POST['course_id'];
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in and their ID is stored in session

    // Query to check if the user is already enrolled in the course
    $query_check = "SELECT * FROM Enrollment WHERE user_id = ? AND course_id = ?";
    $stmt_check = $conn->prepare($query_check);
    $stmt_check->bind_param("ii", $user_id, $course_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    // If the user is already enrolled in the course, show a message
    if ($result_check->num_rows > 0) {
        $message = "You have already enrolled in this course.";
    } else {
        // Get current date for enrollment
        $enrollment_date = date('Y-m-d');

        // Insert the enrollment information into the database
        $query_enroll = "INSERT INTO Enrollment (user_id, course_id, enrollment_date) VALUES (?, ?, ?)";
        $stmt_enroll = $conn->prepare($query_enroll);
        $stmt_enroll->bind_param("iis", $user_id, $course_id, $enrollment_date);
        $stmt_enroll->execute();

        // Get the course price from the Course table
        $query_course = "SELECT price FROM Course WHERE course_id = ?";
        $stmt_course = $conn->prepare($query_course);
        $stmt_course->bind_param("i", $course_id);
        $stmt_course->execute();
        $result_course = $stmt_course->get_result();
        $course = $result_course->fetch_assoc();

        // Insert payment information
        $amount = $course['price'];  // Get the price from the Course table
        $transaction_id = uniqid('txn_');  // Generate a unique transaction ID
        $payment_date = date('Y-m-d'); // Set today's date for the payment date

        // Insert the payment record
        $query_payment = "INSERT INTO Payment (user_id, course_id, amount, payment_date, transaction_id) VALUES (?, ?, ?, ?, ?)";
        $stmt_payment = $conn->prepare($query_payment);
        $stmt_payment->bind_param("iisds", $user_id, $course_id, $amount, $payment_date, $transaction_id);
        $stmt_payment->execute();

        // Show a success message and redirect to the profile page
        // $message = "Enrollment and payment successful!";
        // header("Location: student_profile.php");  // Redirect after success
        // exit();
    }
}

// Query to get all courses with the forum post date
$query = "SELECT c.course_id, c.title, c.description, c.category, c.price, 
                 i.user_id AS instructor_id, u.firstName, u.lastName, u.profile_pic,
                 fp.post_date
          FROM Course c
          JOIN Instructor i ON c.instructor_id = i.instructor_id
          JOIN User u ON i.user_id = u.user_id
          LEFT JOIN Forum_Post fp ON c.course_id = fp.course_id
          WHERE c.status = 'active'"; // Optional: filter by active courses
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

// Initialize a counter to track the courses in each row
$counter = 0;

// Loop through all courses and display them
while ($course = $result->fetch_assoc()) {
    // Check if the category is 'IT and Software'
    if ($course['category'] == 'IT and Software') {
        // Query to get video content for the course
        $query_video = "SELECT file_url FROM Course_Content WHERE course_id = ? AND type = 'video'";
        $stmt_video = $conn->prepare($query_video);
        $stmt_video->bind_param("i", $course['course_id']);
        $stmt_video->execute();
        $result_video = $stmt_video->get_result();
        $video_content = $result_video->fetch_assoc();

        // Start a new row after every 3 cards
        if ($counter % 3 == 0) {
            echo '<div class="flex flex-wrap">';
        }
        ?>
        <!-- Course card HTML -->
        <div class="relative flex ml-5 flex-col my-6 text-white bg-[#283747] shadow-sm border border-slate-200 rounded-lg w-96">
          <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
            <video class="h-full w-full rounded-lg" id="video-<?php echo $course['course_id']; ?>" controls>
              <!-- Video fetched from Course_Content table -->
              <source src="<?php echo $video_content['file_url']; ?>" type="video/mp4" />
              Your browser does not support the video tag.
            </video>
            <div id="message-<?php echo $course['course_id']; ?>" class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black bg-opacity-60 text-white text-xl font-bold hidden">
              Please buy the course first to play the video.
            </div>
          </div>
          <div class="p-4">
            <!-- Title and description fetched from Course table -->
            <h6 class="mb-2 text-white text-xl font-semibold">
              <?php echo htmlspecialchars($course['title']); ?>
            </h6>
            <p class="text-white leading-normal font-light">
              <?php echo htmlspecialchars($course['description']); ?>
            </p>
            <p class="text-white leading-normal font-light">
              <h4 class="font-bold">Category: <?php echo htmlspecialchars($course['category']); ?></h4> 
            </p>
            <p class="text-white leading-normal font-light">
              <h4 class="font-bold">Price: $<?php echo number_format($course['price'], 2); ?></h4> 
            </p>
            <!-- Display message if user is already enrolled -->
           
          </div>
          <div class="flex items-center justify-between p-4">
            <div class="flex items-center">
              <!-- Instructor profile picture -->
              <img alt="<?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>"
                   src="<?php echo $course['profile_pic']; ?>"
                   class="relative inline-block h-8 w-8 rounded-full" />
              <div class="flex flex-col ml-3 text-sm">
                <span class="text-white font-semibold">
                  <?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>
                </span>
                <!-- Retrieve post date from Forum_Post table -->
                <span class="text-white">
                  <?php echo date('F j, Y', strtotime($course['post_date'])); ?>
                </span>
              </div>
            </div>
          </div>
          <!-- Buy Now button positioned at the bottom-right -->
          <div class="absolute bottom-4 right-4">
            <form method="POST" action="">
              <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>" />
              <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">
                Buy Now
              </button>
            </form>
          </div>
        </div>
        <?php
        // Close the row after 3 cards
        $counter++;
        if ($counter % 3 == 0) {
            echo '</div>';  // Close the div for the row
        }
    }
} // End of while loop

// If the last row has fewer than 3 cards, close the remaining row div
if ($counter % 3 != 0) {
    echo '</div>';  // Close the div for the last row
}
?>

<script>
// JavaScript to handle video play, stop it, and show message
document.addEventListener('DOMContentLoaded', function() {
    // Get all video elements on the page
    const videos = document.querySelectorAll('video');

    // Add event listeners to prevent video play, hide controls, and show the message
    videos.forEach(function(video) {
        // Disable the controls for the video
        video.controls = false;

        // Show the message overlay when the user tries to play
        video.addEventListener('play', function(event) {
            event.preventDefault(); // Prevent the video from playing

            // Show the message
            const courseId = video.id.split('-')[1];
            const messageDiv = document.getElementById('message-' + courseId);
            messageDiv.classList.remove('hidden');

            // Hide the message after 3 seconds
            setTimeout(function() {
                messageDiv.classList.add('hidden');
            }, 3000);
        });
    });
});
</script>
</section>
</main>

<script src="../scripts/script.js"></script>



<?php include('../Styles/footer.php') ?>
</body>
</html>