<?php
    include('dbConnectivity.php');
    try {
        if ($_POST) {
            $id = $_POST['uniqueId'];
            $adminRemark = $_POST['adminRemark'];
            // echo "name is:" . $id;
            $connection = dbConnectivity();     
            $query = "UPDATE complaints SET status = 1 WHERE uniqueId = '$id'; ";
            $query0 = "UPDATE complaints SET remarks = '$adminRemark' WHERE uniqueId = '$id';";
            
            if (mysqli_query($connection, $query) && mysqli_query($connection, $query0)) {
                echo "success";
                header("Location: http://localhost/Complaint-Management-PHP-main/pages/complaints.php?success=1");
        } else {
            echo "failed to register";
            header("Location: http://localhost/Complaint-Management-PHP-main/pages/complaints.php?success=2");
        }
    }
} catch(Exception $e) {
    header("Location: http://localhost/Complaint-Management-PHP-main/pages/complaints.php?success=2");
}
?>