<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <link rel="stylesheet" href="../style/landing.css">
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width">
    <title>CMS Beta</title>
</head>
<script type="module" src="../scripts/landingScripts.js">
</script>
<style>
.solveBtn {
    text-align: center;
    width: 140px;
    height: 45px;
    font-family: 'Roboto', sans-serif;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    font-weight: 500;
    color: #000;
    background-color: #fff;
    border: none;
    border-radius: 45px;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease 0s;
    cursor: pointer;
    outline: none;
}

.solveBtn:hover {
    background-color: #5000ca;
    box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
    color: #fff;
    transform: translateY(-3px);
}

.credits {
    color: white;

    margin-top: 200px;
    font-weight: 500;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: black;
    filter: invert(70%);
}
</style>

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

        <div id="hero">

            <img class="primary_img" src="../assets/landing_main.svg" alt="vector graphics">

            <h1>Complaint <span>Management</span> System</h1>
            <p>
                Empower Your Voice, Resolve Your Concerns: Our Complaint Management System
            </p>
        </div>
        <div id="footer">
            <div class="line">
                <div class="button-container">
                    <button class="solveBtn"
                        onclick="window.location.replace('http://localhost/Complaint-Management-PHP-main/pages/logComplaint.php')">Register
                        Complaint</button>
                    <button class="solveBtn"
                        onclick="window.location.replace('http://localhost/Complaint-Management-PHP-main/pages/searchComplaint.php')">Complaint
                        Status</button>
                    <button class="solveBtn"
                        onclick="window.location.replace('http://localhost/Complaint-Management-PHP-main/pages/login.php')">Admin
                        Login</button>
                    <button class="solveBtn"
                        onclick="window.location.replace('http://localhost/Complaint-Management-PHP-main/pages/login1.php')">ICC
                        Login</button>
                </div>
            </div>
        </div>

        <p class="credits">Wantedbear Productions😉</p>
</body>

<script src="../scripts/landingScripts.js">
// <script type="module" src="../scripts/res.js">
</script>

</html>