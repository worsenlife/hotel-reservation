<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="gambar/gambar hotel.jpeg">
    <link rel="stylesheet" href="css/index.css">
    <script>
        function highlightLink(link) {
            link.style.color = "red";
        }
        function resetLink(link) {
            link.style.color = "";
        }
        function proses() {
            let myForm = document.myForm;
            let nama = myForm.nama.value;
            let jumlah = myForm.jumlah.value;
            let tempat = myForm.tempat.value;
            let lama = myForm.lama.value;
            let snackbar = document.getElementById("snackbar");

            if (nama && jumlah && tempat && lama) {
                myForm.hasil.value = `
                Data Pengunjung 
                Nama: ${nama}
                Banyak orang: ${jumlah}
                Tempat tujuan: ${tempat}
                Lama tinggal: ${lama}`;
                snackbar.innerHTML = "Data berhasil diproses!";
                snackbar.className = "show";
                setTimeout(function() { snackbar.className = snackbar.className.replace("show", ""); }, 5000);
            } else {
                snackbar.innerHTML = "Data tidak lengkap!";
                snackbar.className = "show";
                setTimeout(function() { snackbar.className = snackbar.className.replace("show", ""); }, 5000);
            }
        }
        function hapus() {
            let snackbar = document.getElementById("snackbar");
            document.myForm.reset();
            snackbar.innerHTML = "Data berhasil dihapus!";
            snackbar.className = "show";
            setTimeout(function() { snackbar.className = snackbar.className.replace("show", ""); }, 5000);
        }
    </script>
</head>
<body>
    <center>
        <header>
            <nav>
                <div class="logo">
                    <img src="gambar/gambar hotel.jpeg" alt="Logo Hotel">
                </div>
                <a href="index.html" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Home</a>
                <a href="dashboard.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Dashboard</a>
                <a href="login.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Login</a>
            </nav>
        </header>

        <main>
            <div class="jumbotron">
                <h1>Find Your Best Hotel at Cheap Price</h1>
                <p>Hotel lengkap dengan fasilitas terbaik dan dengan harga murah</p>
            </div>
        </main>

        <footer>
            <h4>&copy; by Proto Py Group</h4>
        </footer>

        <h1>Data Pengguna</h1>
        <div class="container">
            <h3>Input Data Pengguna</h3>
            <form action="#" name="myForm">
                <div class="input">
                    <label for="nama">Nama</label>
                    <input class="input_form" type="text" name="nama" id="nama" />
                </div>
                <div class="input">
                    <label for="jumlah">Banyak Orang</label>
                    <input class="input_form" type="number" name="jumlah" id="jumlah" />
                </div>
                <div class="input">
                    <label for="tempat">Tempat Tujuan</label>
                    <input class="input_form" type="text" name="tempat" id="tempat" />
                </div>
                <div class="input">
                    <label for="lama">Lama Tinggal (hari)</label>
                    <input class="input_form" type="number" name="lama" id="lama"/>
                </div>
                <div class="btn">
                    <input type="button" class="button" name="btn_proses" value="Proses" onClick="proses()" />
                </div>
                <div class="btn">
                    <input type="button" class="button" name="btn_hapus" value="Hapus" onClick="hapus()" />
                </div>
                <div class="input">
                    <textarea name="hasil" id="hasil" rows="10" disabled></textarea>
                </div>
            </form>
        </div>
        <div id="snackbar"></div>
    </center>
</body>
</html>
