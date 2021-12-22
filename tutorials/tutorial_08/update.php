<?php 
    include_once('connect.php');
    $id = $_REQUEST['id'];
    $select = "select * from persons where id = $id;";
    $execute = mysqli_query($connect, $select);
    $record = mysqli_fetch_assoc($execute);
    $fname = $record['first_name'];
    $lname = $record['last_name'];
    $age = $record['age'];
    $ph = $record['phone_number'];
    $city = $record['city'];
    $success = false;
    $errAge = false;
    if(isset($_POST['submit'])) {
        $fname = strip_tags($_POST['fname']);
        $lname = strip_tags($_POST['lname']);
        $age = strip_tags($_POST['age']);
        $ph = strip_tags($_POST['ph']);
        $city = strip_tags($_POST['city']);
        if(!preg_match("/^[0-9]+$/", $age)) {
            $errAge = true;
        }
        else {
            $update = "UPDATE persons
                SET first_name = '$fname', last_name = '$lname', age = $age, phone_number = '$ph', city = '$city'
                WHERE id = $id;";
            $execute = mysqli_query($connect, $update);
            if($execute) {
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
    <title>update person | tutorial 08</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3>Update a record</h3>
        <form action="update.php" method="POST">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?= $fname ?>">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?= $lname ?>">
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" value="<?= $age ?>">
            <label for="ph">Phone Number:</label>
            <input type="text" id="ph" name="ph" value="<?= $ph ?>">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?= $city ?>">
            <input type="text" name="id" value="<?=$id?>" id="id" hidden>
            <input type="submit" value="update" name="submit" class="btn">
        </form>
        <a href="index.php" class="home">home</a>
        <?php 
            if($errAge) {
                echo "<p class='center alert'> Age must be number. </p>.";
            }
            if($success) {
                echo "<p class='center'>updated successfully.</p>";
            }
        ?>
    </div>
    
</body>
</html>