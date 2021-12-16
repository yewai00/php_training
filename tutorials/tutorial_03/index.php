<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top | tutorial 03</title>
</head>
<body>
    <?php 
        $today = date("Y-m-d");
        echo "<h3>Today is $today</h3>";
        if(isset($_GET["oldBday"])) {
            $today = $_GET["oldBday"];
        }
    ?>
    <form action="calculateAge.php" method="GET">
        <label for="date">Choose your birthday: </label>
        <input type="date" name="birthday" id="date" value="<?php echo $today; ?>">
        <input type="submit" value="calculate">
    </form>
    <?php 
        if (isset($_GET['age'])) {
            $age = $_GET['age'];
            if($age) echo "<p> You are $age years old. </p>";
            else echo "<p> You are not born yet!</p>";
        }
        elseif (isset($_GET['day'])) {
            $age = $_GET['day'];
            if($age) echo "<p> You are $age days old baby.</p>";
            else echo "<p>Congratulations! You are born today.</p>";
        }
    ?>
</body>
</html>