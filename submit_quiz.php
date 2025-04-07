<?php
session_start();
include('database.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get logged-in user ID

// Fetch quiz_id and answers from POST
$quiz_id = $_POST['quiz_id'];
$answers = $_POST['answers'];

// Check each question's answer
$short_answer_correct = true;
$query_questions = "SELECT * FROM Question WHERE quiz_id = ?";
$stmt_questions = $conn->prepare($query_questions);
$stmt_questions->bind_param("i", $quiz_id);
$stmt_questions->execute();
$result_questions = $stmt_questions->get_result();

while ($question = $result_questions->fetch_assoc()) {
    $question_id = $question['question_id'];
    $correct_answer = $question['answer'];
    $user_answer = isset($answers[$question_id]) ? $answers[$question_id] : '';

    // Check short-answer question
    if ($question['question_type'] == 'short_answer') {
        if (trim(strtolower($user_answer)) !== trim(strtolower($correct_answer))) {
            $short_answer_correct = false;
        }
    }
}

// If all short-answer questions are correct, show the apply for certification button
if ($short_answer_correct) {
    echo "<script>document.getElementById('certSuccessMessage').classList.remove('hidden');</script>";
} else {
    echo "Some answers are incorrect. Try again!";
}

?>
