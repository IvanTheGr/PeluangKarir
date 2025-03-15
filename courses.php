<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - PeluangKarir</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
    <header>
        <a href="index.php" class="logo">PeluangKarir</a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
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
        <section class="courses">
            <h1>Kursus & Pelatihan</h1>
            <div class="filters">
                <button class="filter-btn" data-filter="all">All</button>
                <button class="filter-btn" data-filter="active">Active</button>
                <button class="filter-btn" data-filter="upcoming">Upcoming</button>
                <button class="filter-btn" data-filter="completed">Completed</button>
            </div>

            <div class="course-list">
                <div class="course" data-category="active">
                    <h2>Web Development</h2>
                    <p>Belajar membangun website dari nol.</p>
                </div>
                <div class="course" data-category="upcoming">
                    <h2>Data Science</h2>
                    <p>Pemrograman Python untuk data analysis.</p>
                </div>
                <div class="course" data-category="active">
                    <h2>Web Development</h2>
                    <p>Belajar membangun website dari nol.</p>
                </div>
                <div class="course" data-category="upcoming">
                    <h2>Data Science</h2>
                    <p>Pemrograman Python untuk data analysis.</p>
                </div>
                <div class="course" data-category="active">
                    <h2>UI/UX Design</h2>
                    <p>Pelajari dasar-dasar desain produk digital.</p>
                </div>
                <div class="course" data-category="completed">
                    <h2>Machine Learning Basics</h2>
                    <p>Pengenalan machine learning dengan Python.</p>
                </div>
                <div class="course" data-category="upcoming">
                    <h2>Cyber Security</h2>
                    <p>Memahami dasar keamanan siber dan ethical hacking.</p>
                </div>
                <div class="course" data-category="active">
                    <h2>Mobile App Development</h2>
                    <p>Belajar membuat aplikasi Android dan iOS.</p>
                </div>
                <div class="course" data-category="completed">
                    <h2>Cloud Computing</h2>
                    <p>Pengantar konsep cloud computing dengan AWS.</p>
                </div>
                
            </div>

            <canvas id="studyChart"></canvas>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 PeluangKarir. All rights reserved.</p>
    </footer>
</body>
</html>
