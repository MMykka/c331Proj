<?php
// Start the session to access quiz data
session_start();

// Include the configuration file
include_once 'config.php';

// Check if the form was submitted and quiz data exists
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['quiz_data'])) {
    $quizData = $_SESSION['quiz_data'];
    $userAnswers = $_POST['answers'] ?? [];
    $results = [];
    $score = 0;
    $totalQuestions = count($quizData);

    // Calculate the score and store results
    foreach ($quizData as $index => $question) {
        $userAnswer = $userAnswers[$index] ?? '';
        $isCorrect = ($userAnswer === $question['correctAnswer']);

        if ($isCorrect) {
            $score++;
        }

        $results[] = [
            'question' => $question['question'],
            'userAnswer' => $userAnswer,
            'correctAnswer' => $question['correctAnswer'],
            'isCorrect' => $isCorrect
        ];
    }

    // Calculate percentage
    $percentage = ($score / $totalQuestions) * 100;

    // Determine result message
    if ($percentage == 100) {
        $resultMessage = 'Perfect! You got all questions correct!';
    } elseif ($percentage >= 80) {
        $resultMessage = 'Excellent! You have a great knowledge base!';
    } elseif ($percentage >= 60) {
        $resultMessage = 'Good job! You did well!';
    } elseif ($percentage >= 40) {
        $resultMessage = 'Not bad! You got some questions right.';
    } else {
        $resultMessage = 'Try again! You can improve your score.';
    }

    // Store results in session
    $_SESSION['quiz_results'] = [
        'score' => $score,
        'totalQuestions' => $totalQuestions,
        'percentage' => $percentage,
        'resultMessage' => $resultMessage,
        'details' => $results
    ];

    // Connect to database and store answers
    try {
        // Create database connection using MySQLi as specified
        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement using MySQLi prepared statements
        $stmt = $conn->prepare("INSERT INTO $tableName (one, two, three, four, five, six, seven, eight, nine, ten)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Create temporary variables for binding
        $one = $userAnswers[0] ?? null;
        $two = $userAnswers[1] ?? null;
        $three = $userAnswers[2] ?? null;
        $four = $userAnswers[3] ?? null;
        $five = $userAnswers[4] ?? null;
        $six = $userAnswers[5] ?? null;
        $seven = $userAnswers[6] ?? null;
        $eight = $userAnswers[7] ?? null;
        $nine = $userAnswers[8] ?? null;
        $ten = $userAnswers[9] ?? null;

        // Bind parameters - all ten values are strings (VARCHAR)
        $stmt->bind_param(
            "ssssssssss",
            $one,
            $two,
            $three,
            $four,
            $five,
            $six,
            $seven,
            $eight,
            $nine,
            $ten
        );

        // Execute statement
        $stmt->execute();

        // Close statement
        $stmt->close();

        // Store database save status in session for confirmation on results page
        $_SESSION['db_save_status'] = 'success';
    } catch(Exception $e) {
        // Store error in session to display on results page
        $_SESSION['db_save_status'] = 'error';
        $_SESSION['db_error_message'] = $e->getMessage();
    }

    // Close connection
    if (isset($conn)) {
        $conn->close();
    }

    // Redirect to results page
    header('Location: results.php');
    exit;
} else {
    // Redirect back to the quiz if accessed directly
    header('Location: index.php');
    exit;
}
?>