<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help - PeluangKarir</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">PeluangKarir</a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>
        </nav>
        <button id="toggle-mode">🌙</button>
    </header>

    <main>
        <section class="help">
            <h1>FAQs - Bantuan</h1>
            <div class="faq">
                <h3>Apa itu RuangKerja?</h3>
                <p>RuangKerja adalah platform untuk membantu pengembangan karir Anda.</p>
            </div>
            <div class="faq">
                <h3>Bagaimana cara mendaftar?</h3>
                <p>Anda bisa mendaftar melalui halaman Register.</p>
            </div>

            <h2>Live Chat Support</h2>
            <div class="chatbox">
                <div id="chat-messages"></div>
                <input type="text" id="chat-input" placeholder="Ketik pesan Anda..." />
                <button id="send-chat">Kirim</button>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 PeluangKarir. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById("send-chat").addEventListener("click", function () {
            alert("Pesan Anda telah dikirim ke tim support!");
        });
    </script>
</body>
</html>
