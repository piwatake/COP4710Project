<?php session_start(); // call to have access to session variables
    require 'connect.php';
    // If the values are posted, then insert them into the database
    if (isset($_POST['comment']))
    {
        $comment = $_POST['comment'];
        $rate = $_POST['rate'];
        $event = $_POST['event'];
        $rso = $_POST['rso'];
		$username = $_SESSION['myusername'];
		
		//echo $event;
		
		

		$sqleventID = "SELECT EventID FROM Event WHERE EventName = '$event'";
		$sqleventIDres = mysql_query($sqleventID);
		$sqlNum2 = mysql_numrows($sqleventIDres);
						$count2 = 0;
						
						while ($count2 < $sqlNum2)
						{
							$eID = mysql_result($sqleventIDres, $count2, "EventID");
							
							//echo '<option value = "$name">' . $name . '</option></br />';
							$count2++;
						}
		
		
							
		$sqlcurrusrID = "SELECT StudentID FROM Student as s, User as u WHERE s.User_UserID = u.userID AND u.Username = '$username'"; 
		$sqlcurrusrIDres = mysql_query($sqlcurrusrID);
		$sqlNum1 = mysql_numrows($sqlcurrusrIDres);
						$count1 = 0;
						
						while ($count1 < $sqlNum1)
						{
							$uID = mysql_result($sqlcurrusrIDres, $count1, "StudentID");
							
							//echo '<option value = "$name">' . $name . '</option></br />';
							$count1++;
						}
		

			//echo "submitting query ". $comment ." ". $rate ." event: " .$eID ." rso: ". $rso ." ". $username. " ". $uID."   \n";
		
        $query1 = "INSERT INTO Comment (commentcontent, Student_StudentID, Event_EventID) 
		VALUES ('$comment', '$uID', '$eID')";
        $result1 = mysql_query($query1);
        if ($result1)
        {
            $msg1 = "Comment submitted successfully!";
        }
        else
        {
            die('Could not enter data: ' . mysql_error());
        }
		
		$query2 = "INSERT INTO Rating (Rating, Event_EventID) 
		VALUES ('$rate', '$eID')";
        $result2 = mysql_query($query2);
        if ($result1)
        {
            $msg2 = "Rating submitted successfully!";
        }
        else
        {
            die('Could not enter data: ' . mysql_error());
        }
		
		
    }  else {
		echo "didn't reach it";
	}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Event Registered</title>
</head>
<body>
	<h1>Comment and rating submitted!</h1>
	<p>
		Thanks, <?php echo $_SESSION['myusername']; ?>! You may now see your <a class="btn" href="events.php" />comment</a>.
	</p>
</body>
</html>
