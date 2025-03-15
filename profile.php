<?php 
session_start();
include("configure.php");

// If user is not logged in, redirect to login page
if (!isset($_SESSION['valid'])) {
    header("Location: signin.php");
    exit();
}

// Fetch user details
$id = $_SESSION['id'];
$query = $conn->prepare("SELECT * FROM users WHERE Id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $res_Uname = $user['Username'];
    $res_Email = $user['Email'];
    $res_Age = $user['Age'];
} else {
    // In case user data is missing, logout user and redirect to login
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
    <title>Profil - PeluangKarir</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">PeluangKarir</a>
        <nav>
            <ul>
                <li><a href="edit.php?Id=<?= $_SESSION['id'] ?>">Edit Profile</a></li>
                <li><a href="logout.php"><button class="btn">Log Out</button></a></li>
            </ul>
        </nav>
        <button id="toggle-mode">🌙</button>
    </header>

    <div class="picturecon">
        <div class="profile-pic-container">
            <img src="profile.jpg" alt="Foto Profil" class="profile-pic">
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?= htmlspecialchars($res_Uname) ?></b>, Welcome</p>
                </div>
            </div>
            <div class="middle">
                <div class="box">
                    <p>Your email is <b><?= htmlspecialchars($res_Email) ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And you are <b><?= htmlspecialchars($res_Age) ?> years old</b>.</p> 
                </div>
            </div>
        </div>
    </main>

    <hr>

    <!-- About Me -->
    <div class="profile-about">
        <h2>About Me</h2>
        <p>Saya seorang Software Engineer yang berpengalaman dalam pengembangan aplikasi berbasis web dan AI.</p>
    </div>

    <!-- Pendidikan -->
    <div class="profile-education">
        <h2>Pendidikan</h2>
        <p><strong>Gelar:</strong> S1 Teknik Informatika</p>
        <p><strong>Universitas:</strong> Universitas Indonesia</p>
        <p><strong>Tahun Lulus:</strong> 2023</p>
    </div>

    <!-- Educations and Certifications -->
    <div class="profile-certifications">
        <h2>Educations & Certifications</h2>
        <p>- Coursera: AI for Everyone</p>
        <p>- Google Cloud Certified</p>
    </div>

    <!-- Work Experience & Projects -->
    <div class="profile-work">
        <h2>Work Experience & Projects</h2>
        <p>- Software Engineer at XYZ Corp (3 years)</p>
        <p>- AI-based Health App Development</p>
    </div>

    <!-- Awards & Achievements -->
    <div class="profile-awards">
        <h2>Awards & Achievements</h2>
        <p>- Best Developer Award 2023</p>
    </div>

    <!-- Lomba / Penghargaan -->
    <div class="profile-competitions">
        <h2>Lomba / Penghargaan</h2>
        <p>- Juara 1 Hackathon 2022</p>
    </div>

    <!-- Tools -->
    <div class="profile-tools">
        <h2>Tools yang Dikuasai</h2>
        <p>- JavaScript, Python, React, TensorFlow</p>
    </div>

    <!-- Languages -->
    <div class="profile-languages">
        <h2>Languages</h2>
        <p>- Bahasa Indonesia (Fluent)</p>
        <p>- English (Advanced)</p>
    </div>

    <!-- Published Papers -->
    <div class="profile-papers">
        <h2>Published Papers</h2>
        <p>- "AI in Healthcare" (IEEE Journal, 2023)</p>
    </div>

    <button id="download-resume">Download Resume</button>

    <footer>
        <p>&copy; 2025 PeluangKarir. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById("download-resume").addEventListener("click", function() {
            alert("Resume ATS-friendly Anda sedang diproses...");
        });
    </script>
</body>
</html>
