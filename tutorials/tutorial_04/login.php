<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email === 'admin_yu@gmail.com' and $password === 'pwd123') {
        $_SESSION['user'] = ['username' => 'Yu'];
        header("location: admin.php");
    } 
    else {
        header("location: index.php?incorrect=true");
    }