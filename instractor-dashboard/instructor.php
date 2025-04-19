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
                <a href="instructor_profile.php" class="block px-4 py-2 hover:bg-[#01797a]">Profile</a>
              </li>
              <!-- <li>
                <a href="instructor_profile.php" class="block px-4 py-2 hover:bg-[#01797a]">Profile</a>
              </li> -->
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
                <a href="instructor_settings.php" class="block px-4 py-2 hover:bg-[#01797a]">Settings</a>
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
<!-- All Courses -->
<section>
  <h2 class="text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">Your All Courses</h2>
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
      echo "<p class='text-center text-red-500 mt-5'>No instructor profile found. Please contact the admin for assistance.</p>";
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

  <div class="flex flex-wrap justify-center gap-6 p-6 bg-[#1D232A]">
      <?php
      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
      ?>
              <div class="max-w-sm w-full bg-[#283747] border border-gray-600 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                  <!-- Course Video -->
                  <div class="relative">
                      <video class="w-full rounded-t-lg" controls>
                          <source src="<?php echo htmlspecialchars($row['file_url']); ?>" type="video/mp4" />
                          Your browser does not support the video tag.
                      </video>
                  </div>
                  <!-- Card Body -->
                  <div class="p-5">
                      <h2 class="text-xl font-semibold text-white mb-3"><?php echo htmlspecialchars($row['course_title']); ?></h2>
                      <p class="text-sm text-gray-200 mb-3"><?php echo htmlspecialchars($row['description']); ?></p>
                      <p class="text-sm text-gray-300"><strong>Category:</strong> <?php echo htmlspecialchars($row['category']); ?></p>
                      <p class="text-sm text-gray-300"><strong>Price:</strong> $<?php echo htmlspecialchars($row['price']); ?></p>
                      <p class="text-sm text-gray-300"><strong>Course ID:</strong> <?php echo htmlspecialchars($row['course_id']); ?></p>
                  </div>
              </div>
      <?php
          }
      } else {
          echo '<p class="text-center text-white text-lg">No courses available. Start creating courses now!</p>';
      }
      ?>
  </div>
</section>




<section>
  <h2 class="text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">Students who have purchased courses</h2>
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

  // Query
  $sql = "
    SELECT 
        User.user_id AS student_id,
        User.firstName, 
        User.lastName, 
        User.email, 
        User.profile_pic, 
        User.bio, 
        Enrollment.enrollment_date,
        Course.course_id,
        Course.title
    FROM 
        Enrollment 
    JOIN 
        Course ON Enrollment.course_id = Course.course_id 
    JOIN 
        Instructor ON Course.instructor_id = Instructor.instructor_id 
    JOIN 
        User ON Enrollment.user_id = User.user_id 
    WHERE 
        Instructor.user_id = ?
  ";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  ?>

  <div class="flex flex-wrap justify-center">
    <?php
    $col_count = 0;

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $profile_pic = !empty($row['profile_pic']) ? htmlspecialchars($row['profile_pic']) : 'default_profile.jpg';
        $full_name = htmlspecialchars($row['firstName']) . ' ' . htmlspecialchars($row['lastName']);
        $bio = htmlspecialchars($row['bio']);
        $enrollment_date = htmlspecialchars($row['enrollment_date']);
        $course_title = htmlspecialchars($row['title']);
        $student_id = $row['student_id']; // student ID for deletion
        $course_id = $row['course_id']; // course ID for deletion

        // Start a new row after every 3 cards
        if ($col_count % 3 === 0 && $col_count !== 0) {
          echo '</div><div class="flex flex-wrap justify-center">';
        }
    ?>
      <div class="rounded-lg border bg-[#283747] px-4 pt-8 pb-10 shadow-lg m-4 w-96">
        <div class="relative mx-auto w-36 rounded-full">
          <img class="mx-auto h-auto w-full rounded-full" src="<?php echo $profile_pic; ?>" alt="<?php echo $full_name; ?>" />
        </div>
        <h1 class="my-1 text-center text-xl font-bold leading-8 text-white"><?php echo $full_name; ?></h1>
        <h3 class="font-lg text-semibold text-center leading-6 text-white"><?php echo $bio ?: 'No bio available'; ?></h3>
        <p class="text-center text-sm leading-6 text-white hover:text-white">Course: <?php echo $course_title ?: 'None'; ?></p>
        <ul class="mt-3 divide-y rounded bg-[#1D232A] py-2 px-3 text-white shadow-sm hover:text-white hover:shadow">
          <li class="flex items-center py-3 text-sm">
            <span>Email</span>
            <span class="ml-auto"><?php echo htmlspecialchars($row['email']); ?></span>
          </li>
          <li class="flex items-center py-3 text-sm">
            <span>Joined On</span>
            <span class="ml-auto"><?php echo date("M d, Y", strtotime($enrollment_date)); ?></span>
          </li>
        </ul>

        <!-- Delete button form -->
        <form method="POST" action="delete_student.php" onsubmit="return confirm('Are you sure you want to remove this student?');">
          <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
          <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
          <button type="submit" class="mt-4 bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-all duration-300">
            Remove from Course
          </button>
        </form>
      </div>
    <?php
        $col_count++;
      }
    } else {
      echo '<p>No students have purchased your courses yet.</p>';
    }
    ?>
  </div>
