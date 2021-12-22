<?php 
    include_once('connect.php');
    $success = false;
    $errAge = false;
    if(isset($_POST['submit'])) {
        $fname = strip_tags($_POST['fname']);
        $lname = strip_tags($_POST['lname']);
        $age = strip_tags($_POST['age']);
        $ph = strip_tags($_POST['ph']);
        $city =strip_tags($_POST['city']);
        if(!preg_match("/^[0-9]+$/", $age)) {
            $errAge = true;
        }
        else {
            $create = "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('$fname', '$lname', $age, '$ph', '$city');";
            $execute = mysqli_query($connect, $create);
            if ($execute) {
                $success = true;
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
    <title>create person | tutorial 08</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3>Create a person</h3>
        <form action="create.php" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname">
            <label for="age">Age:</label>
            <input type="text" id="age" name="age">
            <label for="ph">Phone Number:</label>
            <input type="text" id="ph" name="ph">
            <label for="city">City:</label>
            <input type="text" id="city" name="city">
            <input type="submit" value="create" name="submit" class="btn">
        </form>
        <a href="index.php" class="home">home</a>
    </div>
    <?php
        if($errAge) {
            echo "<p class='center alert'> Age must be number. </p>.";
        }
        if($success) {
            echo "<p class='center'>one record created successfully.</p>";
        }
    ?>
    
</body>
</html>