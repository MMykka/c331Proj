<?php
// Start the session to store quiz data
session_start();

// Quiz questions and answers
$quizData = [
    [
        'question' => 'What is the capital of France?',
        'options' => ['London', 'Berlin', 'Paris', 'Madrid'],
        'correctAnswer' => 'Paris'
    ],
    [
        'question' => 'Which planet is known as the Red Planet?',
        'options' => ['Earth', 'Mars', 'Jupiter', 'Venus'],
        'correctAnswer' => 'Mars'
    ],
    [
        'question' => 'What is the largest mammal in the world?',
        'options' => ['Elephant', 'Giraffe', 'Blue Whale', 'Polar Bear'],
        'correctAnswer' => 'Blue Whale'
    ],
    [
        'question' => 'Which element has the chemical symbol "O"?',
        'options' => ['Gold', 'Oxygen', 'Osmium', 'Oganesson'],
        'correctAnswer' => 'Oxygen'
    ],
    [
        'question' => 'What is the largest organ in the human body?',
        'options' => ['Heart', 'Liver', 'Brain', 'Skin'],
        'correctAnswer' => 'Skin'
    ],
    [
        'question' => 'Which famous scientist developed the theory of relativity?',
        'options' => ['Isaac Newton', 'Albert Einstein', 'Marie Curie', 'Nikola Tesla'],
        'correctAnswer' => 'Albert Einstein'
    ],
    [
        'question' => 'What is the primary language spoken in Brazil?',
        'options' => ['Spanish', 'English', 'Portuguese', 'French'],
        'correctAnswer' => 'Portuguese'
    ],
    [
        'question' => 'Which of these is NOT a primary color?',
        'options' => ['Red', 'Yellow', 'Blue', 'Green'],
        'correctAnswer' => 'Green'
    ],
    [
        'question' => 'Which famous artist painted the Mona Lisa?',
        'options' => ['Vincent van Gogh', 'Leonardo da Vinci', 'Pablo Picasso', 'Michelangelo'],
        'correctAnswer' => 'Leonardo da Vinci'
    ],
    [
        'question' => 'How many continents are there on Earth?',
        'options' => ['5', '6', '7', '8'],
        'correctAnswer' => '7'
    ]
];

// Store quiz data in session for processing in results.php
$_SESSION['quiz_data'] = $quizData;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Quiz</title>
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
        
        .quiz-container {
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
        
        .question-container {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .question {
            font-size: 18px;
            margin-bottom: 15px;
            color: #34495e;
            font-weight: bold;
        }
        
        .option {
            margin-bottom: 10px;
        }
        
        .option label {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #f1f5f9;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .option label:hover {
            background-color: #e3e8ed;
        }
        
        .option input[type="radio"] {
            margin-right: 10px;
        }
        
        .submit-btn {
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
            transition: background-color 0.2s;
        }
        
        .submit-btn:hover {
            background-color: #2980b9;
        }
        
        @media (max-width: 600px) {
            .quiz-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h1>Knowledge Quiz Challenge</h1>
        
        <form action="process.php" method="post">
            <?php foreach ($quizData as $index => $question): ?>
                <div class="question-container">
                    <div class="question">
                        <?php echo ($index + 1) . '. ' . htmlspecialchars($question['question']); ?>
                    </div>
                    
                    <div class="options">
                        <?php foreach ($question['options'] as $optionIndex => $option): ?>
                            <div class="option">
                                <label>
                                    <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($option); ?>" required>
                                    <?php echo htmlspecialchars($option); ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <button type="submit" class="submit-btn">Submit Answers</button>
        </form>
    </div>
</body>
</html>