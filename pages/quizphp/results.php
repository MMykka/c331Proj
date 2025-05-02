<?php
// Start the session to access quiz results
session_start();

// Check if results exist in session
if (!isset($_SESSION['quiz_results'])) {
    // Redirect to the quiz if no results are available
    header('Location: index.php');
    exit;
}

// Get results from session
$results = $_SESSION['quiz_results'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f8fa;
            padding: 20px;
        }
        
        .results-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        
        .summary {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .score {
            font-size: 24px;
            font-weight: bold;
            color: #3498db;
            margin-bottom: 10px;
        }
        
        .message {
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 20px;
        }
        
        .details {
            margin-bottom: 30px;
        }
        
        .result-item {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
        }
        
        .result-item.correct {
            background-color: #e6f7ed;
            border-left: 5px solid #27ae60;
        }
        
        .result-item.incorrect {
            background-color: #fdedec;
            border-left: 5px solid #e74c3c;
        }
        
        .result-question {
            font-weight: bold;
            margin-bottom: 10px;
            color: #34495e;
        }
        
        .result-answer {
            margin-bottom: 5px;
        }
        
        .result-answer.user {
            font-weight: bold;
        }
        
        .result-answer.correct {
            color: #27ae60;
        }
        
        .result-answer.incorrect {
            color: #e74c3c;
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="results-container">
        <h1>Quiz Results</h1>
        
        <div class="summary">
            <div class="score">
                Your Score: <?php echo $results['score']; ?>/<?php echo $results['totalQuestions']; ?> (<?php echo round($results['percentage']); ?>%)
            </div>
            <div class="message">
                <?php echo htmlspecialchars($results['resultMessage']); ?>
            </div>
        </div>
        
        <div class="details">
            <h2>Detailed Results:</h2>
            
            <?php foreach ($results['details'] as $index => $item): ?>
                <div class="result-item <?php echo $item['isCorrect'] ? 'correct' : 'incorrect'; ?>">
                    <div class="result-question">
                        <?php echo ($index + 1) . '. ' . htmlspecialchars($item['question']); ?>
                    </div>
                    
                    <div class="result-answer user <?php echo $item['isCorrect'] ? 'correct' : 'incorrect'; ?>">
                        Your answer: <?php echo htmlspecialchars($item['userAnswer']); ?>
                        <?php if ($item['isCorrect']): ?>
                            ✓
                        <?php else: ?>
                            ✗
                        <?php endif; ?>
                    </div>
                    
                    <?php if (!$item['isCorrect']): ?>
                        <div class="result-answer correct">
                            Correct answer: <?php echo htmlspecialchars($item['correctAnswer']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        
        <a href="index.php" class="btn">Try Again</a>
    </div>
</body>
</html>