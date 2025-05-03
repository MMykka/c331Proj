<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session to retrieve form data
session_start();

// Check if form data exists in session
if (isset($_SESSION['form_data'])) {
    $formData = $_SESSION['form_data'];
    // Clear the session data after retrieving it
    unset($_SESSION['form_data']);
} else {
    // Redirect back to the contact form if no data is available
    header("Location: contact.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #222;
            color: white;
            line-height: 1.6;
        }
        
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }
        
        header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        h1, h2 {
            color: white;
            margin-bottom: 10px;
        }
        
        .thankyou-box {
            background: #333;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.5);
            border: 1px solid #444;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .submitted-data {
            background: #333;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.5);
            border: 1px solid #444;
        }
        
        .data-row {
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
        }
        
        .data-label {
            font-weight: bold;
            color: #f8b411;
            width: 150px;
        }
        
        .data-value {
            flex: 1;
        }
        
        .highlight {
            color: #f8b411;
        }
        
        .section-divider {
            height: 3px;
            background-color: #f8b411;
            margin: 20px auto;
            width: 100px;
        }
        
        button {
            background-color: #f8b411;
            color: black;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            margin-top: 20px;
        }
        
        button:hover {
            background-color: white;
            color: black;
        }
        
        a {
            color: #f8b411;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Thank <span class="highlight">You!</span></h1>
            <div class="section-divider"></div>
        </header>
        
        <div class="thankyou-box">
            <h2>Your Message Has Been <span class="highlight">Received</span></h2>
            <div class="section-divider"></div>
            <p>We appreciate you contacting us. One of our team members will get back to you shortly.</p>
            <a href="contact.php"><button>Return to Contact Form</button></a>
        </div>
        
        <div class="submitted-data">
            <h2>Submitted <span class="highlight">Information</span></h2>
            <div class="section-divider"></div>
            
            <div class="data-row">
                <div class="data-label">Name:</div>
                <div class="data-value"><?php echo htmlspecialchars($formData['name'] ?? 'Not provided'); ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Email:</div>
                <div class="data-value"><?php echo htmlspecialchars($formData['email'] ?? 'Not provided'); ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Phone:</div>
                <div class="data-value"><?php echo htmlspecialchars($formData['phone'] ?? 'Not provided'); ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Message:</div>
                <div class="data-value"><?php echo nl2br(htmlspecialchars($formData['message'] ?? 'Not provided')); ?></div>
            </div>
        </div>
    </div>
</body>
</html>