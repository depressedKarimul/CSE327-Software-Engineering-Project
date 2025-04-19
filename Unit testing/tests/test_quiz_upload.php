<?php
function simulate_post($data) {
    $_POST = $data;
    ob_start();
    include 'quiz_upload.php';
    return ob_get_clean();
}

echo "<h2>Unit Testing quiz_upload.php</h2>";

// Test 1: Valid input
echo "<h3>Test 1: Valid Input</h3>";
$response = simulate_post([
    'course_id' => 32,  // make sure this ID exists in your Course table
    'total_questions' => 1,
    'passing_marks' => 10
]);
echo htmlentities($response);

// Test 2: Invalid Course ID
echo "<h3>Test 2: Invalid Course ID</h3>";
$response = simulate_post([
    'course_id' => 9999,
    'total_questions' => 10,
    'passing_marks' => 5
]);
echo htmlentities($response);

// Test 3: Missing total_questions
echo "<h3>Test 3: Missing total_questions</h3>";
$response = simulate_post([
    'course_id' => 32,
    'passing_marks' => 10
]);
echo htmlentities($response);

// Test 4: Non-numeric input
echo "<h3>Test 4: Non-numeric passing_marks</h3>";
$response = simulate_post([
    'course_id' => 32,
    'total_questions' => 1,
    'passing_marks' => 'five'
]);
echo htmlentities($response);
