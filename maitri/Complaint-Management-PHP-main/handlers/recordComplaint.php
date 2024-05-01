<?php
    include('dbConnectivity.php');
    echo "welcome";
    function generateUniqueKey($size = 5) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $key = '';
        $maxIndex = strlen($characters) - 1;
    
        for ($i = 0; $i < $size; $i++) {
            $key .= $characters[rand(0, $maxIndex)];
        }
    
        return $key;
    }
    
    
    try {
    if ($_POST) {
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $description = $_POST['complaint'];
        $uniqueKey = generateUniqueKey();


        // echo "Name: " . $name . "<br>";
        // echo "Contact: " . $contact . "<br>";
        // echo "Email: " . $email . "<br>";
        // echo "Title: " . $title . "<br>";
        // echo "Complaint: " . $description . "<br>";




        $connection = dbConnectivity();
        $query = "INSERT INTO complaints (name, contact, email, title, description, uniqueId, status)
        VALUES ('$name', '$contact', '$email', '$title', '$description', '$uniqueKey', 2);";

        if (mysqli_query($connection, $query)) {
            echo "Complaint added successfully!";
            header("Location: http://localhost/Complaint-Management-PHP-main/pages/logComplaint.php?success=1&id=$uniqueKey");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connection);
            header("Location: http://localhost/Complaint-Management-PHP-main/pages/logComplaint.php?success=2");
        }
    }

} catch (Exception $e) {
    header("Location: http://localhost/Complaint-Management-PHP-main/pages/logComplaint.php?success=2");
        
}

?>