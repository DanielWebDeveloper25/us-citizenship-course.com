<?php
session_start();
// No longer redirect if not logged in - everyone can access materials
// Login only provides progress tracking benefits
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Study Materials - American Civics Institute</title>
  <link rel="stylesheet" href="u-course-page.css">
  <style>
    /* Basic fallback styles in case the CSS file doesn't load */
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f7fafc; }
    .container { max-width: 900px; margin: 0 auto; padding: 20px; background: white; border-radius: 8px; }
    .nav-bar { display: flex; justify-content: space-between; background: #f0f0f0; padding: 20px 0; margin-bottom: 20px; border-bottom: 2px solid #2c5282; }
    .btn { display: inline-block; background: #2c5282; color: white; padding: 16px 24px; margin: 10px 5px; text-decoration: none; border-radius: 8px; text-align: center; }
    .button-group { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 30px 0; }
    .video-section { margin-top: 40px; text-align: center; }
    video { max-width: 100%; border-radius: 8px; }
  </style>
</head>
<body>
    <div class="container">
        <div class="nav-bar">
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <div class="welcome-message">Welcome back, <?php echo htmlspecialchars($_SESSION['name'] ?? 'Student'); ?>!</div>
                <div class="logout-container">
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            <?php else: ?>
                <div class="welcome-message">Study Materials - Free Access</div>
                <div class="login-container">
                    <a href="u-login.php" class="login-btn">Login for Progress Tracking</a>
                </div>
            <?php endif; ?>
        </div>

        <h1>Complete Study Materials</h1>
        <p>Access comprehensive citizenship study materials and practice tests. <?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'Your progress is being tracked.' : 'Login to track your progress and save results.'; ?></p>
        
        <div class="materials-grid">
            <div class="material-card">
                <span class="material-icon">📋</span>
                <h3>Practice Questions</h3>
                <p>100 official civics questions</p>
            </div>
            <div class="material-card">
                <span class="material-icon">📖</span>
                <h3>Study Guide</h3>
                <p>Comprehensive preparation guide</p>
            </div>
            <div class="material-card">
                <span class="material-icon">🗂️</span>
                <h3>Flash Cards</h3>
                <p>Quick review materials</p>
            </div>
            <div class="material-card">
                <span class="material-icon">📝</span>
                <h3>Word List</h3>
                <p>Essential vocabulary terms</p>
            </div>
        </div>

        <div class="button-group">
            <a href="#" id="downloadBtn1" class="btn">📋 Download 100 Questions</a>
            <a href="#" id="downloadBtn2" class="btn">📖 Pocket Study Guide</a>
            <a href="#" id="downloadBtn3" class="btn">🗂️ Civics Flash Cards</a>
            <a href="#" id="downloadBtn4" class="btn">📄 Interview Transcript</a>
            <a href="#" id="downloadBtn5" class="btn">📝 Essential Word List</a>
            <a href="questions.html" class="btn">🎯 Take The Civics Test</a>
        </div>
        
        <div class="video-section" id="video">
            <h2>Naturalization Interview Example</h2>
            <p>Watch this official USCIS video to understand what to expect during your naturalization interview.</p>
            <video controls>
                <source src="https://www.uscis.gov/sites/default/files/document/videos/Naturalization_Interview.mp4" type="video/mp4">
                Your browser does not support the video tag. Please <a href="https://www.uscis.gov/sites/default/files/document/videos/Naturalization_Interview.mp4" target="_blank">download the video</a> to watch it.
            </video>
        </div>

        <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
        <div class="login-prompt">
            <h3>Want to Track Your Progress?</h3>
            <p>Create a free account to save your test results, track your learning progress, and get personalized recommendations.</p>
            <div class="prompt-buttons">
                <a href="u-registration.php" class="btn btn-primary">Create Free Account</a>
                <a href="u-login.php" class="btn btn-secondary">Login</a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <script src="u-course-page.js"></script>
    <script>
        // Basic fallback script in case the JS file doesn't load
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Course page loaded successfully");
            
            // Add click handlers if external JS didn't load
            if (typeof setupDownloadButtons !== 'function') {
                const downloadButtons = document.querySelectorAll('[id^="downloadBtn"]');
                downloadButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log("Download button clicked: " + this.textContent);
                        alert("Download functionality would be triggered for: " + this.textContent.replace(/📋|📖|🗂️|📄|📝/g, '').trim());
                    });
                });
            }
        });
    </script>
</body>
</html>