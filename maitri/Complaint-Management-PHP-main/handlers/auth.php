<!-- for handling admin login -->
<?php

try {

    if (isset($_POST['logout'])) {
        echo "hello";
        session_start();
        // unset($_SESSION['logged']);
        // unset($_SESSION['user']);

        session_destroy();

        header("Location: http://localhost/Complaint-Management-PHP-main/pages/login.php");
        exit();
    }
    $name = $_POST["username"];
    $pass = $_POST["password"];

    // echo $name . $pass;
    session_start();

    include("dbConnectivity.php");
    $connection = dbConnectivity();
    $query = "SELECT * FROM admin WHERE username = '$name' AND password = '$pass';";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $username= $row["username"];
            $position = $row["position"];
            $image = $row["profileURL"];
            // setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
            $_SESSION['user'] = $row["username"];
            $_SESSION['logged'] = "1";
            header("Location: http://localhost/Complaint-Management-PHP-main/pages/complaints.php?user=" . $row["username"]);
            exit();
            // echo "id" . $row["id"] . "username" . $row["username"];
        }
    } else {
        header("Location: http://localhost/Complaint-Management-PHP-main/pages/login.php?status=0");
        exit();
        // echo "hello";
    }

} catch (Exception $e) {
    echo "error occurred $e";
}

    
?>