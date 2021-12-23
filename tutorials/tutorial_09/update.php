<?php 
    include_once('connect.php');
    $success = false;
    $errAge = false;
    $isEmpty = false;
    $sameid = false;
    $id = $_GET['id'];
    $checkQuery = "select id from persons;";
    $execute = mysqli_query($connect, $checkQuery);
    while($ids = mysqli_fetch_assoc($execute)) {
        if($ids['id'] == $id){
            $sameid = true;
        };
    };
    if($sameid) {
        $select = "select * from persons where id = $id;";
        $execute = mysqli_query($connect, $select);
        $record = mysqli_fetch_assoc($execute);
        $fname = $record['first_name'];
        $lname = $record['last_name'];
        $age = $record['age'];
        $ph = $record['phone_number'];
        $city = $record['city'];
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
                    $update = "UPDATE persons
                        SET first_name = '$fname', last_name = '$lname', age = $age, phone_number = '$ph', city = '$city'
                        WHERE id = $id;";
                    $execute = mysqli_query($connect, $update);
                    if($execute) {
                        $success = true;
                    }
                }
            }//validate to make not empty data
        }
    } else {
        $sameid = false;
    }
    mysqli_close($connect);
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
        <form action="update.php?id=<?= $id ?>" method="POST">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo isset($fname)? $fname: "" ?>" required>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo isset($lname)? $lname: "" ?>" required>
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" value="<?php echo isset($age)? $age: "" ?>" required>
            <label for="ph">Phone Number:</label>
            <input type="text" id="ph" name="ph" value="<?php echo isset($ph)? $ph: "" ?>" required>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?php echo isset($city)? $city: "" ?>" required>
            <input type="submit" value="update" name="submit" class="btn">
        </form>
        <a href="index.php" class="home">home</a>
        <?php 
            if($isEmpty) {
                echo "<p class='alert-box'>Fill all input data</p>";
            }
            if($errAge) {
                echo "<p class='alert-box'>Age must be number.</p>";
            }
            if($success) {
                echo "<p class='success'>updated successfully.</p>";
            }
            if(!$sameid) {
                echo "<p class='alert-box'>id $id not exist.</p>";
            }
        ?>
    </div>
    
</body>
</html>