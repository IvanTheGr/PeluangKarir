document.addEventListener("DOMContentLoaded", function () {
    const toggleMode = document.getElementById("toggle-mode");

    if (toggleMode) {
        toggleMode.addEventListener("click", function () {
            document.body.classList.toggle("dark-mode");
            toggleMode.textContent = document.body.classList.contains("dark-mode") ? "☀️" : "🌙";
        });
    }

    // Ensure users don't get redirected to signin.php if they are already logged in
    function getCookie(name) {
        let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        return match ? match[2] : null;
    }

    const authButtons = document.getElementById("auth-buttons");

    if (!getCookie("user_logged_in")) {
        // If not logged in, ensure the user is redirected to signin.php
        if (!window.location.pathname.includes("signin.php")) {
            window.location.href = "signin.php";
        }
    } else {
        // User is logged in: replace Sign In/Register with Logout button
        if (authButtons) {
            authButtons.innerHTML = `<button class="logout" onclick="logout()">Logout</button>`;
        }
    }

    function logout() {
        document.cookie = "user_logged_in=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        fetch("logout.php")
            .then(() => window.location.href = "signin.php")
            .catch(() => window.location.href = "signin.php");
    }

    // Ensure clicking the logo takes logged-in users to index.php
    const logo = document.getElementById("logo");
    if (logo) {
        logo.addEventListener("click", function (event) {
            event.preventDefault();
            window.location.href = "index.php"; // Redirect to home page instead of signin
        });
    }
});


// AI Resume Generator
const generateButton = document.getElementById("generate-resume");

if (generateButton) {
    generateButton.addEventListener("click", function () {
        const jobTitle = document.getElementById("job-title").value.trim();
        const experience = document.getElementById("experience").value.trim();

        if (!jobTitle || !experience) {
            alert("Harap isi semua bidang untuk menghasilkan resume!");
            return;
        }

        console.log("Data diambil:", jobTitle, experience);

        const resume = generateResume(jobTitle, experience);
        const coverLetter = generateCoverLetter(jobTitle, experience);

        try {
            localStorage.setItem("resume", resume);
            localStorage.setItem("coverLetter", coverLetter);
            console.log("Data berhasil disimpan di localStorage");
        } catch (e) {
            console.error("Gagal menyimpan data ke localStorage", e);
        }

        window.location.href = "resume-result.php";
        alert("Hasil sedang diproses...");
    });
}

// Function to generate resume
function generateResume(jobTitle, experience) {
    const resume = `Nama: [Masukkan Nama Anda]
        Posisi yang Dilamar: ${jobTitle}

        Ringkasan:
        Seorang profesional dengan pengalaman dalam ${jobTitle.toLowerCase()} yang memiliki keterampilan ${extractSkills(experience)} dan berkomitmen untuk mencapai hasil terbaik.

        Pengalaman:
        ${experience}

        Pendidikan:
        [Masukkan Pendidikan Anda]

        Keterampilan:
    - ${extractSkills(experience).split(",").join("\n- ")}`;

    // Store the generated resume in localStorage
    localStorage.setItem("resume", resume);

    return resume;
}

// Function to generate cover letter
function generateCoverLetter(jobTitle, experience) {
    const coverLetter = `Kepada Tim Rekrutmen,

    Saya sangat antusias untuk melamar posisi ${jobTitle} di perusahaan Anda. Dengan pengalaman saya dalam ${jobTitle.toLowerCase()}, saya yakin dapat memberikan kontribusi yang berarti.

    Berikut adalah beberapa pencapaian utama saya:
    ${formatExperiencePoints(experience)}

    Saya sangat menantikan kesempatan untuk berdiskusi lebih lanjut mengenai bagaimana saya dapat menjadi bagian dari tim Anda.

    Hormat saya,
    [Nama Anda]`;

    // Store the generated cover letter in localStorage
    localStorage.setItem("coverLetter", coverLetter);

    return coverLetter;
}

// Filter Kursus
document.querySelectorAll(".filter-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
        const category = this.dataset.filter;
        document.querySelectorAll(".course").forEach((course) => {
            course.style.display = category === "all" || course.dataset.category === category ? "block" : "none";
        });
    });
});

// Chatbot Career Planning
document.addEventListener("DOMContentLoaded", function () {
    const chatMessages = document.getElementById("chat-messages");
    const chatInput = document.getElementById("chat-input");
    const sendBtn = document.getElementById("send-btn");

    if (!chatMessages || !chatInput || !sendBtn) {
        console.error("❌ ERROR: Chat elements not found in HTML.");
        return;
    }

    function appendMessage(sender, message) {
        const messageElement = document.createElement("div");
        messageElement.classList.add("message", sender === "User" ? "user-message" : "ai-message");
        messageElement.innerHTML = `<strong>${sender}:</strong> ${message}`;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    async function sendMessage() {
        const userMessage = chatInput.value.trim();
        if (userMessage === "") return;

        appendMessage("User", userMessage);
        chatInput.value = "";

        // Show typing indicator
        const typingMessage = document.createElement("div");
        typingMessage.classList.add("message", "ai-message", "typing");
        typingMessage.innerHTML = "<strong>AI:</strong> Sedang mengetik...";
        chatMessages.appendChild(typingMessage);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        try {
            const response = await fetch("api.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ message: userMessage })
            });

            const data = await response.json();
            chatMessages.removeChild(typingMessage); // Remove typing indicator

            if (data.response) {
                appendMessage("AI", data.response);
            } else {
                appendMessage("AI", "⚠️ Maaf, saya tidak mengerti.");
            }
        } catch (error) {
            chatMessages.removeChild(typingMessage);
            appendMessage("AI", "⚠️ Gagal menghubungi server.");
            console.error("Chatbot API Error:", error);
        }
    }

    sendBtn.addEventListener("click", sendMessage);
    chatInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            sendMessage();
        }
    });
});

// Filter Lowongan Pekerjaan
const locationFilter = document.getElementById("location-filter");
const salaryFilter = document.getElementById("salary-filter");
const industryFilter = document.getElementById("industry-filter");
const jobs = document.querySelectorAll(".job");

if (locationFilter && salaryFilter && industryFilter) {
    function filterJobs() {
        const selectedLocation = locationFilter.value;
        const selectedSalary = salaryFilter.value;
        const selectedIndustry = industryFilter.value;

        jobs.forEach(job => {
            const locationMatch = selectedLocation === "all" || job.getAttribute("data-location") === selectedLocation;
            const salaryMatch = selectedSalary === "all" || job.getAttribute("data-salary") === selectedSalary;
            const industryMatch = selectedIndustry === "all" || job.getAttribute("data-industry") === selectedIndustry;

            job.style.display = (locationMatch && salaryMatch && industryMatch) ? "block" : "none";
        });
    }

    locationFilter.addEventListener("change", filterJobs);
    salaryFilter.addEventListener("change", filterJobs);
    industryFilter.addEventListener("change", filterJobs);
}

//chart
const progressChartCanvas = document.getElementById("progressChart");
    if (progressChartCanvas) {
        new Chart(progressChartCanvas.getContext("2d"), {
            type: "bar",
            data: {
                labels: ["Skill A", "Skill B", "Skill C"],
                datasets: [{
                    label: "Progress",
                    data: [60, 80, 40],
                    backgroundColor: "#4A90E2",
                }]
            },
            options: { responsive: true }
        });
    }