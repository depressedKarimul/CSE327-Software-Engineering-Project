<?php
// Include database configuration
include('database.php');
session_start();

$message = ""; // For success/error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form inputs
    $course_id = $_POST['course_id'];
    $total_questions = $_POST['total_questions'];
    $passing_marks = $_POST['passing_marks'];

    // Check if course ID exists in the database
    $check_course_query = "SELECT * FROM Course WHERE course_id = ?";
    $stmt_check_course = $conn->prepare($check_course_query);
    $stmt_check_course->bind_param("i", $course_id);
    $stmt_check_course->execute();
    $course_result = $stmt_check_course->get_result();

    if ($course_result->num_rows == 0) {
        $message = "Course ID does not exist in the database.";
    } else {
        // Insert data into Quiz table
        $insert_quiz_query = "
            INSERT INTO Quiz (course_id, total_questions, passing_marks) 
            VALUES (?, ?, ?)
        ";
        $stmt_quiz = $conn->prepare($insert_quiz_query);
        $stmt_quiz->bind_param("iii", $course_id, $total_questions, $passing_marks);

        if ($stmt_quiz->execute()) {
            $quiz_id = $stmt_quiz->insert_id; // Get the ID of the newly inserted quiz

            // Insert questions into the Question table
            $questions = $_POST['questions']; // Expecting an array of questions from the form
            $errors = [];

            foreach ($questions as $question) {
                $question_text = $question['text'];
                $question_type = $question['type'];
                $answer = $question['answer'];

                $insert_question_query = "
                    INSERT INTO Question (quiz_id, question_text, question_type, answer) 
                    VALUES (?, ?, ?, ?)
                ";
                $stmt_question = $conn->prepare($insert_question_query);
                $stmt_question->bind_param("isss", $quiz_id, $question_text, $question_type, $answer);

                if (!$stmt_question->execute()) {
                    $errors[] = "Error adding question: " . $stmt_question->error;
                }
            }

            if (empty($errors)) {
                $message = "Quiz and questions uploaded successfully!";
            } else {
                $message = "Quiz uploaded, but some questions failed: " . implode(", ", $errors);
            }
        } else {
            $message = "Error creating quiz: " . $stmt_quiz->error;
        }
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
<body class="bg-cover bg-center" style="background-image: url('https://img.freepik.com/free-photo/cool-geometric-triangular-figure-neon-laser-light-great-backgrounds-wallpapers_181624-9331.jpg?t=st=1733140206~exp=1733143806~hmac=b1e4b10de61c6296088f643d3120b628163bd86f9eabbc2f96f60707432a3024&w=1060');">
    <div class="min-h-screen flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="max-w-4xl mx-auto bg-transparent shadow-md rounded-lg p-6 backdrop-blur-md">
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Upload Quiz</h1>
            
            <form method="POST" class="space-y-6" onsubmit="return validateForm()">
                <!-- Course ID -->
                <div>
                    <label for="course_id" class="block text-lg font-medium text-white">Course ID:</label>
                    <input 
                        id="course_id"
                        name="course_id" 
                        class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    >
                    <span id="course-id-error" class="text-red-500 text-sm hidden">Please enter a valid Course ID.</span>
                </div>
                
                <!-- Total Questions -->
                <div>
                    <label for="total_questions" class="block text-lg font-medium text-white">Total Questions:</label>
                    <input 
                        id="total_questions"
                        name="total_questions" 
                        class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    >
                    <span id="total-questions-error" class="text-red-500 text-sm hidden">Please enter the total number of questions.</span>
                </div>
                
                <!-- Passing Marks -->
                <div>
                    <label for="passing_marks" class="block text-lg font-medium text-white">Passing Marks:</label>
                    <input 
                        id="passing_marks"
                        name="passing_marks" 
                        class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    >
                    <span id="passing-marks-error" class="text-red-500 text-sm hidden">Please enter the passing marks.</span>
                </div>
                
                <!-- Questions Section -->
                <h3 class="text-center text-3xl font-semibold text-[white]">Questions</h3>
                <div id="questions-container" class="space-y-6">
                    <div class="question bg-transparent p-4 rounded-lg shadow-sm">
                        <label class="block text-lg font-medium text-white">Question Text:</label>
                        <input 
                            type="text" 
                            name="questions[0][text]" 
                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        >

                        <label class="block text-lg font-medium text-white mt-4">Question Type:</label>
                        <select 
                            name="questions[0][type]" 
                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        >
                            <option value="multiple_choice">Multiple Choice</option>
                            <option value="true_false">True/False</option>
                            <option value="short_answer">Short Answer</option>
                        </select>

                        <label class="block text-lg font-medium text-white mt-4">Answer:</label>
                        <input 
                            type="text" 
                            name="questions[0][answer]" 
                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        >
                    </div>
                </div>

                <!-- Add Question Button -->
                <button 
                    type="button" 
                    onclick="addQuestion()" 
                    class="w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-600 transition"
                >
                    Add Another Question
                </button>
                
                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-green-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-green-600 transition"
                >
                    Upload Quiz
                </button>
            </form>
            
            <!-- Success/Error Message -->
            <p class="text-center text-lg font-medium text-[green] mt-4">
                <?php echo htmlspecialchars($message); ?>
            </p>
        </div>
    </div>

    <script>
        let questionIndex = 1;

        function addQuestion() {
            const container = document.getElementById('questions-container');
            const newQuestion = document.createElement('div');
            newQuestion.classList.add('bg-transparent', 'p-4', 'rounded-lg', 'shadow-sm', 'mt-6');
            newQuestion.innerHTML = `
                <div class="question">
                    <label class="block text-lg font-medium text-gray-700">Question Text:</label>
                    <input 
                        type="text" 
                        name="questions[${questionIndex}][text]" 
                        class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    <label class="block text-lg font-medium text-gray-700 mt-4">Question Type:</label>
                    <select 
                        name="questions[${questionIndex}][type]" 
                        class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        <option value="multiple_choice">Multiple Choice</option>
                        <option value="true_false">True/False</option>
                        <option value="short_answer">Short Answer</option>
                    </select>

                    <label class="block text-lg font-medium text-gray-700 mt-4">Answer:</label>
                    <input 
                        type="text" 
                        name="questions[${questionIndex}][answer]" 
                        class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>
            `;
            container.appendChild(newQuestion);
            questionIndex++;
        }

        function validateForm() {
            let isValid = true;
            
            // Validate Course ID
            const courseId = document.getElementById("course_id").value;
            if (!courseId) {
                document.getElementById("course-id-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("course-id-error").classList.add("hidden");
            }

            // Validate Total Questions
            const totalQuestions = document.getElementById("total_questions").value;
            if (!totalQuestions) {
                document.getElementById("total-questions-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("total-questions-error").classList.add("hidden");
            }

            // Validate Passing Marks
            const passingMarks = document.getElementById("passing_marks").value;
            if (!passingMarks) {
                document.getElementById("passing-marks-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("passing-marks-error").classList.add("hidden");
            }

            return isValid;
        }
    </script>
</body>

</html>
