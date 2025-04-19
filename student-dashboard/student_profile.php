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
 <?php include('../Styles/head_content.php') ?>
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
                <li><a >Homepage</a></li>
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
                <li><a href="student.php">Home</a></li>

                <li>
                  <a>Development</a>
                  
                </li>

                <li>
                  <a>IT & Software</a>
                  
                </li>

                <li>
                  <a>Design</a>
                  
                </li>

                <li><a>Instructors</a></li>
                <li><a href="FreeCourses.html">Free Courses</a></li>
                
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
              <li class="mark"><a href="student.php">Home</a></li>
              <li>
                <a href="">Development</a>
              </li>
              <li>
               <a href=""> IT & Software</a>
              </li>

              <li>
               <a href=""> Design</a>
                 
              </li>

              <li><a>Instructors</a></li>
              <li><a href="FreeCourses.html">Free Courses</a></li>
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
      <!-- About me -->
       <div class="text-gray-900">
       <?php
include("../database/database.php");


// Assuming the user is logged in and the user_id is stored in the session
$user_id = $_SESSION['user_id'];
$profilePic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'default_profile.jpg'; // Set a default image if not available

// Query to fetch student data and their enrolled courses
$query = "
    SELECT u.firstName, u.lastName, u.email, u.profile_pic, u.bio, e.enrollment_date, c.title AS course_title
    FROM User u
    LEFT JOIN Enrollment e ON u.user_id = e.user_id
    LEFT JOIN Course c ON e.course_id = c.course_id
    WHERE u.user_id = $user_id
";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the student data
    $row = mysqli_fetch_assoc($result);
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $bio = $row['bio'];
    $profile_pic = $row['profile_pic'];
    $enrollment_date = $row['enrollment_date'];
    $course_title = $row['course_title']; // Fetching course titles the student is enrolled in
} else {
    echo "No data found for this user.";
    exit();
}
?>

<div class="font-sans antialiased text-white leading-normal tracking-wider bg-cover"
    style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');">
    <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">
        <!-- Main Col -->
        <div id="profile"
            class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-[#283747] opacity-75 mx-6 lg:mx-0 h-full">
            <div class="p-4 md:p-12 text-center lg:text-left">
                <!-- Image for mobile view-->
                <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
                    style="background-image: url('../<?php echo $profile_pic; ?>')"></div>

                <h1 class="text-3xl font-bold pt-8 lg:pt-0 text-white"><?php echo $firstName . " " . $lastName; ?></h1>
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25">
                    User ID: <?php echo $user_id; ?>
                </div>

                <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                    <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                    </svg> Bio: <?php echo $bio ? $bio : "No bio available."; ?>
                </p>

                <p class="pt-2 text-white text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                    <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm7.75-8a8.01 8.01 0 0 0 0-4h-3.82a28.81 28.81 0 0 1 0 4h3.82zm-.82 2h-3.22a14.44 14.44 0 0 1-.95 3.51A8.03 8.03 0 0 0 16.93 14zm-8.85-2h3.84a24.61 24.61 0 0 0 0-4H8.08a24.61 24.61 0 0 0 0 4zm.25 2c.41 2.4 1.13 4 1.67 4s1.26-1.6 1.67-4H8.33zm-6.08-2h3.82a28.81 28.81 0 0 1 0-4H2.25a8.01 8.01 0 0 0 0 4zm.82 2a8.03 8.03 0 0 0 4.17 3.51c-.42-.96-.74-2.16-.95-3.51H3.07zm13.86-8a8.03 8.03 0 0 0-4.17-3.51c.42.96.74 2.16.95 3.51h3.22zm-8.6 0h3.34c-.41-2.4-1.13-4-1.67-4S8.74 3.6 8.33 6zM3.07 6h3.22c.2-1.35.53-2.55.95-3.51A8.03 8.03 0 0 0 3.07 6z" />
                    </svg> Enrolled on: <?php echo date('F j, Y', strtotime($enrollment_date)); ?>
                </p>

                <div class="pt-12 pb-8">
                    <a href="mailto:<?php echo $email; ?>" class="block">
                        <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
                            Email: <?php echo $email; ?>
                        </button>
                    </a>
                </div>

                <!-- Enrolled Courses Section -->
                <div class="pt-8 bg-[#1D232A] rounded-lg p-4">
                    <h2 class="text-xl text-white font-bold">Enrolled Courses:</h2>
                    <ul class="text-white pt-4 list-disc pl-6">
                        <?php
                        $coursesQuery = "SELECT c.title FROM Course c JOIN Enrollment e ON c.course_id = e.course_id WHERE e.user_id = $user_id";
                        $coursesResult = mysqli_query($conn, $coursesQuery);
                        if ($coursesResult && mysqli_num_rows($coursesResult) > 0) {
                            while ($course = mysqli_fetch_assoc($coursesResult)) {
                                echo "<li>" . htmlspecialchars($course['title']) . "</li>";
                            }
                        } else {
                            echo "<li>No courses enrolled yet.</li>";
                        }
                        ?>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Img Col-->
        <div class="w-full lg:w-2/5 h-full">
            <img src="../<?php echo htmlspecialchars($profilePic); ?>" alt="Profile" class="w-full h-full object-cover" />
        </div>
    </div>
</div>


       </div>




    <!-- My Enrolled Courses -->
<h2 class="mt-5 justify-center text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">My Enrolled Courses</h2>

<div class="lg:ml-32">
   <?php
include('../database/database.php');

// Start the session to retrieve user_id (assuming session_start() is done in your header or elsewhere)

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];  // Assuming session has the logged-in user's ID

