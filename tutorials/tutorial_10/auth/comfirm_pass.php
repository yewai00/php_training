<?php
include_once("../connect.php");
$empty = false;
$same = true;
$samecode = false;
if (!isset($_GET['code'])) {
    exit("invalid link");
} else {
    if (isset($_GET['empty'])) {
        $empty = $_GET['empty'];
    }
    if (isset($_GET['same'])) {
        $same = false;
    }
    $code = $_GET['code'];
    $check = "SELECT otcode FROM otplinks;";
    $runCheck = mysqli_query($connect, $check);
    while($codeArr = mysqli_fetch_assoc($runCheck)) {
        if($codeArr['otcode'] == $code){
            $samecode = true;
        };
    };
    if($samecode) {
        session_start();
        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        } else {
            $query = "SELECT email_address FROM otplinks WHERE otcode='$code' ORDER BY id DESC LIMIT 1;";
            $execute = mysqli_query($connect, $query);
            $emailArr = mysqli_fetch_assoc($execute);
            $email = $emailArr['email_address'];
            $_SESSION['email'] = $email;
        }
        $query = "SELECT * FROM otplinks WHERE email_address='$email' ORDER BY id DESC LIMIT 1;";
        $execute = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($execute);
    } else {
        exit("invalid link");
    }
}
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
