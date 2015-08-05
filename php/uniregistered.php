<?php session_start(); // call to have access to session variables
    require 'connect.php';
    // If the values are posted, then insert them into the database
    if (isset($_POST['name'])
		&& isset($_POST['loc'])
		&& isset($_POST['desc']))
    {
        $name = $_POST['name'];
        $loc = $_POST['loc'];
        $desc = $_POST['desc'];

		$query = "INSERT INTO university (Name, Location, Description) VALUES ('$name', '$loc', '$desc')";
		$result = mysql_query($query);
		
		if ($result)
		{
			$msg = "University created successfully!";
		}
		else
		{
			die('Could not enter data: ' . mysql_error());
		}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>University Registered</title>
</head>
<body>
	<h1>University created successfully!</h1>
	<p>
		Thanks, <?php echo $_SESSION['myusername']; ?>! You may now <a class="btn" href="index.php" />return to the homepage</a>.
	</p>
</body>
</html>
