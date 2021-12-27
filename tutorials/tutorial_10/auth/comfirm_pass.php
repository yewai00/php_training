<?php
include_once("../connect.php");
$empty = false;
$same = true;
session_start();
$email = $_SESSION['email'];
if (!isset($_GET['code'])) {
    echo "invalid link";
}
if (isset($_GET['empty'])) {
    $empty = $_GET['empty'];
}
if (isset($_GET['same'])) {
    $same = false;
}
$code = $_GET['code'];
$query = "SELECT * FROM otplinks WHERE email_address='$email' order by id desc Limit 1 ;";
$execute = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($execute);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php if($row['otcode'] == $code): ?>
            <h3>Reset your password</h3>
            <form action="change_pass.php?code=<?=$code?>" method="post">
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass">
                <label for="pass">Confirm Password:</label>
                <input type="password" name="cpass" id="pass">   
                <input type="submit" value="change" name="submit" class="btn">
            </form>
        <?php endif ?>
        <?php 
            if ($empty) {
                echo "<p class='center alert-box'>Fill all input data</p>";
            }
            if ($same == false) {
                echo "<p class='center alert-box'>Type same password</p>";
            }
        ?>
    </div>
    <!-- ./container -->
</body>
</html>
