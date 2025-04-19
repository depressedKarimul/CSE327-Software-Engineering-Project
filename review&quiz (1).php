    <!-- My Enrolled Courses -->
    <h2 class="mt-5 justify-center text-center text-4xl text-white bg-[#283747] p-5 font-extrabold">My Enrolled Courses</h2>

<div class="lg:ml-32">
   <?php
include('database.php');

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

