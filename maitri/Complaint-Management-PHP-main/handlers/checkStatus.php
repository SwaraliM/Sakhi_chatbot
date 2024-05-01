<?php
    echo "Hello, world";
    
    if ($_GET["complaintID"]) {
        // echo "hello" . $_GET["complaintID"];
        $id = $_GET["complaintID"];


        include("dbConnectivity.php");

        $connection = dbConnectivity();

        $query = "SELECT * FROM complaints WHERE uniqueId = '$id'; ";
        $results = mysqli_query($connection, $query);

        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                $title = $row['title'];
                $id = $row['uniqueId'];
                $contact = $row['contact'];
                $email = $row['email'];
                $description = $row['description'];
                $status = $row['status'];

                echo "Title: " . $title . "<br>";
                echo "ID: " . $id . "<br>";
                echo "Contact: " . $contact . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Description: " . $description . "<br>";
                echo "Status: " . $status . "<br>";

            }
        } else {
            echo "failed to status";
            // header("Location: http://localhost/project/pages/complaints.php?success=2");

            // header("Location: ")
        }

        
    }
?>