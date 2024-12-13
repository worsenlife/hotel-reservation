<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="kolam renang.jpg" />
   <link rel="stylesheet" href="css/dashboard.css" />
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>reservasi online | Transaction</title>
</head>
<body>
   <div class="sidebar">
      <div class="logo-details">
         <i class="bx bx-category"></i>
         <span class="logo_name">peron</span>
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
					<span class="katalog.html">categories</span>
				</a>
			</li>
         <li>
            <a href="transaction.php">
               <i class="bx bx-list-ul"></i>
               <span class="transaction.html">Transaction</span>
            </a>
         </li>
         <li>
            <a href="login.php">
               <i class="bx bx-log-out"></i>
               <span class="log out">Log out</span>
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
            <span class="admin_name">reservasi online</span>
         </div>
      </nav>
      <div class="home-content">
         <h3>Transaction</h3>
         <table class="table-data">
         <button type="button" class="btn btn-tambah">
         <a href="transaction-cetak.php">cetak transaksi</a>
         <table class="table-data">
            <thead>
               <tr>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>alamat</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
            <?php
               include 'koneksi.php';
               $sql = "SELECT * FROM tb_transaction";
               $result = mysqli_query($koneksi, $sql);
               if (mysqli_num_rows($result) == 0) {
                  echo "
                  <h3 style='text-align: center; color: red;'>Data Kosong</h3>
               ";
               } else {
                  while ($data = mysqli_fetch_assoc($result)) {
                     echo "
                     <tr>
                         <td>$data[tanggal]</td>
                         <td>$data[nama]</td>
                         <td>$data[alamat]</td>
                         <td>$data[harga]</td>
                         <td><p class='success'>$data[status]</p></td>
                         <td style='display: none;'>$data[nomorhp]</td>
                         <td>
                         <button class='btn_detail' data-nomorhp='$data[nomorhp]' onclick='showDetails(\"$data[tanggal]\", \"$data[nama]\", \"$data[harga]\", \"$data[status]\")'>Detail</button>
                         </td>
                     </tr>
                     ";
                  }
               }
               ?>
            </tbody>
         </table>
      </div>
   </section>
   <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
         sidebar.classList.toggle("active");
         if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
         } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
      function showDetails(tanggal, nama, kategori, harga, status) {
         alert(`Tanggal: ${tanggal}\nNama: ${nama}\nKategori: ${kategori}\nHarga: ${harga}\nStatus: ${status}`);
      }
   </script>
</body>
</html>