// Check if the form is submitted to enroll in a course
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];

    // Check if the user is already enrolled in the course
    $check_enrollment = "SELECT * FROM Enrollment WHERE user_id = ? AND course_id = ?";
    $stmt_check = $conn->prepare($check_enrollment);
    $stmt_check->bind_param("ii", $user_id, $course_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows == 0) {
        // If not already enrolled, enroll the user in the course
        $enroll_course = "INSERT INTO Enrollment (user_id, course_id, enrollment_date) VALUES (?, ?, NOW())";
        $stmt_enroll = $conn->prepare($enroll_course);
        $stmt_enroll->bind_param("ii", $user_id, $course_id);
        $stmt_enroll->execute();
        echo "Successfully enrolled in the course!";
    } else {
        echo "You are already enrolled in this course.";
    }
}

// Query to get only the courses the logged-in user is enrolled in
$query = "SELECT c.course_id, c.title, c.description, c.category, c.price, 
                 i.user_id AS instructor_id, u.firstName, u.lastName, u.profile_pic,
                 fp.post_date, e.enrollment_date
          FROM Course c
          JOIN Instructor i ON c.instructor_id = i.instructor_id
          JOIN User u ON i.user_id = u.user_id
          LEFT JOIN Forum_Post fp ON c.course_id = fp.course_id
          JOIN Enrollment e ON c.course_id = e.course_id
          WHERE e.user_id = ? AND c.status = 'active'"; // Filter by user_id in the Enrollment table

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id); // Bind the user_id to the query for checking enrollment
$stmt->execute();
$result = $stmt->get_result();

// Initialize a counter to track the courses in each row
$counter = 0;

// Start a new row after every 3 cards
echo '<div class="flex flex-wrap">';

// Loop through all courses and display them
while ($course = $result->fetch_assoc()) {
    // Query to get video content for the course
    $query_video = "SELECT file_url FROM Course_Content WHERE course_id = ? AND type = 'video'";
    $stmt_video = $conn->prepare($query_video);
    $stmt_video->bind_param("i", $course['course_id']);
    $stmt_video->execute();
    $result_video = $stmt_video->get_result();
    $video_content = $result_video->fetch_assoc();
?>

  <!-- Course card HTML -->
  <div class="relative flex ml-5 flex-col my-6 text-white bg-[#283747] shadow-sm border border-slate-200 rounded-lg w-96">
    <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
      <video id="video_<?php echo $course['course_id']; ?>" class="h-full w-full rounded-lg" controls>
        <!-- Video fetched from Course_Content table -->
        <source src="<?php echo $video_content['file_url']; ?>" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
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

      <!-- Show Enrolled date -->
      <?php if ($course['enrollment_date']) { ?>
        <p class="text-white leading-normal font-light">
          <h4 class="font-bold">Enrolled on: <?php echo date('F j, Y', strtotime($course['enrollment_date'])); ?></h4>
        </p>
      <?php } ?>
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

    <!-- Buttons hidden initially -->
    <div class="p-4 hidden" id="buttons_<?php echo $course['course_id']; ?>">
    <a href="review.php?course_id=<?php echo $course['course_id']; ?>" 
   class="bg-blue-500 text-white px-4 py-2 rounded">
   Review
</a>

<form action="quiz_page.php" method="GET" class="inline-block">
    <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Quiz</button>
</form>

    </div>
  </div>
  
<?php
    // Increment the counter
    $counter++;

    // Close the row div after every 3 cards
    if ($counter % 3 == 0) {
        echo '</div><div class="flex flex-wrap">'; // Close the current row and start a new one
    }
} // End of while loop

// Close the last row div if there are fewer than 3 cards
if ($counter % 3 != 0) {
    echo '</div>'; // Close the remaining flex row div
}
?>

<script>
  // JavaScript to handle the video completion
  document.querySelectorAll('video').forEach(function(videoElement) {
    videoElement.addEventListener('ended', function() {
      // Get the course ID from the video element's ID
      var courseId = videoElement.id.split('_')[1];

      // Show the "Review" and "Quiz" buttons when the video ends
      document.getElementById('buttons_' + courseId).classList.remove('hidden');
    });
  });
</script>


  </main>
    

  




   


   </div>

    <?php include('../Styles/footer.php') ?>
    

    <script src="../scripts/script.js"></script>
  
</body>
</html>