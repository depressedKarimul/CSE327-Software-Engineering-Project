<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

// Fetch the profile picture from session
$profilePic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'default_profile.jpg'; // Set a default image if not available
?>

<?php


// Get the course ID from the form submission
if (isset($_POST['course_id'])) {
  $course_id = $_POST['course_id'];

  // Ensure that the course exists and is active
  $query = "SELECT * FROM Course WHERE course_id = ? AND status = 'active'";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $course_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Logic for enrolling the student in the course
    $user_id = $_SESSION['user_id'];
    $query_enroll = "INSERT INTO Enrollments (user_id, course_id) VALUES (?, ?)";
    $stmt_enroll = $conn->prepare($query_enroll);
    $stmt_enroll->bind_param("ii", $user_id, $course_id);
    if ($stmt_enroll->execute()) {
      // Redirect or show success message
      echo "Successfully enrolled in the course!";
    } else {
      // Error enrolling
      echo "Failed to enroll in the course.";
    }
  } else {
    // Course does not exist or is not active
    echo "Course not found or unavailable.";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('head_content.php')
  ?>


</head>

<body>




  <main>
    <!-- All search  development course -->
    <section>
      <h2 class="mt-5 text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All Development Courses</h2>
      <?php
      include('database.php');

      // Ensure the user is logged in
      if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
      }

      // Get the search query from the form submission
      $searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

      // Query to fetch all development courses that match the search query
      $query = "SELECT c.course_id, c.title, c.description, c.category, c.price, 
                 i.user_id AS instructor_id, u.firstName, u.lastName, u.profile_pic,
                 fp.post_date
          FROM Course c
          JOIN Instructor i ON c.instructor_id = i.instructor_id
          JOIN User u ON i.user_id = u.user_id
          LEFT JOIN Forum_Post fp ON c.course_id = fp.course_id
          WHERE c.status = 'active' AND c.category = 'Development'
          AND (c.title LIKE ? OR c.description LIKE ?)";
      $stmt = $conn->prepare($query);
      $searchTerm = "%$searchQuery%";
      $stmt->bind_param("ss", $searchTerm, $searchTerm);
      $stmt->execute();
      $result = $stmt->get_result();

      // Check if any courses were found
      if ($result->num_rows === 0) {
        echo '<p class="mt-5 text-center  text-white p-5 font-extrabold">No courses found.</p>';
      } else {

        echo '<section class="lg:ml-32">';

        // Initialize a counter to track the courses in each row
        $counter = 0;

        // Loop through all matching courses and display them
        while ($course = $result->fetch_assoc()) {
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
          <!-- Course card -->
          <div class="relative flex ml-5 flex-col my-6 text-white bg-[#283747] shadow-sm border border-slate-200 rounded-lg w-96">
            <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
              <video class="h-full w-full rounded-lg" id="video-<?php echo $course['course_id']; ?>" controls>
                <source src="<?php echo $video_content['file_url']; ?>" type="video/mp4" />
                Your browser does not support the video tag.
              </video>
              <div id="message-<?php echo $course['course_id']; ?>" class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black bg-opacity-60 text-white text-xl font-bold hidden">
                Please buy the course first to play the video.
              </div>
            </div>
            <div class="p-4">
              <h6 class="mb-2 text-white text-xl font-semibold">
                <?php echo htmlspecialchars($course['title']); ?>
              </h6>
              <p class="text-white leading-normal font-light">
                <?php echo htmlspecialchars($course['description']); ?>
              </p>
              <h4 class="font-bold">Category: <?php echo htmlspecialchars($course['category']); ?></h4>
              <h4 class="font-bold">Price: $<?php echo number_format($course['price'], 2); ?></h4>
            </div>
            <div class="flex items-center justify-between p-4">
              <div class="flex items-center">
                <img alt="<?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>"
                  src="<?php echo $course['profile_pic']; ?>"
                  class="relative inline-block h-8 w-8 rounded-full" />
                <div class="flex flex-col ml-3 text-sm">
                  <span class="text-white font-semibold">
                    <?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>
                  </span>
                  <span class="text-white">
                    <?php echo date('F j, Y', strtotime($course['post_date'])); ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
      <?php
          // Close the row after 3 cards
          $counter++;
          if ($counter % 3 == 0) {
            echo '</div>';  // Close the div for the row
          }
        } // End of while loop

        // If the last row has fewer than 3 cards, close the remaining row div
        if ($counter % 3 != 0) {
          echo '</div>';  // Close the div for the last row
        }
        echo '</section>';
      }
      ?>

      <script>
        // JavaScript to handle video play, stop it, and show message
        document.addEventListener('DOMContentLoaded', function() {
          const videos = document.querySelectorAll('video');
          videos.forEach(function(video) {
            video.controls = false;
            video.addEventListener('play', function(event) {
              event.preventDefault();
              const courseId = video.id.split('-')[1];
              const messageDiv = document.getElementById('message-' + courseId);
              messageDiv.classList.remove('hidden');
              setTimeout(function() {
                messageDiv.classList.add('hidden');
              }, 3000);
            });
          });
        });
      </script>

    </section>






    <!-- All Design Courses -->
    <section>
      <h2 class="mt-5 text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All Design Courses</h2>
      <?php
      include('database.php');

      // Ensure the user is logged in
      if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
      }

      // Get the search query from the form submission
      $searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

      // Query to fetch all design courses that match the search query
      $query = "SELECT c.course_id, c.title, c.description, c.category, c.price, 
                 i.user_id AS instructor_id, u.firstName, u.lastName, u.profile_pic,
                 fp.post_date
          FROM Course c
          JOIN Instructor i ON c.instructor_id = i.instructor_id
          JOIN User u ON i.user_id = u.user_id
          LEFT JOIN Forum_Post fp ON c.course_id = fp.course_id
          WHERE c.status = 'active' AND c.category = 'Design'
          AND (c.title LIKE ? OR c.description LIKE ?)";
      $stmt = $conn->prepare($query);
      $searchTerm = "%$searchQuery%";
      $stmt->bind_param("ss", $searchTerm, $searchTerm);
      $stmt->execute();
      $result = $stmt->get_result();

      // Check if any courses were found
      if ($result->num_rows === 0) {
        echo '<p class="mt-5 text-center  text-white p-5 font-extrabold">No courses found.</p>';
      } else {

        echo '<section class="lg:ml-32">';

        // Initialize a counter to track the courses in each row
        $counter = 0;

        // Loop through all matching courses and display them
        while ($course = $result->fetch_assoc()) {
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
          <!-- Course card -->
          <div class="relative flex ml-5 flex-col my-6 text-white bg-[#283747] shadow-sm border border-slate-200 rounded-lg w-96">
            <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
              <video class="h-full w-full rounded-lg" id="video-<?php echo $course['course_id']; ?>" controls>
                <source src="<?php echo $video_content['file_url']; ?>" type="video/mp4" />
                Your browser does not support the video tag.
              </video>
              <div id="message-<?php echo $course['course_id']; ?>" class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black bg-opacity-60 text-white text-xl font-bold hidden">
                Please buy the course first to play the video.
              </div>
            </div>
            <div class="p-4">
              <h6 class="mb-2 text-white text-xl font-semibold">
                <?php echo htmlspecialchars($course['title']); ?>
              </h6>
              <p class="text-white leading-normal font-light">
                <?php echo htmlspecialchars($course['description']); ?>
              </p>
              <h4 class="font-bold">Category: <?php echo htmlspecialchars($course['category']); ?></h4>
              <h4 class="font-bold">Price: $<?php echo number_format($course['price'], 2); ?></h4>
            </div>
            <div class="flex items-center justify-between p-4">
              <div class="flex items-center">
                <img alt="<?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>"
                  src="<?php echo $course['profile_pic']; ?>"
                  class="relative inline-block h-8 w-8 rounded-full" />
                <div class="flex flex-col ml-3 text-sm">
                  <span class="text-white font-semibold">
                    <?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>
                  </span>
                  <span class="text-white">
                    <?php echo date('F j, Y', strtotime($course['post_date'])); ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
      <?php
          // Close the row after 3 cards
          $counter++;
          if ($counter % 3 == 0) {
            echo '</div>';  // Close the div for the row
          }
        } // End of while loop

        // If the last row has fewer than 3 cards, close the remaining row div
        if ($counter % 3 != 0) {
          echo '</div>';  // Close the div for the last row
        }
        echo '</section>';
      }
      ?>

      <script>
        // JavaScript to handle video play, stop it, and show message
        document.addEventListener('DOMContentLoaded', function() {
          const videos = document.querySelectorAll('video');
          videos.forEach(function(video) {
            video.controls = false;
            video.addEventListener('play', function(event) {
              event.preventDefault();
              const courseId = video.id.split('-')[1];
              const messageDiv = document.getElementById('message-' + courseId);
              messageDiv.classList.remove('hidden');
              setTimeout(function() {
                messageDiv.classList.add('hidden');
              }, 3000);
            });
          });
        });
      </script>

    </section>



    <!-- All IT and Software Courses -->
    <section>
      <h2 class="mt-5 text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All IT and Software Courses</h2>
      <?php
      include('database.php');

      // Ensure the user is logged in
      if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
      }

      // Get the search query from the form submission
      $searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

      // Query to fetch all IT and Software courses that match the search query
      $query = "SELECT c.course_id, c.title, c.description, c.category, c.price, 
                 i.user_id AS instructor_id, u.firstName, u.lastName, u.profile_pic,
                 fp.post_date
          FROM Course c
          JOIN Instructor i ON c.instructor_id = i.instructor_id
          JOIN User u ON i.user_id = u.user_id
          LEFT JOIN Forum_Post fp ON c.course_id = fp.course_id
          WHERE c.status = 'active' AND c.category = 'IT and Software'
          AND (c.title LIKE ? OR c.description LIKE ?)";

      $stmt = $conn->prepare($query);
      $searchTerm = "%$searchQuery%";
      $stmt->bind_param("ss", $searchTerm, $searchTerm);
      $stmt->execute();
      $result = $stmt->get_result();

      // Check if any courses were found
      if ($result->num_rows === 0) {
        echo '<p class="mt-5 text-center  text-white p-5 font-extrabold">No courses found.</p>';
      } else {

        echo '<section class="lg:ml-32">';

        // Initialize a counter to track the courses in each row
        $counter = 0;

        // Loop through all matching courses and display them
        while ($course = $result->fetch_assoc()) {
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
          <!-- Course card -->
          <div class="relative flex ml-5 flex-col my-6 text-white bg-[#283747] shadow-sm border border-slate-200 rounded-lg w-96">
            <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
              <video class="h-full w-full rounded-lg" id="video-<?php echo $course['course_id']; ?>" controls>
                <source src="<?php echo $video_content['file_url']; ?>" type="video/mp4" />
                Your browser does not support the video tag.
              </video>
              <div id="message-<?php echo $course['course_id']; ?>" class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black bg-opacity-60 text-white text-xl font-bold hidden">
                Please buy the course first to play the video.
              </div>
            </div>
            <div class="p-4">
              <h6 class="mb-2 text-white text-xl font-semibold">
                <?php echo htmlspecialchars($course['title']); ?>
              </h6>
              <p class="text-white leading-normal font-light">
                <?php echo htmlspecialchars($course['description']); ?>
              </p>
              <h4 class="font-bold">Category: <?php echo htmlspecialchars($course['category']); ?></h4>
              <h4 class="font-bold">Price: $<?php echo number_format($course['price'], 2); ?></h4>
            </div>
            <div class="flex items-center justify-between p-4">
              <div class="flex items-center">
                <img alt="<?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>"
                  src="<?php echo $course['profile_pic']; ?>"
                  class="relative inline-block h-8 w-8 rounded-full" />
                <div class="flex flex-col ml-3 text-sm">
                  <span class="text-white font-semibold">
                    <?php echo htmlspecialchars($course['firstName'] . ' ' . $course['lastName']); ?>
                  </span>
                  <span class="text-white">
                    <?php echo date('F j, Y', strtotime($course['post_date'])); ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
      <?php
          // Close the row after 3 cards
          $counter++;
          if ($counter % 3 == 0) {
            echo '</div>';  // Close the div for the row
          }
        } // End of while loop

        // If the last row has fewer than 3 cards, close the remaining row div
        if ($counter % 3 != 0) {
          echo '</div>';  // Close the div for the last row
        }
        echo '</section>';
      }
      ?>

      <script>
        // JavaScript to handle video play, stop it, and show message
        document.addEventListener('DOMContentLoaded', function() {
          const videos = document.querySelectorAll('video');
          videos.forEach(function(video) {
            video.controls = false;
            video.addEventListener('play', function(event) {
              event.preventDefault();
              const courseId = video.id.split('-')[1];
              const messageDiv = document.getElementById('message-' + courseId);
              messageDiv.classList.remove('hidden');
              setTimeout(function() {
                messageDiv.classList.add('hidden');
              }, 3000);
            });
          });
        });
      </script>
    </section>

    <!-- All Instructors -->
    <section>
      <h2 class="mt-5 mb-5 text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All Instructors</h2>
      <?php
      include("database.php");

      $searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

      // Prepare and execute the query to search instructors by name (first name or last name)
      $sql = "SELECT user_id, firstName, lastName, email, profile_pic, bio 
        FROM User 
        WHERE role = 'instructor' 
        AND (firstName LIKE ? OR lastName LIKE ?)";
      $stmt = $conn->prepare($sql);
      $searchTerm = "%$searchQuery%";
      $stmt->bind_param("ss", $searchTerm, $searchTerm);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        echo '<div class="all-instructor flex flex-wrap justify-center gap-6">';  // Adjusted gap between cards

        while ($row = $result->fetch_assoc()) {
          $user_id = $row['user_id'];

          // Fetch uploaded courses for the instructor
          $course_sql = "SELECT title FROM Course WHERE instructor_id = (
                            SELECT instructor_id FROM Instructor WHERE user_id = ?
                        )";
          $course_stmt = $conn->prepare($course_sql);
          $course_stmt->bind_param("i", $user_id);
          $course_stmt->execute();
          $course_result = $course_stmt->get_result();
          $courses = [];
          while ($course = $course_result->fetch_assoc()) {
            $courses[] = $course['title'];
          }
          $course_stmt->close();

          // Display the instructor card
          echo '<div class="bg-[#283747] p-6 shadow-xl w-full max-w-sm rounded-2xl font-sans overflow-hidden">';
          echo '<div class="flex flex-col items-center">';
          echo '<div class="min-h-[110px]">';
          echo '<img src="' . htmlspecialchars($row["profile_pic"] ?: "default-profile.png") . '" class="w-28 h-28 rounded-full border-4 border-white" />';
          echo '</div>';
          echo '<div class="mt-4 text-center">';
          echo '<p class="text-lg text-white font-bold">' . htmlspecialchars($row["firstName"] . " " . $row["lastName"]) . '</p>';
          echo '<p class="text-sm text-white mt-1">' . htmlspecialchars($row["email"]) . '</p>';
          echo '<p class="text-sm text-white mt-1">' . htmlspecialchars($row["bio"]) . '</p>';
          echo '</div>';

          // Display the list of courses if available
          if (!empty($courses)) {
            echo '<div class="mt-4 text-white">';
            echo '<p class="font-bold text-lg mb-2">Courses:</p>';
            echo '<ul class="list-disc pl-5 space-y-2">';
            foreach ($courses as $course) {
              echo '<li class="text-sm">' . htmlspecialchars($course) . '</li>';
            }
            echo '</ul>';
            echo '</div>';
          } else {
            echo '<p class="text-sm text-gray-400">No courses uploaded.</p>';
          }

          echo '</div>';  // Close the instructor card div
          echo '</div>';  // Close the all-instructor div
        }

        echo '</div>';  // Close the flex wrapper
      } else {
        echo '<p class="text-center text-gray-500">No instructors found.</p>';
      }

      $conn->close();
      ?>

    </section>




  </main>



  <script src="js/script.js"></script>



  <?php include('footer.php') ?>

</body>


</html>