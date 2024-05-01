<?php
session_start();
if ($_SESSION) {
  if ($_SESSION['logged'] == '1') {
    echo "user is logged in"; 
    header("Location: http://localhost/Complaint-Management-PHP-main/pages/complaints.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <link rel="stylesheet" href="../style/login.css">
    <title>ICC Login - CMS</title>
</head>

<body>

    <div class="container">
        <div class="blob-container">
            <div class="blob"></div>
            <div class="blob one"></div>
            <div class="blob two"></div>
            <div class="blob three"></div>
            <div class="blob four"></div>
            <div class="blob five"></div>
            <div class="blob six"></div>
            <div class="blob seven"></div>
            <div class="blob eight"></div>
            <div class="blob nine"></div>
            <div class="blob ten"></div>
            <div class="blob"></div>
            <div class="blob one"></div>
            <div class="blob two"></div>
            <div class="blob three"></div>
            <div class="blob four"></div>
            <div class="blob five"></div>
            <div class="blob six"></div>
            <div class="blob seven"></div>
            <div class="blob eight"></div>
            <div class="blob nine"></div>
            <div class="blob ten"></div>
            <div class="blob"></div>
            <div class="blob one"></div>
            <div class="blob two"></div>
            <div class="blob three"></div>
            <div class="blob four"></div>
            <div class="blob five"></div>
            <div class="blob six"></div>
            <div class="blob seven"></div>
            <div class="blob eight"></div>
            <div class="blob nine"></div>
            <div class="blob ten"></div>
        </div>

        <section>
            <div class="card">
                <div class="title">
                    <img src="../assets/login_graphics.svg" class='logGraphics' style='height: 250px' />
                    <h1 style='font-size: 30px' class="parentTitle">Complaint Management System</p>
                </div>
                <div class="description">
                    <div class="login-form">
                        <h2>ICC Login</h2>
                        <form action="../handlers/auth.php" method="POST">
                            <label for="username">Username:</label>
                            <input value='Nisha' type="text" id="username" name="username"
                                placeholder="Enter your username" required>
                            <label for="password">Password:</label>
                            <input value="9907224577" type="password" id="password" name="password"
                                placeholder="Enter your password" required>
                            <button type="submit" value="submit">Login</button>
                        </form>
                        <?php
            if ($_GET) {
              $rec = $_GET["status"];
              if ($rec == '0') {
                echo "<p style='color: red; font-weight: 600'>Wrong credentials, Try again !</p>";
              } 
            }
          ?>

                    </div>
                </div>

            </div>
            <form action="../handlers/goHome.php" method="POST">
                <button class="homeBtn">Home</button>
            </form>
        </section>
    </div>

</body>

</html>