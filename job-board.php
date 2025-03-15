<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Board - PeluangKarir</title>
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
                <li><a href="career-coach.php">Virtual Career Coach</a></li>
                <li><a href="resume-ai.php">AI Resume & Cover Letter</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php"><button class="btn">Log Out</button></a></li>
            </ul>
        </nav>
        <button id="toggle-mode">🌙</button>
    </header>

    <main>
        <section class="job-board">
            <h1>Lowongan Pekerjaan</h1>
            <div class="job-filters">
                <select id="location-filter" class="filter-dropdown">
                    <option value="all">Lokasi</option>
                    <option value="Bekasi">Bekasi</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bogor">Bogor</option>
                </select>
                <select id="salary-filter" class="filter-dropdown">
                    <option value="all">Gaji</option>
                    <option value="10juta">Rp 10 Juta</option>
                    <option value="1triliun">Rp 1 Triliun</option>
                </select>
                <select id="industry-filter" class="filter-dropdown">
                    <option value="all">Industri</option>
                    <option value="Teknologi">Teknologi</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="Pendidikan">Pendidikan</option>
                </select>
            </div>

            <div class="job-list">
                <div class="job" data-location="Jakarta" data-salary="1triliun" data-industry="Teknologi">
                    <img src="software-engineer.jpg" alt="Software Engineer">
                    <h2>Software Engineer</h2>
                    <p>Lokasi: Jakarta | Gaji: Rp 1 Triliun</p>
                </div>
                <div class="job" data-location="Remote" data-salary="10juta" data-industry="Teknologi">
                    <img src="data-analyst.jpg" alt="Data Analyst">
                    <h2>Data Analyst</h2>
                    <p>Lokasi: Remote | Gaji: Rp 10 Juta</p>
                </div>
                <div class="job" data-location="Bekasi" data-salary="10juta" data-industry="Keuangan">
                    <img src="Akuntan.jpg" alt="Data Analyst">
                    <h2>Akuntan</h2>
                    <p>Lokasi: Bekasi | Gaji: Rp 10 Juta</p>
                </div>
                <div class="job" data-location="Bekasi" data-salary="10juta" data-industry="Pendidikan">
                    <img src="guru.jpg" alt="Data Analyst">
                    <h2>Guru</h2>
                    <p>Lokasi: Bekasi | Gaji: Rp 10 Juta</p>
                </div><div class="job" data-location="Jakarta" data-salary="10juta" data-industry="Keuangan">
                    <img src="pro.jpg" alt="Data Analyst">
                    <h2>Programmer</h2>
                    <p>Lokasi: Bekasi | Gaji: Rp 10 Juta</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 PeluangKarir. All rights reserved.</p>
    </footer>
</body>
</html>
