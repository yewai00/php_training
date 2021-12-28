<?php 
    include_once('../connect.php');
    $isEmpty = false;
    $wrong = false;
    $success = false;
    /**
    * Validate the input
    * @param $data
    * @return $data
    */
    function inputValidate($data) {
        global $connect;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);
        $data = mysqli_real_escape_string($connect, $data);
        return $data;
    }
    if(isset($_GET['pass'])) {
        if($_GET['pass'] == 'success') {
            $success = true;
        }
    }
    if (isset($_POST['submit'])) {
        if (!empty(inputValidate($_POST['email']))) {
            $email = inputValidate($_POST['email']);
        } else {
            $emailerr = "email required";
            $isEmpty = true;
        }
        if (!empty(inputValidate($_POST['pass']))) {
            $pass = inputValidate($_POST['pass']);
        } else {
            $passerr = "password required";
            $isEmpty = true;
        }
        if (!$isEmpty) {
            $check = "SELECT email_address, pass FROM users WHERE email_address='{$email}' AND pass=MD5('{$pass}')";
            $execute = mysqli_query($connect, $check);
            $row = mysqli_fetch_assoc($execute);
            if($row){
                session_start();
                $_SESSION['user'] = "admin";
                header('location: ../index.php');   
            } else {
                $wrong = true;
            } 
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
        <h3>Login Form</h3>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
            <?php 
                if (isset($emailerr)) {
                    echo "<span class='alert'>$emailerr</span><br><br>"; 
                }
            ?>
            <label for="pass">Password:</label>
            <input type="password" name="pass" id="pass">
            <?php 
                if (isset($emailerr)) {
                    echo "<span class='alert'>$passerr</span>"; 
                }
            ?>
            <input type="submit" name="submit" class="btn" value="submit">
        </form>
        <a href="reset_pass.php" class="reset">reset password</a>
        <?php
            if ($wrong) {
                echo '<p class="alert-box">wrong email or password</p>';
            }
            if ($success) {
                echo '<p class="success">password changed successfully.</p>';
            }
        ?>
    </div>
    <!-- ./container -->
</body>
</html>