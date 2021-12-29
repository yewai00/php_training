<?php
include_once('../connect.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $code = uniqid(true);
    $query = "INSERT INTO otplinks (email_address, otcode, expired) VALUES ('$email', '$code', 'NO');";
    $execute = mysqli_query($connect, $query);
    if (!$query) {
        exit("error");
    }
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'admin@example.com';                    //SMTP username
        $mail->Password   = 'secret';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('admin@example.com', 'Mailer');
        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $url = "http://". $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF'])."/comfirm_pass.php?code=$code";
        echo $url;                                            //for testing
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset password link';
        $mail->Body    = "<h1>You requested a password reset link</h1>
                            Click <a href='{$url}'>this link</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

