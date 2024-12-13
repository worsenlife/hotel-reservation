<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="../css/admin.css" />
   <!-- Boxicons CDN Link -->
   <link
	href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Catshop Admin | Categories Entry</title>
</head>
<body>
   <div class="sidebar">
	<div class="logo-details">
	   <i class="bx bx-category"></i>
	   <span class="logo_name">CatShop</span>
	</div>
	<ul class="nav-links">
	   <li>
		<a href="dashboard.php">
		   <i class="bx bx-grid-alt"></i>
		   <span class="links_name">Dashboard</span>
		</a>
	   </li>
	   <li>
		<a href="categories.php" class="active">
		   <i class="bx bx-box"></i>
		   <span class="links_name">Categories</span>
		</a>
	   </li>
	   <li>
		<a href="transaction.php">
		   <i class="bx bx-list-ul"></i>
		   <span class="links_name">Transaction</span>
		</a>
	   </li>
	   <li>
		<a href="index.php.php">
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
		<span class="admin_name">Admin</span>
	   </div>
	</nav>
	<div class="home-content">
	   <h3>Input Categories</h3>
	   <div class="form-login">
		<form
              action="categories-proses.php"
              method="post"
              enctype="multipart/form-data"
            >
               <input type="hidden" name="id" value="<?= $data['id'] ?>">
               <input type="hidden" name="photoLama" value="<?= $data['photo'] ?>">
               <label for="categories">Categories</label>
               <input
                 class="input"
                 type="text"
                 name="categories"
                 id="categories"
                 placeholder="Categories"
                 value="<?= $data['categories'] ?>"
               />
               <label for="categories">Price</label>
               <input
                 class="input"
                 type="text"
                 name="price"
                 id="price"
                 placeholder="Price"
                 value="<?= $data['price']?>"
               />
                <label for="categories">Description</label>
                <input
                  class="input"
                  type="text"
                  name="description"
                  id="Description"
                  placeholder="Description"
                  value="<?= $data['description']?>"
                />
               <label for="photo">Photo</label>
               <img src="../img_categories/<?= $data['photo'] ?>" alt="" width="200px">
               <input
                 type="file"
                 name="photo"
                 id="photo"
                 style="margin-bottom: 20px"
               />
               <button type="submit" class="btn btn-simpan" name="edit">
                 Edit
               </button>
          </form>
	   </div>
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
   </script>
</body>
</html>