</section>




<!-- All comment -->

<section>
    <h2 class="text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All Your Reviews</h2>

    <?php
    // Get the logged-in user's ID
    $user_id = $_SESSION['user_id']; // Assuming the logged-in user's ID is stored in session

    // Check if the user is an instructor by their role
    $query = "SELECT * FROM User WHERE user_id = $user_id AND role = 'instructor'";
    $result = mysqli_query($conn, $query);

    // Initialize reviews_result to avoid undefined variable errors
    $reviews_result = null;

    // If the user is an instructor, proceed
    if (mysqli_num_rows($result) > 0) {
        // Get the instructor's courses by joining Course and Instructor tables
        $courses_query = "
            SELECT c.course_id, c.title, c.category
            FROM Course c
            JOIN Instructor i ON c.instructor_id = i.instructor_id
            WHERE i.user_id = $user_id";

        $courses_result = mysqli_query($conn, $courses_query);

        // Initialize an empty array to hold course IDs
        $course_ids = [];
        while ($row = mysqli_fetch_assoc($courses_result)) {
            $course_ids[] = $row['course_id'];  // Add course_id to the array
        }

        // If courses exist, fetch reviews for those courses
        if (!empty($course_ids)) {
            // Convert the array of course IDs to a comma-separated list
            $course_ids_str = implode(',', $course_ids);

            // Query to fetch reviews for the courses taught by the instructor
            $reviews_query = "
                SELECT 
                    r.review_id, r.comment, r.rating, r.review_date, u.firstName, u.lastName, u.email, u.profile_pic, 
                    c.title AS course_title, c.category AS course_category
                FROM 
                    course_reviews r
                JOIN 
                    User u ON r.user_id = u.user_id
                JOIN 
                    Course c ON r.course_id = c.course_id
                WHERE 
                    r.course_id IN ($course_ids_str)
                ORDER BY 
                    r.review_date DESC";

            $reviews_result = mysqli_query($conn, $reviews_query);
        }
    } else {
        echo "You are not authorized to view this page.";
    }
?>

