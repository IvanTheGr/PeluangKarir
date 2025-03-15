<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Resume</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
    <header>
        <a href="index.php" class="logo">PeluangKarir</a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="resume-ai.php">AI Resume & Cover Letter</a></li>
            </ul>
        </nav>
    </header>

    <div class="box">
        <h1>Hasil Resume & Cover Letter</h1>
        <div id="result"></div>
    </div>

    <div>
        <button class="btn" onclick="location.href='index.php'">Kembali</button>
    </div>
    <br>

    <footer>
        <p>&copy; 2025 RuangKerja. All rights reserved.</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const resume = localStorage.getItem("resume");
            const coverLetter = localStorage.getItem("coverLetter");
            const resultContainer = document.getElementById("result");

            if (resume && coverLetter && resultContainer) {
                resultContainer.innerHTML = `
                    <h2>Resume:</h2>
                    <pre>${resume}</pre>
                    <h2>Cover Letter:</h2>
                    <pre>${coverLetter}</pre>
                `;
            } else {
                resultContainer.innerHTML = "<p>Data resume atau cover letter tidak ditemukan.</p>";
            }
        });
    </script>
</body>
</html>