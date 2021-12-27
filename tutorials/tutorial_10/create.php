<?php 
    include_once('auth/auth.php');
    include_once('connect.php');
    $success = false;
    $errAge = false;
    $isEmpty = false;
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
    if(isset($_POST['submit'])) {
        if (empty(inputValidate($_POST['fname']))) {
            $isEmpty = true;
        } else {
            $fname = inputValidate($_POST['fname']);
        }//first name validate
        if (empty(inputValidate($_POST['lname']))) {
            $isEmpty = true;
        } else {
            $lname = inputValidate($_POST['lname']);
        }//last name validate
        if (empty(inputValidate($_POST['age']))) {
            $isEmpty = true;
        } else {
            $age = inputValidate($_POST['age']);
        }//age validate
        if (empty(inputValidate($_POST['ph']))) {
            $isEmpty = true;
        } else {
            $ph = inputValidate($_POST['ph']);
        }//phone number validate
        if (empty(inputValidate($_POST['city']))) {
            $isEmpty = true;
        } else {
            $city = inputValidate($_POST['city']);
        }//city validate
        if(!$isEmpty) {
            if(!preg_match("/^[0-9]+$/", $age)) {
                $errAge = true;
            } else {
                $create = "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('$fname', '$lname', $age, '$ph', '$city');";
                $execute = mysqli_query($connect, $create);
                if ($execute) {
                    $success = true;
                }
            }
        }
    }
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create person | tutorial 09</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3>Create a person</h3>
        <form action="create.php" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" required>
            <label for="ph">Phone Number:</label>
            <input type="text" id="ph" name="ph" required>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
            <input type="submit" value="create" name="submit" class="btn" required>
        </form>
        <a href="index.php" class="home">home</a>
    </div>
    <?php
        if($isEmpty) {
            echo "<p class='center alert-box'>Fill all input data</p>";
        }
        if($errAge) {
            echo "<p class='center alert-box'> Age must be number. </p>.";
        }
        if($success) {
            echo "<p class='center success'>one record created successfully.</p>";
        }
    ?>  
</body>
</html>