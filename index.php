<?php 
session_start();
include("configure.php");

// If user is already logged in, stay on index.php
if (isset($_SESSION['valid'])) {
    // User is logged in, continue to index.php without redirecting
} else {
    // User is not logged in, redirect to signin.php
    header("Location: signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Email'];
    $password = $_POST['Password'];

    // Validate user credentials (this is just an example, use proper validation and hashing in production)
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$email' AND password='$password'");
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $username;

        // Set the user_logged_in cookie with a 1-day expiration
        setcookie("user_logged_in", "true", time() + (86400), "/"); // 86400 seconds = 1 day

        header("Location: index.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeluangKarir</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <a href="index.php" class="logo">PeluangKarir</a>
        <nav>
            <ul>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="community.php">Community & Forum</a></li>
                <li><a href="job-board.php">Job Board</a></li>
                <li><a href="career-coach.php">Virtual Career Coach</a></li>
                <li><a href="resume-ai.php">AI Resume & Cover Letter</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php"><button class="btn">Log Out</button></a></li>
            </ul>
        </nav>
        <button id="toggle-mode">🌙</button>
    </header>

    <main>
        <section class="dashboard">
            <h1>Selamat Datang di PeluangKarir</h1>

            <div class="container">
                <div class="stats">
                    <div class="card">
                        <h3>Your Progress</h3>
                        <canvas id="progressChart"></canvas>
                    </div>
                </div>
        
                <!-- Job Categories -->
                <h2>Job Categories</h2>
                <div class="job-categories">
                    <div class="job-card">
                        <img src="nurse.png" alt="Nurse">
                        <p>Nurse</p>
                    </div>
                    <div class="job-card">
                        <img src="dev.png" alt="Software Engineer">
                        <p>Software Engineer</p>
                    </div>
                    <div class="job-card">
                        <img src="mark.png" alt="Marketing">
                        <p>Marketing</p>
                    </div>
                    <div class="job-card">
                        <img src="ghostbuster.png" alt="GhostBusters">
                        <p>GhostBusters</p>
                    </div>
                    <div class="job-card">
                        <img src="salesman.png" alt="Bubur Sales">
                        <p>Bubur Sales</p>
                    </div>
                    <div class="job-card">
                        <img src="thief.png" alt="Thief">
                        <p>Thief</p>
                    </div>
                </div>
                    
                <div class="featured-jobs">
                    <h2>Featured Job Offers</h2>
                    <div class="job-list">
                        <div class="job-item">Software Engineer - Google</div>
                        <div class="job-item">Data Analyst - Microsoft</div>
                        <div class="job-item">Marketing Specialist - Tesla</div>
                    </div>
                </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 PeluangKarir. All rights reserved.</p>
    </footer>

</body>
</html>
