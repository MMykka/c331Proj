<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
        
        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 20px;
        }
        
        .info-box {
            flex: 1;
            min-width: 220px;
            background: black;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5);
            text-align: center;
        }
        
        .info-box i {
            font-size: 24px;
            color: #f8b411;
            margin-bottom: 10px;
        }
        
        .info-box h3 {
            color: #f8b411;
        }
        
        .contact-form {
            background: #333;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.5);
            border: 1px solid #444;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: white;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 4px;
            font-size: 16px;
            background-color: #444;
            color: white;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #f8b411;
            box-shadow: 0 0 0 2px rgba(248, 180, 17, 0.3);
        }
        
        textarea {
            height: 150px;
            resize: vertical;
        }
        
        .error {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: 5px;
            display: none;
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
        }
        
        button:hover {
            background-color: white;
            color: black;
        }
        
        .success-message {
            display: none;
            background-color: black;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            border-left: 5px solid #f8b411;
        }
        
        .server-message {
            background-color: black;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            border-left: 5px solid #f8b411;
        }
        
        .server-error {
            border-left: 5px solid #ff6b6b;
        }
        
        .input-error {
            border: 1px solid #ff6b6b;
            background-color: rgba(255, 107, 107, 0.1);
        }
        
        /* Additional styling for the dark theme */
        .highlight {
            color: #f8b411;
        }
        
        .section-divider {
            height: 3px;
            background-color: #f8b411;
            margin: 20px 0;
            width: 100px;
            margin-left: auto;
            margin-right: auto;
        }
        
        ::placeholder {
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Contact <span class="highlight">Us</span></h1>
            <div class="section-divider"></div>
            <p>We'd love to hear from you. Please fill out the form below or use our contact information.</p>
        </header>
        
        <div class="contact-info">
            <div class="info-box">
                <i>📞</i>
                <h3>Phone</h3>
                <p>+1 (555) 123-4567</p>
            </div>
            
            <div class="info-box">
                <i>✉️</i>
                <h3>Email</h3>
                <p>info@company.com</p>
            </div>
            
            <div class="info-box">
                <i>🏢</i>
                <h3>Address</h3>
                <p>123 Business Ave.<br>City, State 12345</p>
            </div>
        </div>
        
        <div class="contact-form">
            <h2>Send Us a <span class="highlight">Message</span></h2>
            <div class="section-divider"></div>
            
            <form id="contactForm" action="contactaction.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name*</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name">
                    <div class="error" id="nameError">Please enter your full name</div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address*</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address">
                    <div class="error" id="emailError">Please enter a valid email address</div>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number (optional)">
                    <div class="error" id="phoneError">Please enter a valid phone number</div>
                </div>

                <div class="form-group">
                    <label for="message">Your Message*</label>
                    <textarea id="message" name="message" placeholder="Type your message here..."></textarea>
                    <div class="error" id="messageError">Please enter your message</div>
                </div>
                
                <button type="submit">SUBMIT MESSAGE</button>
            </form>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            
            contactForm.addEventListener('submit', function(e) {
                // Client-side validation before sending to server
                
                // Reset all error states
                resetErrors();
                
                // Get form values
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const subject = document.getElementById('subject').value;
                const message = document.getElementById('message').value.trim();
                
                // Validation flag
                let isValid = true;
                
                // Validate name (required)
                if (name === '') {
                    showError('name', 'nameError', 'Please enter your full name');
                    isValid = false;
                } else if (name.length < 2) {
                    showError('name', 'nameError', 'Name must be at least 2 characters');
                    isValid = false;
                }
                
                // Validate email (required)
                if (email === '') {
                    showError('email', 'emailError', 'Please enter your email address');
                    isValid = false;
                } else if (!isValidEmail(email)) {
                    showError('email', 'emailError', 'Please enter a valid email address');
                    isValid = false;
                }
                
                // Validate phone (optional but must be valid if provided)
                if (phone !== '' && !isValidPhone(phone)) {
                    showError('phone', 'phoneError', 'Please enter a valid phone number');
                    isValid = false;
                }
                
                // Validate subject (required)
                if (subject === '') {
                    showError('subject', 'subjectError', 'Please select a subject');
                    isValid = false;
                }
                
                // Validate message (required)
                if (message === '') {
                    showError('message', 'messageError', 'Please enter your message');
                    isValid = false;
                } else if (message.length < 10) {
                    showError('message', 'messageError', 'Your message must be at least 10 characters');
                    isValid = false;
                }
                
                // If the form is not valid, prevent submission
                if (!isValid) {
                    e.preventDefault();
                }
            });
            
            // Helper functions
            function showError(inputId, errorId, errorMessage) {
                const input = document.getElementById(inputId);
                const error = document.getElementById(errorId);
                
                input.classList.add('input-error');
                error.textContent = errorMessage;
                error.style.display = 'block';
            }
            
            function resetErrors() {
                // Remove all error classes
                const inputs = document.querySelectorAll('input, select, textarea');
                inputs.forEach(input => input.classList.remove('input-error'));
                
                // Hide all error messages
                const errors = document.querySelectorAll('.error');
                errors.forEach(error => error.style.display = 'none');
            }
            
            function isValidEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
            
            function isValidPhone(phone) {
                // Simple validation for demonstration
                // Accepts formats like: (123) 456-7890, 123-456-7890, 1234567890
                const re = /^[\d\+\-\(\) ]{7,20}$/;
                return re.test(phone);
            }
        });
    </script>
</body>
</html>