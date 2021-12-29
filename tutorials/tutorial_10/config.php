<?php 
    $host = "localhost";
    $user = "root";
    $password = "password"; //change your password
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
            first_name  VARCHAR(15),
            last_name VARCHAR(15),
            age INT,
            phone_number VARCHAR(15),
            city VARCHAR(15)
        )'; // persons table create query
        $usertable = 'CREATE TABLE IF NOT EXISTS users
        (
            email_address VARCHAR(32) PRIMARY KEY,
            pass VARCHAR(32)
        );'; // users table create query
        $otlink = 'CREATE TABLE IF NOT EXISTS otplinks
        (
            id int NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            email_address VARCHAR(32),
            otcode VARCHAR(32),
            expired VARCHAR(32)       
        );';// otplinks table create query
        mysqli_select_db($connect, "mydb"); // use database mydb
        if (mysqli_query($connect, $tableQuery)) {
            echo 'Persons table created successfully.<a href="index.php">Goto home page.</a>';
        } else {
            echo 'persons table is not created.';
        }
        if (mysqli_query($connect, $usertable)) {
            echo '<br>users table created successfully.';
        } else {
            echo '<br>users table is not created.';
        }
        if (mysqli_query($connect, $otlink)) {
            echo "<br>otlink created.";
        } else {
            echo "<br>otlink table not created.";
        }
        $userdata = 'INSERT INTO users (email_address , pass) VALUES ("hello@gmail.com", MD5("hello"));';//insert admin user
        if (mysqli_query($connect, $userdata)) {
            echo "user crated.";
        } else {
            echo "user create error.";
        }
    } else {  
        echo "Sorry, database creation failed ".mysqli_error($connect);  
    }  
    mysqli_close($connect);  
?>