<!-- Display the comments and ratings -->
<div class="comment-section p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php
        // Ensure $reviews_result is valid before accessing it
        if ($reviews_result && mysqli_num_rows($reviews_result) > 0) {
            while ($row = mysqli_fetch_assoc($reviews_result)) {
                $fullName = $row['firstName'] . " " . $row['lastName'];
                $profilePic = $row['profile_pic'] ? $row['profile_pic'] : 'https://loremflickr.com/320/320/girl'; // Default pic
                $comment = $row['comment'];
                $rating = $row['rating'];
                $courseTitle = $row['course_title'];
                $courseCategory = $row['course_category'];
                ?>

                <div class="p-5 border rounded bg-[#283747] shadow-md text-white">
                    <div class="flex items-center">
                        <img class="w-16 h-16 rounded-full mr-3" src="<?= $profilePic ?>" alt="<?= $fullName ?>">
                        <div class="text-sm">
                            <a href="#" class="font-medium leading-none text-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                <?= $fullName ?>
                            </a>
                            <p class="text-white"><?= $row['email'] ?></p>  
                        </div>
                    </div>

                    <!-- Course Name and Category -->
                    <p class="mt-2 text-sm text-white"><strong>Course:</strong> <?= $courseTitle ?></p>
                    <p class="text-sm text-white"><strong>Category:</strong> <?= $courseCategory ?></p>

                    <p class="mt-2 text-sm text-white"><?= $comment ?></p>

                    <div class="flex mt-4">
                        <?php
                        // Display stars based on rating
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<svg class="fill-current text-yellow-500" width="24" height="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>';
                            } else {
                                echo '<svg class="fill-current text-gray-300" width="24" height="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>';
                            }
                        }
                        ?>
                    </div>

                    <!-- Delete Button -->
                    <form method="POST" action="delete_comment.php" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                        <input type="hidden" name="review_id" value="<?= $row['review_id'] ?>">
                        <button type="submit" class="mt-4 text-red-500 hover:text-red-700">Delete Comment</button>
                    </form>
                </div>
                <?php
            }
        } else {
            echo "<div class='col-span-full text-center text-white text-xl p-10'>No reviews yet.</div>";
        }
        ?>
    </div>
</div>

</section>



<section>
  
<!-- Certified Students -->



<h2 class="text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">Certified Students</h2>


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

// Query to fetch certificate holders for the instructor's courses
$sql = "
SELECT 
    User.firstName, 
    User.lastName, 
    User.email, 
    User.profile_pic, 
    User.bio, 
    Certificate.issue_date,
    Course.title
FROM 
    Certificate
JOIN 
    Course ON Certificate.course_id = Course.course_id
JOIN 
    Instructor ON Course.instructor_id = Instructor.instructor_id
JOIN 
    User ON Certificate.user_id = User.user_id
WHERE 
    Instructor.user_id = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<div class="flex flex-wrap justify-center">
    <?php
    $col_count = 0;

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $profile_pic = !empty($row['profile_pic']) ? htmlspecialchars($row['profile_pic']) : 'default_profile.jpg';
            $full_name = htmlspecialchars($row['firstName']) . ' ' . htmlspecialchars($row['lastName']);
            $bio = htmlspecialchars($row['bio']);
            $issue_date = htmlspecialchars($row['issue_date']);
            $course_title = htmlspecialchars($row['title']);

            // Start a new row after every 3 cards
            if ($col_count % 3 === 0 && $col_count !== 0) {
                echo '</div><div class="flex flex-wrap justify-center">';
            }
    ?>
            <div class="rounded-lg border bg-[#283747] px-4 pt-8 pb-10 shadow-lg m-4 w-96">
                <div class="relative mx-auto w-36 rounded-full">
                    <img class="mx-auto h-auto w-full rounded-full" src="<?php echo $profile_pic; ?>" alt="<?php echo $full_name; ?>" />
                </div>
                <h1 class="my-1 text-center text-xl font-bold leading-8 text-white"><?php echo $full_name; ?></h1>
                <h3 class="font-lg text-semibold text-center leading-6 text-white"><?php echo $bio ?: 'No bio available'; ?></h3>
                <p class="text-center text-sm leading-6 text-white hover:text-white">Course: <?php echo $course_title; ?></p>
                <ul class="mt-3 divide-y rounded bg-[#1D232A] py-2 px-3 text-white shadow-sm hover:text-white hover:shadow">
                    <li class="flex items-center py-3 text-sm">
                        <span>Email</span>
                        <span class="ml-auto"><?php echo htmlspecialchars($row['email']); ?></span>
                    </li>
                    <li class="flex items-center py-3 text-sm">
                        <span>Completion Date</span>
                        <span class="ml-auto"><?php echo date("M d, Y", strtotime($issue_date)); ?></span>
                    </li>
                </ul>
            </div>
    <?php
            $col_count++;
        }
    } else {
        echo '<p>No students have received certificates for your courses yet.</p>';
    }
    ?>
</div>

</section>

  </main>


  <?php
  include('../Styles/footer.php');
   ?>

  <script src="../scripts/script.js"></script>



</body>

</html>