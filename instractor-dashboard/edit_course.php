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
   <?php include('../Styles/head_content.php'); ?>
</head>
<body>



<header>
    <!-- Navigation -->
    <nav id="navigation">
      <div class="navbar bg-black">
        <div class="navbar-start">
          <!-- Dropdown menu -->
          <div class="dropdown hidden">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h7" />
              </svg>
            </div>
            <ul
              tabindex="0"
              class="menu menu-sm dropdown-content bg-black rounded-box z-[1] mt-3 w-52 p-2 shadow left-0">
              <li><a>All Students</a></li>
              <li><a>All Instructors</a></li>
              <li><a>All Courses</a></li>
              <li><a>All Courses</a></li>
            </ul>
          </div>
        </div>


        <div class="navbar-center">
          <a class="btn btn-ghost text-xl">SkillPro</a>
        </div>

        <div class="navbar-end">
          <!-- Search button and input field -->
          <div class="relative">
            <button id="search-btn" class="btn btn-ghost btn-circle">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
            <input
              id="search-input"
              type="text"
              placeholder="Search..."
              class="hidden absolute right-0 bg-black rounded-md p-2 mt-2"
              style="width: 150px" />
          </div>

          <!-- Notification button -->
          <button class="btn btn-ghost btn-circle">
            <div class="indicator">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
              <span
                class="badge badge-xs badge-primary indicator-item"></span>
            </div>
          </button>
        </div>
      </div>

      <script>
        document
          .getElementById("search-btn")
          .addEventListener("click", function() {
            const searchInput = document.getElementById("search-input");
            searchInput.classList.toggle("hidden");
            searchInput.focus();
          });
      </script>

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
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h8m-8 6h16" />
              </svg>
            </div>
            <ul
              tabindex="0"
              class="menu menu-sm dropdown-content rounded-box z-[1] mt-3 w-52 p-2 shadow bg-black text-white">
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
              stroke-linejoin="round">
              <circle cx="12" cy="12" r="5" />
              <path
                d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" />
            </svg>
            <input
              type="checkbox"
              value="synthwave"
              class="toggle theme-controller" />
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round">
              <path
                d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
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
            class="hidden absolute right-0 mt-2 w-40 bg-[#021e3b] rounded-md shadow-lg z-10">
            <ul class="py-2 text-sm text-gray-100 h-auto">
              <li>
                <a href="instructor_profile_edit.php" class="block px-4 py-2 hover:bg-[#01797a]">Profile</a>
              </li>
              <li>
                <a href="Upload_Course.php" class="block px-4 py-2 hover:bg-[#01797a]">Upload Course</a>
              </li>

            

              <li>
                <a href="edit_course.php" class="block px-4 py-2 hover:bg-[#01797a]">Edit Course</a>
              </li>
              <li>
                <a href="quiz_upload.php" class="block px-4 py-2 hover:bg-[#01797a]">Quiz Upload</a>
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
    
 <!-- Manage Courses: Edit and Delete -->
 <section class="mt-10 ">
  <h2 class="text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">Manage Courses: Edit and Delete</h2>

  <?php
  // Ensure the user is logged in
  if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
  }

  // Fetch the logged-in user ID
  $user_id = $_SESSION['user_id'];

  // Database connection
  include('../database/database.php');

  // Get the instructor ID of the logged-in user
  $query_instructor = "SELECT instructor_id FROM Instructor WHERE user_id = ?";
  $stmt_instructor = $conn->prepare($query_instructor);
  $stmt_instructor->bind_param("i", $user_id);
  $stmt_instructor->execute();
  $result_instructor = $stmt_instructor->get_result();
  $instructor = $result_instructor->fetch_assoc();

  if (!$instructor) {
    echo "No instructor profile found.";
    exit();
  }

  $instructor_id = $instructor['instructor_id'];

  // Query to fetch courses with their course_id and video content
  $sql = "
  SELECT 
      Course.course_id,
      Course.title AS course_title, 
      Course.description, 
      Course.category, 
      Course.price, 
      Course_Content.file_url 
  FROM 
      Course 
  LEFT JOIN 
      Course_Content ON Course.course_id = Course_Content.course_id 
  WHERE 
      Course_Content.type = 'video' 
      AND Course.instructor_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $instructor_id);
  $stmt->execute();
  $result = $stmt->get_result();
  ?>

  <div class="flex flex-wrap justify-center">
    <?php
    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = htmlspecialchars($row['course_id']);
    ?>
        <div class="card bg-base-100 w-96 shadow-xl m-4">
          <video class="h-full w-full rounded-lg" controls>
            <source src="<?php echo htmlspecialchars($row['file_url']); ?>" type="video/mp4" />
            Your browser does not support the video tag.
          </video>
          <div class="card-body">
            <h2 class="card-title"><?php echo htmlspecialchars($row['course_title']); ?></h2>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <p>Category: <?php echo htmlspecialchars($row['category']); ?></p>
            <p>Price: $<?php echo htmlspecialchars($row['price']); ?></p>
            <p><strong>Course ID:</strong> <?php echo $course_id; ?></p>
            <div class="flex justify-between mt-4">
              <!-- Edit Button -->
<a href="course_content_edit.php?course_id=<?php echo $course_id; ?>" class="btn btn-primary w-32">Edit</a>

              <!-- Delete Button -->
              <form action="delete_course2.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
    <button type="submit" class="btn bg-[red] w-32">Delete</button>
</form>

            </div>
          </div>
        </div>
    <?php
      }
    } else {
      echo '<p>No courses available.</p>';
    }
    ?>
  </div>
</section>

    
   </main>

    


   <?php include('../Styles/footer.php') ?>

   <script src="../scripts/script.js"></script>

</body>
</html>