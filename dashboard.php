<?php 
session_start();

// Cek apakah pengguna sudah login dengan session
if (!isset($_SESSION['username'])) {
    // Jika belum login, arahkan ke login.php
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username']; // Ambil username dari session
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="kolam renang.jpg" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Categories</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Reservasi Online</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="categories.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Categories</span>
                </a>
            </li>
            <li>
                <a href="transaction.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Transaction</span>
                </a>
            </li>
            <li>
                <a href="?logout=true">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name"><?php echo "Welcome, " . htmlspecialchars($username); ?></span>
            </div>
        </nav>

        <div class="home-content">
            <h2 id="text"><?php 
                // Dynamic greeting based on time of day
                $hour = date('H');
                if ($hour >= 4 && $hour <= 10) {
                    echo "Selamat Pagi, " . htmlspecialchars($username);
                } elseif ($hour >= 11 && $hour <= 14) {
                    echo "Selamat Siang, " . htmlspecialchars($username);
                } elseif ($hour >= 15 && $hour <= 18) {
                    echo "Selamat Sore, " . htmlspecialchars($username);
                } else {
                    echo "Selamat Malam, " . htmlspecialchars($username);
                }
            ?></h2>
            <h3 id="date"></h3>
            <?php
            // Koneksi ke database
$host = 'localhost'; // Sesuaikan dengan pengaturan database Anda
$db = 'db_reservasi'; // Ganti dengan nama database Anda
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

try {
    // Membuat koneksi ke database
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk menghitung jumlah kategori
    $stmt = $pdo->query("SELECT COUNT(*) FROM tb_categories"); // Ganti 'categories' dengan nama tabel Anda
    $categoryCount = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Menangani kesalahan jika koneksi gagal
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}
?>
            <h4>jumlah data yang ada sekarang ada</h4><?php echo $categoryCount; ?></h4>
        </div>
    </section>

    <script>
        // Sidebar Toggle
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };

        // Logout functionality
        if (window.location.search.includes('logout=true')) {
            // Hapus session dan arahkan ke login.php
            <?php
                session_unset();
                session_destroy();
                echo 'window.location.href = "login.php";';
            ?>
        }

        // Function to display current date and time
        function myFunction() {
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            let date = new Date();
            let jam = date.getHours();
            let tanggal = date.getDate();
            let hari = days[date.getDay()];
            let bulan = months[date.getMonth()];
            let tahun = date.getFullYear();
            let m = date.getMinutes();
            let s = date.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
            requestAnimationFrame(myFunction);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        window.onload = function () {
            myFunction();
        };
    </script>
</body>
</html>
