<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "
            <script>
                alert('Username dan password harus diisi!');
                window.location = 'login.php';
            </script>
        ";
        exit();
    }
    // Query untuk mengambil data pengguna berdasarkan username
    $sql = "SELECT * FROM tb_admin WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    
    if ($stmt === false) {
        echo "
            <script>
                alert('Terjadi kesalahan pada database.');
                window.location = 'login.php';
            </script>
        ";
        exit();
    }

    // Bind parameter dan eksekusi query
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Periksa apakah username ada dalam database
    if ($row = mysqli_fetch_assoc($result)) {
        // Verifikasi password menggunakan password_hash
        if (password_verify($password, $row['password'])) {
            // Login berhasil, set session dan arahkan ke dashboard
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            echo "
                <script>
                    alert('Login berhasil!');
                    window.location = 'dashboard.php';
                </script>
            ";
        } else {
            // Password salah
            echo "
                <script>
                    alert('Password salah!');
                    window.location = 'login.php';
                </script>
            ";
        }
    } else {
        // Username tidak ditemukan
        echo "
            <script>
                alert('Username tidak ditemukan!');
                window.location = 'login.php';
            </script>
        ";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
?>
