<?php
// Start the session to access quiz data
session_start();

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
    
    // Redirect to results page
    header('Location: results.php');
    exit;
} else {
    // Redirect back to the quiz if accessed directly
    header('Location: index.php');
    exit;
}
?>