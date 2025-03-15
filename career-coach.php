<?php
header('Content-Type: application/json');

$requestPayload = file_get_contents('php://input');
$requestData = json_decode($requestPayload, true);

if (isset($requestData['message'])) {
    $userMessage = $requestData['message'];
    // Here you can add logic to process the user's message and generate a response
    $responseMessage = "Anda berkata: " . $userMessage;

    echo json_encode(['response' => $responseMessage]);
} else {
    echo json_encode(['response' => 'Pesan tidak ditemukan.']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Career Coach - PeluangKarir</title>
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
                <li><a href="resume-ai.php">AI Resume & Cover Letter</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php"><button class="btn">Log Out</button></a></li>
            </ul>
        </nav>
        <button id="toggle-mode">🌙</button>
    </header>

    <main>
        <section class="career-coach">
            <h1>Virtual Career Coach</h1>
            <p>Konsultasikan jalur karirmu dengan AI.</p>
            <div class="chatbox">
                <div id="chat-messages"></div>
                <input type="text" id="chat-input" placeholder="Ketik pertanyaan Anda..." />
                <button id="send-btn">Kirim</button>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 PeluangKarir. All rights reserved.</p>
    </footer>
</body>
</html>
