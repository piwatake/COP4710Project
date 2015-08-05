<?php session_start(); // call to have access to session variables
    require 'connect.php';
    // If the values are posted, then insert them into the database
    if (isset($_POST['name']) && isset($_POST['password']))
    {
        //echo "stuff\n";
        $name = $_POST['name'];
        $cat = $_POST['cat'];
        $desc = $_POST['desc'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $loc = $_POST['loc'];
        $link = $_POST['link'];
        $time = $_POST['time'];
        $vis = $_POST['vis'];
        //echo $password;
        $query = "INSERT INTO Event (EventCat, EventName, description, ContactPhone, ContactEmail, Location_Name, DateTime, Visibility, Link) VALUES ('$cat', '$name', '$desc', '$phone', '$email', '$loc', '$time', '$vis', '$link')";
        $result = mysql_query($query);
        if ($result)
        {
            $msg = "Event created successfully!";
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
	<title>Event Registered</title>
</head>
<body>
	<h1>Event created successfully!</h1>
	<p>
		Thanks, <?php echo $login; ?>! You may now <a class="btn" href="events.php" />see your event</a>.
	</p>
</body>
</html>
