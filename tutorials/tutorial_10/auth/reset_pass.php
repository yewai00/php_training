<?php 
    include_once('../connect.php');
    $isEmpty = false;
    $wrong = false;
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
    if (isset($_POST['submit'])) {
        if (!empty(inputValidate($_POST['email']))) {
            $email = inputValidate($_POST['email']);
        } else {
            $emailerr = "email required";
            $isEmpty = true;
        }
        if (!$isEmpty) {
            $check = "SELECT email_address FROM users WHERE email_address='{$email}'";
            $execute = mysqli_query($connect, $check);
            $row = mysqli_fetch_assoc($execute);
            if ($row){
                session_start();
                $_SESSION['email'] = $email;
                header('location: send_mail.php');
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
        <form action="reset_pass.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <?php 
                if(isset($emailerr)) {
                    echo "<span class='alert'>$emailerr</span>"; 
                }
            ?>
            <input type="submit" name="submit" class="btn" value="Reset">
        </form>
        <?php
            if($wrong) {
                echo '<p class="alert-box">unregister email</p>';
            }
        ?>
    </div>
    <!-- ./container -->
</body>
</html>