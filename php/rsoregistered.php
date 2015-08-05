<?php session_start(); // call to have access to session variables
    require 'connect.php';
    // If the values are posted, then insert them into the database
    if (isset($_POST['name'])
		&& isset($_POST['type'])
		&& isset($_POST['aemail'])
		&& isset($_POST['email2'])
		&& isset($_POST['email3'])
		&& isset($_POST['email4'])
		&& isset($_POST['email5']))
    {
        $name = $_POST['name'];
        $type = $_POST['type'];
		$desc = $_POST['desc'];

		$query = "INSERT INTO RSO (rsoname, type, description) VALUES ('$name', '$type', '$desc')";
		$result = mysql_query($query);
		if ($result)
		{
			$msg = "RSO created successfully!";
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
	<title>RSO Registered</title>
</head>
<body>
	<h1>RSO created successfully!</h1>
	<p>
		Thanks, <?php echo $_SESSION['myusername']; ?>! You may now <a class="btn" href="index.php" />return to the homepage.</a>.
	</p>
</body>
</html>
