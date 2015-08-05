<?php session_start(); // call to have access to session variables
    require 'connect.php';
    // If the values are posted, then insert them into the database
    if (isset($_POST['login']) && isset($_POST['password']))
    {
        //echo "stuff\n";
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        //echo $password;
        $query = "INSERT INTO User (Username, password, Email) VALUES ('$login', '$password', '$email')";
        $result = mysql_query($query);
        if ($result)
        {
            $msg = "User created successfully!";
        }
        else
        {
            die('Could not enter data: ' . mysql_error());
        }
    } 
    //echo "didn't reach it";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registered</title>
</head>
<body>
	<h1>User created successfully!</h1>
	<p>
		Thanks, <?php echo $login; ?>! You may now <a class="btn" href="index.php" />login</a>.
	</p>
</body>
</html>
