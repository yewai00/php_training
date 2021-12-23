<?php 
    include_once('connect.php');
    $insert = "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('Mg', 'Mg', 18, '09 000000002', 'Yangon');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('Ko', 'Ko', 20, '09 000012440', 'Mandalay');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('kyaw', 'kyaw', 32, '09 001827643', 'Yangon');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('Aung', 'Aung', 34, '09 333345002', 'Mawlamyine');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('Kaung', 'Khant', 19, '09 000035352', 'Yangon');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('Mg', 'Nyo', 24, '09 005035352', 'Yangon');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('Ma', 'pu', 19, '09 002035352', 'Yangon');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('Mg', 'shin', 21, '09 008035352', 'Yangon');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('U', 'ba', 40, '09 000000567', 'Yangon');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('kyi', 'Kyi', 39, '09 000343402', 'Mandalay');";
    $insert .= "INSERT INTO persons (first_name, last_name, age, phone_number, city) VALUES ('Aung', 'Kyaw', 45, '09 343700002', 'Yangon');";
    $execute = mysqli_multi_query($connect, $insert);
    if($execute) {
        echo "inserted data successfully.";
        echo "<a href='index.php'>home</a>";
    }
    mysqli_close($connect);
?>