<?php
    // The MySQL service named in the docker-compose.yml.
    $host = 'db';
    // Database use name
    $user = 'root';
    //database user password
    $pass = 'MYSQL_ROOT_PASSWORD';

    $db = 'MYSQL_DATABASE';
    $table = 'scripts';

    // check the MySQL connection status
    $conn = new mysqli($host, $user, $pass);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // echo "Connected to MySQL server successfully!";
        mysqli_set_charset($conn, "utf8");
        $select_db = mysqli_select_db($conn, $db);
        if (!$select_db) {
            $create_db = 'CREATE DATABASE IF NOT EXISTS '.$db;   
            mysqli_select_db($conn, $db); 
            if (mysqli_query($conn, $create_db)) { 

            }
            $select_new_db = mysqli_select_db($conn, $db);
        }

        $query = "CREATE TABLE IF NOT EXISTS scripts (
            id SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            descript TEXT NOT NULL,
            content TEXT NOT NULL,
            result TEXT           
            )";
        mysqli_query($conn, $query);  
    }
?>