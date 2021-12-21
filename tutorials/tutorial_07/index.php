<?php
    include('library/phpqrcode/qrlib.php');
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR; 
    $emptydata = false;
    //check dir exist or not
    if (!is_dir($path))
        mkdir($path, 0777);
    $createdDir = 'temp/';  
    $filename = $path.'test.png';
    $errorCorrectionLevel = 'H';
    $matrixPointSize = 5;
    if (isset($_REQUEST['data'])) { 
        $data = $_REQUEST['data'];
        if (trim($data) == '')
            $emptydata = true;    
        // user data create QR
        else {
            $filename = $path.'test'.md5($data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
            QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);       
        }
    } 
    // default data
    else {       
        QRcode::png('Let\'s create QR code.', $filename, $errorCorrectionLevel, $matrixPointSize, 2);         
    }               
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top | tutorial 07</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3>Tutorial 07</h3>
        <form action="index.php" method="post">
            <label for="data-box">Data:</label>
            <input type="text" id="data-box" name="data" value="<?php echo isset($data)?htmlspecialchars($data):'Let\'s create QR code.'?>">
            <input type="submit" value="SAVE" class="btn">
        </form>
        <?php 
            if($emptydata)
                echo '<p class="alert"> data is empty! </p>';
            elseif(isset($filename))
                echo '<img src="'.$createdDir.basename($filename).'" class="img" /><hr/>';  
        ?>
    </div>
</body>
</html>