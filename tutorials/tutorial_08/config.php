<?php 
    $host = "localhost";
    $user = "root";
    $password = "p@ssword"; //change your password
    $connect = new mysqli($host, $user, $password);
    if (!$connect) {
        die('Could not connect: ' . mysqli_connect_error());  
    }
    $sql = 'CREATE DATABASE IF NOT EXISTS mydb;'; 
    if (mysqli_query($connect, $sql)) {  
        echo 'Database mydb created successfully.<br>';
        $tableQuery = 'CREATE TABLE IF NOT EXISTS persons
        (
        id int NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        first_name varchar(15),
        last_name varchar(15),
        age int,
        phone_number varchar(15),
        city varchar(15)
        )';
        mysqli_select_db($connect, "mydb");
        if (mysqli_query($connect, $tableQuery)) {
            echo 'Persons table created successfully.<a href="index.php">Goto home page.</a>';
        } else {
            echo 'Table is not created.';
        }
    } else {  
        echo "Sorry, database creation failed ".mysqli_error($connect);  
    }  
    mysqli_close($connect);  
?>