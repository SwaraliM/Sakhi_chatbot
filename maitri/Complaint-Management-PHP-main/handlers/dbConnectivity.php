<?php 

// establishing connection
define("server", "localhost");
define("user", "root");
define("pass", "");
define("db_name", "cms");



function dbConnectivity() {
    try {
        $connection = mysqli_connect(server, user, pass, db_name);
        if (!$connection) {
            echo 'not connected';
            print( "failed to connect " . mysqli_connect_error());
            
            exit();
        } else{
          
        }

        // $query = "select * from auth;";
    // $result = mysqli_query($connection, $query);
  
        return $connection;

    } catch (Exception $e) {

        return false;
    }
}


dbConnectivity();
