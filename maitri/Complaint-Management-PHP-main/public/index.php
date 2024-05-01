<script>
    console.log("Hello from php website");
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">

    <title>Document</title>
    <!-- <img src="../assets/loading.svg"> -->
</head>
<body>

<svg width="200" height="200" id="svg">
  <circle id="dot1" class="shape" />
  <circle id="dot2" class="shape" />
  <circle id="dot3" class="shape" />
  <circle id="dot4" class="shape" />
</svg>
<div class="control-panel">
    <!-- Loading, Complaint Management System -->
    <span>Complaint Management System</span>
</div>

</body>
</html>

<?php


      header("Refresh: 3 ; http://localhost/Complaint-Management-PHP-main/pages/landing.php");

        // echo "Hello, world";
        // header("Location: http://localhost/project/pages/login.php");
         //header("Location: http://localhost/project/handlers/dbConnectivity.php");
        //yes changes reflected
        // exit();

?>
