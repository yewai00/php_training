<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top | tutorial 04</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3>Login Form</h3>
        <form action="login.php" method="POST">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <?php if ( isset($_GET['incorrect']) ) : ?>
            <div class="alert">Incorrect Email or Password</div>
        <?php endif ?>
    </div>
</body>
</html>