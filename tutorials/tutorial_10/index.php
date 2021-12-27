<?php
    include_once('auth/auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top | tutorial 09</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3>Tutorial 09</h3>
        <a href="auth/logout.php" class="logout">logout</a>
        <a href="create.php" class="home link">Create a person</a>
        <?php
            include_once('connect.php');
            $delete = 0;
            if(isset($_GET['delete'])) {
                $delete = $_GET['delete'];
            }
            $select = 'SELECT * from persons;';
            $execute = mysqli_query($connect, $select);
            if(mysqli_num_rows($execute) > 0){  
                echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Phone Number</th>
                        <th>City</th>
                        <th>Edit</th>
                    </tr>";
                while($row = mysqli_fetch_assoc($execute)) {  
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";  
                    echo "<td>".$row['first_name']."</td>";  
                    echo "<td>".$row['last_name']."</td>";  
                    echo "<td class='age'>".$row['age']."</td>";  
                    echo "<td>".$row['phone_number']."</td>";  
                    echo "<td>".$row['city']."</td>"; 
                    echo "<td>
                            <a href=\"update.php?id={$row['id']}\">update</a> | 
                            <a href=\"delete.php?id={$row['id']}\" class='alert'>delete</a>
                        </td>";
                    echo "</tr>"; 
                } //select one record in each time
                echo "</table>";
               } else {  
                echo "persons table have no record yet.<a href='insertdata.php'>run this to insert data.</a>";  
            }  
            if($delete) {
                echo "<script>alert('person id $delete deleted successfully.')</script>";
            }
            mysqli_close($connect);
        ?>
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
        <script src="node_modules/chart.js/dist/chart.js"></script>
        <script src="js/common.js"></script>
    </div>
</body>
</html>