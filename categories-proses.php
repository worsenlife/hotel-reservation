<?php 
include 'koneksi.php';
function upload() {
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'categories-entry.php';
            </script>
        ";
        return false;
    }
    // cek apakah yang diupload adalah gambar
    $ekstentiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstentiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar');
                window.location = 'categories-entry.php';
            </script>
        ";
        return null;
    }
    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'isi gambar/' . $namaFileBaru);
    return $namaFileBaru;
}
if (isset($_POST['simpan'])) {
    // Mengambil data dari form
    $lokasi = $_POST['lokasi'];  // Nama lokasi
    $price = $_POST['price'];    // Harga
    $description = $_POST['description'];  // Deskripsi
    $photo = upload();  // Foto yang diupload
    // Jika foto tidak diupload
    if (!$photo) {
        return false;
    }
    // Pastikan semua data terisi
    if (empty($lokasi) || empty($price) || empty($description)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'categories-entry.php';
            </script>
        ";
    } else {
        // Menyimpan data ke database
        $sql = "INSERT INTO tb_categories (photo, lokasi, price, description) VALUES ('$photo', '$lokasi', '$price', '$description')";
        if (mysqli_query($koneksi, $sql)) {
            echo "
                <script>
                    alert('Data Daerah Hotel Berhasil Ditambahkan');
                    window.location = 'categories.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Terjadi Kesalahan');
                    window.location = 'categories-entry.php';
                </script>
            ";
        }
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $lokasi = $_POST['lokasi'];  // Nama lokasi
    $price = $_POST['price'];    // Harga
    $description = $_POST['description'];  // Deskripsi
    $photoLama = $_POST['photoLama'];  // Foto lama
    // cek apakah user pilih gambar atau tidak
    if ($_FILES['photo']['error']) {
        $photo = $photoLama;  // Jika tidak ada gambar baru, pakai foto lama
    } else {
        // foto lama akan dihapus dan diganti foto baru
        unlink('../img_categories/' . $photoLama);  // Menghapus foto lama
        $photo = upload();  // Mengupload foto baru
    }
    // Update data di database
    $sql = "UPDATE tb_categories SET 
            photo = '$photo',
            lokasi = '$lokasi',
            price = '$price',
            description = '$description'
            WHERE id = $id";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Daerah Hotel Berhasil Diubah');
                window.location = 'categories.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'categories-edit.php';
            </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // Menghapus gambar terkait
    $sql = "SELECT * FROM tb_categories WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $photo = $row['photo'];
    unlink('../img_categories/' . $photo);

    // Hapus data dari database
    $sql = "DELETE FROM tb_categories WHERE id = $id";
    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Daerah Hotel Berhasil Dihapus');
                window.location = 'categories.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Daerah Hotel Gagal Dihapus');
                window.location = 'categories.php';
            </script>
        ";
    }
} else {
    header('location: categories.php');
}
if (isset($_POST['simpan'])) {
    // Mengambil data dari form
    $lokasi = $_POST['lokasi'];  // Nama lokasi
    $price = $_POST['price'];    // Harga
    $description = $_POST['description'];  // Deskripsi

    // Validasi untuk memastikan semua data terisi
    if (empty($lokasi) || empty($price) || empty($description)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'categories-entry.php';
            </script>
        ";
        return false;
    }

    // Proses upload gambar
    $photo = upload();  // Foto yang diupload
    if (!$photo) {
        return false;  // Jika upload foto gagal, keluar dari proses
    }

    // Menyimpan data ke database
    $sql = "INSERT INTO tb_categories (photo, lokasi, price, description) VALUES ('$photo', '$lokasi', '$price', '$description')";
    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Daerah Hotel Berhasil Ditambahkan');
                window.location = 'categories.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'categories-entry.php';
            </script>
        ";
    }
}
