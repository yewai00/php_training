<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top | tutorial 06</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3>Tutorial 06</h3>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="file">
                <label for="file" class="label">File Name:</label>
                <input type="file" name="file" id="file" required>
            </div>
            <div class="dir">
                <label for="dir" class="label">Directory Name:</label>
                <input type="text" name="dir" id="dir" required>
            </div>
            <input type="submit" name="submit" value="Upload" class="btn">
        </form>
        <?php
            if (isset($_POST["submit"])) {
                $dir = trim($_POST["dir"]);
                // server validation user input not to be spaces
                if (!empty($dir)) {
                    $dir = $_POST["dir"];
                    ini_set('upload_max_filesize', "3M");
                    if ($_FILES["file"]["error"]) {
                        if ($_FILES["file"]["error"] == 1) {
                            echo "<p class='alert'>The uploaded file exceeds the upload_max_filesize. File size must be exceeded 2MB.</p>";
                        }
                        else {
                            echo "<p>file error</p>";
                        }
                    }
                    elseif (($_FILES["file"]["type"] == "image/gif")
                        || ($_FILES["file"]["type"] == "image/jpeg")
                        || ($_FILES["file"]["type"] == "image/png")
                        || ($_FILES["file"]["type"] == "image/jpg")) {
                        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                        echo "Type: " . $_FILES["file"]["type"] . "<br>";
                        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
                        if (!is_dir("../tutorial_06/$dir")) {
                            mkdir("../tutorial_06/$dir", 0777, true);
                        }
                        if (file_exists("../tutorial_06/$dir/" . $_FILES["file"]["name"])) {
                            echo $_FILES["file"]["name"] . " already exists. ";
                        }
                        else { 
                            move_uploaded_file($_FILES["file"]["tmp_name"],
                            ("../tutorial_06/$dir/" . ($_FILES["file"]["name"])));
                            if (PHP_OS_FAMILY === "Windows") {
                                echo "Uploaded successfully in: " . getcwd() . "\\$dir\\" . $_FILES["file"]["name"];
                            }
                            else {
                                echo "Uploaded successfully in: " . getcwd() . "\/$dir/" . $_FILES["file"]["name"];
                            }
                        }
                    }    
                    else {
                        echo "<p>Invalid file</p>";
                    }
                }
                else {
                    echo "<p class='alert'>Please choose a directory.</p>";
                }   
            }
        ?>
    </div><!-- /.container -->
</body>
</html>