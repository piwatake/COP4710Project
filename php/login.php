<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="register-form">
    <?php
        if (isset($msg) & !empty($msg)){
            echo $msg;
        }
     ?>
    <h1>Login</h1>
        <form action="checklogin.php" method="POST">
            <p><label>Username&nbsp; : </label>
            <input id="login" type="text" name="myusername" placeholder="username" /></p>
         
             <p><label>Password&nbsp;&nbsp; : </label>
             <input id="password" type="password" name="mypassword" placeholder="password" /></p>
         
            <a class="btn" href="index.php">Register</a>
            <input class="submitbtn" type="submit" name="submit" value="Login" />
        </form>
    </div>
</body>
</html>