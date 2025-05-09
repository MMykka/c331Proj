<?php
// Start the session to store quiz data
session_start();

// Include the configuration file
include_once 'config.php';

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
    <title><?php echo $appName; ?></title>
    <link rel="stylesheet" href="quizphp.css">
</head>
<body>
    <div class="quiz-container">
        <h1><?php echo $appName; ?></h1>
        
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