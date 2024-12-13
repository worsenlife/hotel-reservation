<?php 
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($email) || empty($username) || empty($password)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'register.php';
            </script>
        ";
        exit();
    }

    // Cek format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "
            <script>
                alert('Format email tidak valid.');
                window.location = 'register.php';
            </script>
        ";
        exit();
    }

    // Cek kekuatan password
    if (strlen($password) < 6) {
        echo "
            <script>
                alert('Password harus terdiri dari minimal 6 karakter.');
                window.location = 'register.php';
            </script>
        ";
        exit();
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO tb_admin (email, password, username) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt === false) {
        echo "
            <script>
                alert('Terjadi kesalahan dengan database.');
                window.location = 'register.php';
            </script>
        ";
        exit();
    }

    // Bind parameter dan eksekusi query
    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPassword, $username);

    if (mysqli_stmt_execute($stmt)) {
        echo "
            <script>
                alert('Registrasi Berhasil! Silahkan login.');
                window.location = 'login.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan. Silahkan coba lagi.');
                window.location = 'register.php';
            </script>
        ";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
?>
