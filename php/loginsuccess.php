<?php session_start(); // call to have access to session variables ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logged in</title>
</head>
<body>
	<h1>You are now logged in, <?php echo $_SESSION['myusername']; ?>!</h1>
    <a href="index.php" />Continue</a> or <a href="logout.php" />logout</a>.
</body>
</html>
