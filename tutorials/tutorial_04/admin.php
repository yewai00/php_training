<?php
    session_start();
    if(!isset($_SESSION['user'])) {
    header('location: index.php');
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3>you are admin now.</h3>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>