<?php 
    include_once('connect.php');
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
        if(isset($_POST['submit'])) {
            $delete = "DELETE FROM persons WHERE id = $id;";
            $execute = mysqli_query($connect, $delete);
            header("location: index.php?delete=$id");
        } elseif(isset($_POST['cancel'])) {
            header("location: index.php");
        }
    } else {
        echo "<p class='alert-box'>id $id is not exist </p>";
    }
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete person | tutorial 08</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
        if(!$sameid) {
            die();
        }
    ?>
    <div class="container">
        <form action="delete.php?id=<?= $id ?>" method="POST" class="delete">
            <h3 class="center">Are you sure to delete?</h3>
            <div class="confirm">
                <input type='submit' value='Delete' name="submit" class='btn alert'>
                <input type='submit' value='Cancel' name="cancel" class='btn'>   
            </div>
        </form>
    </div>
</body>
</html>