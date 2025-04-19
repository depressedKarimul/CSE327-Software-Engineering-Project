
<!DOCTYPE html>
<html lang="en" >
<head>
<?php include('../Styles/head_content.php') ?>
</head>
<body>

<header class="mb-5">
  <!-- Navigation -->
   <nav>
   <div class="navbar bg-base-100">
  <div class="navbar-start">
    <div class="dropdown bg-[#1D232A]">
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
        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
        <li><a href="#students">All Students</a></li>
    <li><a href="#instructors">All Instructors</a></li>
    <li><a href="#courses">All Courses</a></li>
      </ul>
    </div>
  </div>
  <div class="navbar-center">
    <a class="btn btn-ghost text-xl">SkillPro Admin Panel</a>
  </div>
  <div class="navbar-end">
    <button class="btn btn-ghost btn-circle">
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
    <a href="approve_request.php"  class="btn btn-ghost btn-circle">
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
        <span class="badge badge-xs badge-primary indicator-item"></span>
      </div>
    </a>
  </div>
</div>
   </nav>


   


</header>


<main>

<h2 id="students" class="text-center text-4xl text-white bg-[#283747] p-5 font-extrabold" >All Students</h2>

<div  class="all-student mt-6 ">
    <?php
    include("../database/database.php");

    // Fetch all students
    $sql = "SELECT 
                User.user_id, 
                User.firstName, 
                User.lastName, 
                User.email, 
                User.profile_pic, 
                User.bio
            FROM User
            WHERE User.role = 'student'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="all-student flex flex-wrap justify-center gap-4">';

        while ($row = $result->fetch_assoc()) {
            // Fetch courses for the student
            $course_sql = "SELECT Course.title 
                           FROM Enrollment
                           JOIN Course ON Enrollment.course_id = Course.course_id
                           WHERE Enrollment.user_id = ?";
            $course_stmt = $conn->prepare($course_sql);
            $course_stmt->bind_param("i", $row['user_id']);
            $course_stmt->execute();
            $courses_result = $course_stmt->get_result();
            $courses = [];
            while ($course = $courses_result->fetch_assoc()) {
                $courses[] = $course['title'];
            }
            $course_stmt->close();

            // Display the student card
            echo '<div class="bg-[#283747] p-6 shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full max-w-sm rounded-2xl font-[sans-serif] overflow-hidden highlight">';
            echo '<div class="flex flex-col items-center">';
            echo '<div class="min-h-[110px]">';
            echo '<img src="' . htmlspecialchars($row["profile_pic"] ?: "default-profile.png") . '" class="w-28 h-w-28 rounded-full" />';
            echo '</div>';
            echo '<div class="mt-4 text-center">';
            echo '<p class="text-lg text-white font-bold">' . htmlspecialchars($row["firstName"] . " " . $row["lastName"]) . '</p>';
            echo '<p class="text-sm text-white mt-1">' . htmlspecialchars($row["email"]) . '</p>';
            echo '<p class="text-sm text-white mt-1">' . htmlspecialchars($row["bio"]) . '</p>';
            if (!empty($courses)) {
                echo '<p class="text-sm text-white mt-1">Courses:</p>';
                echo '<ul class="text-sm text-white">';
                foreach ($courses as $course) {
                    echo '<li>' . htmlspecialchars($course) . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p class="text-sm text-white mt-1">No courses enrolled</p>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<p class="text-center text-gray-500">No students found.</p>';
    }

    $conn->close();
    ?>
</div>


<section>
<h2 id="instructors" class="mt-5 text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All Instructors</h2>

<div  class="all-instructor mt-6">

<?php
include("../database/database.php");

// Fetch all instructors
$sql = "SELECT user_id, firstName, lastName, email, profile_pic, bio FROM User WHERE role = 'instructor'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="all-instructor flex flex-wrap justify-center gap-6">';  // Adjusted gap between cards
    
    while ($row = $result->fetch_assoc()) {
        $user_id = $row['user_id'];

        // Fetch uploaded courses for the instructor
        $course_sql = "
            SELECT c.title 
            FROM Course c
            JOIN Instructor i ON c.instructor_id = i.instructor_id
            WHERE i.user_id = ?
        ";
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
        echo '<div class="bg-[#283747] p-6 shadow-xl w-full max-w-sm rounded-2xl font-sans overflow-hidden highlight">';
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

        // Delete Instructor Button (Danger Button)
        echo '<form method="POST" action="delete_instructor.php" onsubmit="return confirm(\'Are you sure you want to delete this instructor?\');">';
        echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
        echo '<button type="submit" class="mt-4 bg-red-600 text-white hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-semibold py-2 px-4 rounded-md border border-red-600 transition duration-200 ease-in-out">';
        echo 'Delete Instructor';
        echo '</button>';
        echo '</form>';

        echo '</div>';  // Close the instructor card div
        echo '</div>';  // Close the all-instructor div
    }

    echo '</div>';  // Close the flex wrapper
} else {
    echo '<p class="text-center text-gray-500">No Instructors Found.</p>';
}

$conn->close();
?>


</div>

</section>


<!-- All Courses -->
<h2 id="courses" class="mt-5 text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">All Courses</h2>
<section  class="flex justify-center items-center min-h-screen">

    <div class="max-w-screen-xl w-full px-4 py-6">

        <div class="mt-6">
            <?php
            include('../database/database.php');

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

            // Start a new row after every 3 cards
            echo '<div class="flex flex-wrap justify-center gap-6">';

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
            <div class="relative flex flex-col my-6 text-white bg-[#283747] shadow-lg border border-slate-200 rounded-lg w-80 highlight">
                <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <video class="h-full w-full rounded-lg" controls>
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

                <!-- Delete Course Button (Danger Button) -->
                <form method="POST" action="delete_course.php" onsubmit="return confirm('Are you sure you want to delete this course?');">
                    <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                    <button type="submit" class="mt-4 ml-5 mb-5 bg-red-600 text-white hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-semibold py-2 px-4 rounded-md border border-red-600 transition duration-200 ease-in-out">
                        Delete Course
                    </button>
                </form>

            </div> 

            <?php
                // Increment the counter
                $counter++;

                // Close the row div after every 3 cards
                if ($counter % 3 == 0) {
                    echo '</div><div class="flex flex-wrap justify-center gap-6">'; // Close the current row and start a new one
                }
            } // End of while loop

            // Close the last row div if there are fewer than 3 cards
            if ($counter % 3 != 0) {
                echo '</div>'; // Close the remaining flex row div
            }
            ?>

        </div>

    </div>

</section>






</main>






  <?php include('../Styles/footer.php') ?>
</body>
</html>