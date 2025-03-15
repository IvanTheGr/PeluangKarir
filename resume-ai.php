<?php 
session_start();
include("configure.php");

// Redirect to login if user is not logged in
if (!isset($_SESSION['valid'])) {
    header("Location: signin.php");
    exit();
}

// Fetch user details
$id = $_SESSION['id'];
$query = $conn->prepare("SELECT * FROM users WHERE Id = ?");
if (!$query) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}
$query->bind_param("i", $id);
if (!$query->execute()) {
    die("Execute failed: (" . $query->errno . ") " . $query->error);
}
$result = $query->get_result();
if (!$result) {
    die("Getting result set failed: (" . $query->errno . ") " . $query->error);
}

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $res_Uname = htmlspecialchars($user['Username']);
} else {
    session_destroy();
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Resume & Cover Letter - PeluangKarir</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
    <header>
        <a href="index.php" class="logo">PeluangKarir</a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="community.php">Community & Forum</a></li>
                <li><a href="job-board.php">Job Board</a></li>
                <li><a href="career-coach.php">Virtual Career Coach</a></li>
                <li><a href="profile.php">Profil</a></li>
                <li><a href="logout.php"><button class="btn">Log Out</button></a></li>
            </ul>
        </nav>
        <button id="toggle-mode">🌙</button>
    </header>

    <main>
        <section class="resume-ai">
            <h1>AI Resume & Cover Letter</h1>
            <p>Masukkan informasi dan dapatkan resume/cover letter ATS-friendly.</p>

            <div class="resume-box">
                <label for="job-title">Posisi yang Dilamar:</label>
                <input type="text" id="job-title" placeholder="Contoh: Software Engineer" />

                <label for="experience">Pengalaman:</label>
                <textarea id="experience" placeholder="Jelaskan pengalaman kerja Anda"></textarea>

                <button id="generate-resume">Buat Resume</button>
            </div>

            <div id="generated-output"></div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 PeluangKarir. All rights reserved.</p>
    </footer>

    <script>
        const userName = "<?= $res_Uname ?>";

        document.getElementById('generate-resume').addEventListener('click', function() {
            const jobTitle = document.getElementById('job-title').value;
            const experience = document.getElementById('experience').value;

            // Add your logic to generate resume here
            document.getElementById('generated-output').innerText = `Generated resume for ${jobTitle} with experience: ${experience}`;

            // Store the generated resume in localStorage
            localStorage.setItem('generatedResume', document.getElementById('generated-output').innerText);

            // Redirect to resume-result.php
            window.location.href = 'resume-result.php';
        });
    </script>
    <script defer src="script.js"></script>
</body>
</html>
