<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join American Civics Institute - Start Your Citizenship Journey</title>
    <link href="u-registration.css" rel="stylesheet">
</head>
<body>
    <!-- Header matching homepage -->
    <header class="header">
        <div class="nav-container">
            <a href="u-index.html" class="logo">
                <div class="logo-icon"></div>
                <div class="logo-text">
                    <span class="logo-main">American Civics Institute</span>
                    <span class="logo-sub">Citizenship Education Center</span>
                </div>
            </a>
            <nav class="nav-links">
                <a href="u-index.html">← Back to Home</a>
                <a href="u-login.php">Login</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="registration-content">
                <!-- Left Side - Information -->
                <div class="info-section">
                    <div class="welcome-content">
                        <h1>Begin Your Journey to U.S. Citizenship</h1>
                        <p class="subtitle">Join thousands of aspiring citizens who have successfully prepared for their naturalization test with our comprehensive learning platform.</p>
                        
                        <div class="benefits-list">
                            <div class="benefit-item">
                                <div class="benefit-icon">📚</div>
                                <div class="benefit-text">
                                    <h3>Complete Study Materials</h3>
                                    <p>Access 100+ official practice questions, study guides, and flashcards</p>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <div class="benefit-icon">🎯</div>
                                <div class="benefit-text">
                                    <h3>Interactive Practice Tests</h3>
                                    <p>10 specialized sections covering all citizenship test topics</p>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <div class="benefit-icon">📊</div>
                                <div class="benefit-text">
                                    <h3>Progress Tracking</h3>
                                    <p>Monitor your learning with detailed analytics and performance reports</p>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <div class="benefit-icon">🎥</div>
                                <div class="benefit-text">
                                    <h3>Expert Video Content</h3>
                                    <p>Learn from naturalization interview examples and expert guidance</p>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial">
                            <blockquote>
                                "This platform made my citizenship test preparation so much easier. The practice questions were exactly like the real test!"
                            </blockquote>
                            <cite>— Maria S., New Citizen 2024</cite>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Registration Form -->
                <div class="form-section">
                    <div class="form-header">
                        <h2>Create Your Account</h2>
                        <p>Start learning today — it's completely free!</p>
                    </div>

                    <?php session_start(); 
                    if(isset($_GET['error'])) {
                        if($_GET['error'] == 'no_account') {
                            echo '<div class="error-message">No account found with that email. Please register below.</div>';
                        } elseif($_GET['error'] == 'email_exists') {
                            echo '<div class="error-message">An account with this email already exists. Please <a href="u-login.php">sign in</a> instead.</div>';
                        } elseif($_GET['error'] == 'required') {
                            echo '<div class="error-message">Please fill in all required fields.</div>';
                        } elseif($_GET['error'] == 'password_weak') {
                            echo '<div class="error-message">Password must be at least 6 characters long.</div>';
                        }
                    }
                    ?>

                    <form action="register.php" method="POST" id="registrationForm" class="registration-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone Number (Optional)</label>
                                <input type="tel" id="phone" name="phone" placeholder="(123) 456-7890" pattern="[0-9\-\(\)\s\+\.]*">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input type="password" id="password" name="password" placeholder="Create a secure password (min. 6 characters)" required minlength="6">
                                <div class="password-strength" id="passwordStrength"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password *</label>
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="register-btn" id="registerBtn">
                                <span class="btn-text">Create My Account</span>
                                <span class="btn-icon">→</span>
                            </button>
                            
                            <div class="login-prompt">
                                <p>Already have an account? <a href="u-login.php" class="login-link">Sign in here</a></p>
                            </div>
                        </div>
                    </form>

                    <div class="security-note">
                        <div class="security-icon">🔒</div>
                        <p>Your information is secure and will never be shared with third parties.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-links">
                <a href="u-index.html">Home</a>
                <a href="#about">About Us</a>
                <a href="#contact">Contact</a>
                <a href="u-login.php">Login</a>
            </div>
            <div class="copyright">
                © 2025 American Civics Institute. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registrationForm');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm_password');
            const passwordStrength = document.getElementById('passwordStrength');
            
            // Format phone number as user types
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length >= 6) {
                    value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
                } else if (value.length >= 3) {
                    value = value.replace(/(\d{3})(\d{3})/, '($1) $2');
                }
                e.target.value = value;
            });
            
            // Password strength indicator
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                let message = '';
                let color = '';
                
                if (password.length >= 6) strength++;
                if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
                if (password.match(/[0-9]/)) strength++;
                if (password.match(/[^a-zA-Z0-9]/)) strength++;
                
                switch(strength) {
                    case 0:
                    case 1:
                        message = 'Weak password';
                        color = '#e53e3e';
                        break;
                    case 2:
                        message = 'Fair password';
                        color = '#dd6b20';
                        break;
                    case 3:
                        message = 'Good password';
                        color = '#38a169';
                        break;
                    case 4:
                        message = 'Strong password';
                        color = '#2f855a';
                        break;
                }
                
                if (password.length > 0) {
                    passwordStrength.textContent = message;
                    passwordStrength.style.color = color;
                    passwordStrength.style.display = 'block';
                } else {
                    passwordStrength.style.display = 'none';
                }
                
                validateField(this, password.length >= 6);
                
                // Also check confirm password if it has a value
                if (confirmPasswordInput.value) {
                    validateField(confirmPasswordInput, password === confirmPasswordInput.value);
                }
            });
            
            // Real-time validation
            function validateField(field, condition, errorColor = '#e53e3e', successColor = '#2c5282') {
                if (field.value.length > 0) {
                    field.style.borderColor = condition ? successColor : errorColor;
                    field.style.boxShadow = condition ? `0 0 0 3px rgba(44, 82, 130, 0.1)` : `0 0 0 3px rgba(229, 62, 62, 0.1)`;
                }
                return condition;
            }
            
            nameInput.addEventListener('blur', function() {
                validateField(this, this.value.trim().length >= 2);
            });
            
            emailInput.addEventListener('blur', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                validateField(this, emailRegex.test(this.value));
            });
            
            confirmPasswordInput.addEventListener('input', function() {
                validateField(this, this.value === passwordInput.value);
            });
            
            // Form submission validation
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const fields = [nameInput, emailInput, passwordInput, confirmPasswordInput];
                
                // Validate required fields
                if (!nameInput.value.trim() || nameInput.value.trim().length < 2) {
                    validateField(nameInput, false);
                    isValid = false;
                }
                
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailInput.value)) {
                    validateField(emailInput, false);
                    isValid = false;
                }
                
                if (passwordInput.value.length < 6) {
                    validateField(passwordInput, false);
                    isValid = false;
                }
                
                if (passwordInput.value !== confirmPasswordInput.value) {
                    validateField(confirmPasswordInput, false);
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                    alert('Please correct the highlighted fields before submitting.');
                }
            });
        });
    </script>
</body>
</html>