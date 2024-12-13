<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="kolam renang.jpg" />
    <title>Register</title>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script>
        // Simple JavaScript function to show confirmation before submitting
        function showPopup() {
            if (confirm("Are you sure you want to register?")) {
                document.getElementById("registerForm").submit();  // Submit the form after confirmation
            }
        }

        function highlightLink(link) {
            link.style.color = "red";
        }

        function resetLink(link) {
            link.style.color = "";
        }

        // Simple client-side validation (if needed)
        function validateForm() {
            const email = document.forms["registerForm"]["email"].value;
            const username = document.forms["registerForm"]["username"].value;
            const password = document.forms["registerForm"]["password"].value;

            if (email === "" || username === "" || password === "") {
                alert("Please fill all fields.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <center>
    <header>
        <nav>
            <div class="logo">
                <img src="gambar/kolam renang.jpg" alt="Logo" />
            </div>
            <a href="index.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Home</a>
            <a href="dashboard.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Dashboard</a>
            <a href="login.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Login</a>
        </nav>
    </header>

    <main>
        <div class="form-login">
            <h3>Register</h3>
            <form id="registerForm" name="registerForm" action="register-proses.php" method="POST" onsubmit="return validateForm()">
                <input type="email" name="email" placeholder="Email" required />
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <!-- Changed the button type to submit, and call showPopup() on click -->
                <button type="submit" onclick="showPopup()">Register</button>
            </form>
        </div>
        <a href="login.php" onmouseover="highlightLink(this)" onmouseout="resetLink(this)">Already have an account? Click here</a>
    </main>

    <footer>
        <h4>&copy;by Proto Py Group</h4>
    </footer>
    </center>
</body>
</html>
