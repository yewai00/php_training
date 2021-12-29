<?php 
include_once("../connect.php");
$isEmpty = false;
if(isset($_GET['code'])) {
    $code = $_GET['code'];
}
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
    if (!empty(inputValidate($_POST['pass']))) {
        $pass = $_POST['pass'];
    } else {
        $isEmpty = true;
    }
    if (!empty(inputValidate($_POST['cpass']))) {
        $cpass = $_POST['cpass'];
    } else {
        $isEmpty = true;
    }
    if ($isEmpty) {
        header("location: comfirm_pass.php?empty=true&code=$code");
    }
    session_start();
    $email = $_SESSION['email'];
    
    if ($pass == $cpass) {
        $expired_flag = "UPDATE otplinks SET expired='YES' WHERE otcode='$code'";
        $execute_expired = mysqli_query($connect, $expired_flag);
        $query = "UPDATE users SET pass = MD5('$pass') WHERE email_address='$email';";
        $execute = mysqli_query($connect, $query);
        if ($execute) {
            header("location: login.php?pass=success");
        }
    } else {
        header("location: comfirm_pass.php?same=false&code=$code");
    }
}
?>