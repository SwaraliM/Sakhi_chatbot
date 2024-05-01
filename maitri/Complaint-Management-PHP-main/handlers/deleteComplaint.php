<?php
    echo "Hello, world";
    
    if ($_POST) {
        // echo "hello" . $_GET["complaintID"];
        $id = $_POST["uniqueId"];
        echo $id;

        try {

            
            include("dbConnectivity.php");

            $connection = dbConnectivity();
            
            $query = "DELETE FROM complaints WHERE uniqueId = '$id'; ";
            
            if (mysqli_query($connection, $query)) {
                header("Location: http://localhost/Complaint-Management-PHP-main/pages/searchComplaint.php?success=3");
                exit();
            } else {
                header("Location: http://localhost/Complaint-Management-PHP-main/pages/complaint.php?complaintID=$id");
        }
    }
    catch (Exception $e) {
        echo "Error occurred";
    }
}
    ?>