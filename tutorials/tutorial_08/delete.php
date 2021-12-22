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
    <?php 
        include_once('connect.php');
        $id = $_GET['id'];
        $delete = "DELETE FROM persons WHERE id = $id;";
        $execute = mysqli_query($connect, $delete);
        header("location: index.php?delete=$id");
    ?>
</body>
</html>