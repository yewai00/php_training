<?php 
    include_once('connect.php');
    $insert = "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('Mg', 'Mg', 12, '09 000000002', 'Yangon');";
    $execute = mysqli_query($connect, $insert);
    if($execute) {
        echo "one record inserted.";
    }
?>