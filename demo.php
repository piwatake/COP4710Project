<?php include("connect.php"); ?>

<pre>
question: for future reference, how do you get a sql query to change based on the button the user presses?
like one button makes the query:
	SELECT * FROM Event as e, Admin as a, Student as s, University as u
    WHERE e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Central Florida'
    ORDER BY EventID DESC;
the other makes it:
	SELECT * FROM Event as e, Admin as a, Student as s, University as u
    WHERE e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Florida'
    ORDER BY EventID ASC;
	etc.
</pre>
<p>You can do this a ton of different ways (literally dozens =D). Just for simplicity's sake I'll do a simple demo in basic php.
I'm guessing you're asking about a simple switch depending on a button press?</p>

<!-- Form to submit buttons 'n' stuff. -->
<form name="form" action="demo.php" method="post">
	<input name="event_a" type="submit" value="UCF desc">
	<input name="event_b" type="submit" value="UCF asc">
</form>

<hr>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST')

{ ?>
	<!-- Handle post data here. -->
	<?php
		var_dump($_POST);
		echo "<br><br>";
		$event_a = $_POST['event_a'];
		$event_b = $_POST['event_b'];

		$query = "";
		// Normal logic would go here. For SQL queries you could just set a variable.
		if ($event_a)
        {
			echo 'You pressed something! Setting query to UCF desc';
			$query = "SELECT * FROM Event as e, Admin as a, Student as s, University as u
                            WHERE e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Central Florida'
                            ORDER BY EventID DESC";
		}
        else if ($event_b)
        {
            echo 'You pressed something else! Setting query to UCF asc';
			$query = "SELECT * FROM Event as e, Admin as a, Student as s, University as u
                            WHERE e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Central Florida'
                            ORDER BY EventID ASC;";
		}
        else
        {
			echo 'I don\'t even... Abort!';
			return;
		}
		// What you need with results.
		// $db->query($query); 
		echo "<br><br>Your query: $query";

	?>
<?php
} ?>