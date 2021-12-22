<?php
    $host = "localhost";
    $user = "root";
    $password = "p@ssword"; //change your password
    $db = "mydb";
    $connect = mysqli_connect($host, $user, $password, $db);
    if (!$connect) {
        die('Could not connect: ' . mysqli_connect_error());  
    }