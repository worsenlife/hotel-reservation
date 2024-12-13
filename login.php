<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="kamar.jpeg" />
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <script>
        function highlightLink(link) {
            link.style.color = "red";
        }

        function resetLink(link) {
            link.style.color = "";
        }

        function showRegisterPopup() {
            alert("Anda akan diarahkan ke halaman pendaftaran!");
        }

        // Simple client-side validation
        function validateForm() {
            const username = document.forms["loginForm"]["username"].value;
            const password = document.forms["loginForm"]["password"].value;

            if (username === "" || password === "") {
                alert("Username dan password harus diisi!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<center>
    <header>
        <div class="logo">
            <img src="gambar/kamar.jpeg" alt="Logo" />
        </div>
        <nav>
            <a href="index.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Home</a>
            <a href="dashboard.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Dashboard</a>
            <a href="login.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Login</a>
        </nav>
    </header>

    <main>
        <div class="form-login">
            <h3>Login</h3>
            <form name="loginForm" action="login-proses.php" method="post" onsubmit="return validateForm()">
                <div class="input-container">
                    <label for="username">Username:</label>
                    <input class="input" type="text" name="username" id="username" placeholder="Username" />
                </div>
                <div class="input-container">
                    <label for="password">Password:</label>
                    <input class="input" type="password" name="password" id="password" placeholder="Password" />
                </div>
                <button type="submit" class="btn_login" name="login" id="login">Login</button>
            </form>
            <a href="register.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)" onclick="showRegisterPopup()">Register Disini</a>
        </div>
    </main>

    <footer>
        <h4>&copy;by proto py group</h4>
    </footer>
</center>
</body>
</html>
