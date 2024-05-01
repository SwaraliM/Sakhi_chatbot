<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">

    <title>Search Complaint - CMS</title>
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
        </div>


        <section>
            <div class="card">
                <div class="title">
                    <img src="../assets/search_graphics.svg" class='logGraphics' style='height: 250px' />
                    <h1 style='font-size: 35px'><span>Search</span> Complaint</p>
                </div>
                <div class="description">
                    <div class="login-form">
                        <h2>Enter your Complaint ID</h2>
                        <form action="complaint.php" method="GET">
                            <label for="complaintID">Complaint ID</label>
                            <input type="text" id="complaintID" name="complaintID" required
                                placeholder="Enter your Reference ID">
                            <button type="submit">Search</button>
                        </form>
                        <?php
            if ($_GET) {
              if ($_GET['success'] == '2') {
                  echo "<p style='color: red'>Complaint not found, Try again !</p>";
              }

              else if ($_GET['success'] == '3') {
                echo "<p style='color: green'>Complaint deleted successfully.</p>";
            }
            }
        ?>
                    </div>
                </div>

            </div>
            <form action="../handlers/goHome.php" method="POST">
                <button class="homeBtn" href="http://localhost/project/pages/landing.php">Home</button>
            </form>

        </section>
    </div>

</body>

</html>