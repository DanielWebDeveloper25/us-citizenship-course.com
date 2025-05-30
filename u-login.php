<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - American Civics Institute</title>
    <link rel="stylesheet" href="u-login.css">
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="index.html">← Back to Home</a>
            <a href="#about">About Us</a>
            <a href="#contact">Contact</a>
        </div>
        
        <h1>Welcome Back</h1>
        <p class="subtitle">Sign in to access your citizenship study materials</p>
        
        <?php session_start(); 
        if(isset($_GET['error'])) {
            if($_GET['error'] == 'password') {
                echo '<div class="error-message">Incorrect password. Please try again.</div>';
            } elseif($_GET['error'] == 'email') {
                echo '<div class="error-message">No account found with that email address.</div>';
            } elseif($_GET['error'] == 'required') {
                echo '<div class="error-message">Please fill in all required fields.</div>';
            }
        }
        
        if(isset($_GET['success'])) {
            if($_GET['success'] == 'registered') {
                echo '<div class="success-message">Registration successful! Please sign in below.</div>';
            }
        }
        ?>
        
        <div class="form-section">
            <form action="login-process.php" method="POST" id="loginForm">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="login-btn">Sign In</button>
                <a href="u-registration.php" class="register-link">Don't have an account? Create one here →</a>
            </form>
        </div>
        
        <div class="footer">
            © 2025 American Civics Institute. All rights reserved.
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add form validation
            const form = document.getElementById('loginForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Reset previous error states
                emailInput.style.borderColor = '#e2e8f0';
                passwordInput.style.borderColor = '#e2e8f0';
                
                // Validate email
                if (!emailInput.value.trim()) {
                    emailInput.style.borderColor = '#e53e3e';
                    isValid = false;
                }
                
                // Validate password
                if (!passwordInput.value.trim()) {
                    passwordInput.style.borderColor = '#e53e3e';
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
            
            // Add real-time validation feedback
            emailInput.addEventListener('blur', function() {
                if (this.value.trim() && !this.value.includes('@')) {
                    this.style.borderColor = '#e53e3e';
                } else if (this.value.trim()) {
                    this.style.borderColor = '#2c5282';
                }
            });
            
            passwordInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.style.borderColor = '#2c5282';
                }
            });
        });
    </script>
</body>
</html>