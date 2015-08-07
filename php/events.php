<?php include("header.php"); ?>
	
    <div id="content">
        <div class="content_item">
          <h2>Latest Events</h2>
            <p>We have events for <a href="#ucf">UCF</a>, <a href="#uf">UF</a>, and <a href="#valencia">Valencia</a>.</p>
            <p>Click on the event name to see it on the map! Click <a href="xml_populate_v2.php">here</a> to refresh events. Click <a href="eventratecomment.php">here</a> to rate an event.</p><br />

            
            
            <h2 id="ucf">University of Central Florida Events</h2>
            <!-- Form to submit buttons 'n' stuff. -->
            <form name="form" action="events.php#ucf" method="POST">
                Sort by:
                <input name="event_a" type="submit" value="Date (desc)">
                <input name="event_b" type="submit" value="Date (asc)">
            </form><br />
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST')
            { ?>
                <!-- Handle post data here. -->
                <?php
                    //var_dump($_POST); // This is for debugging; it shows the variables that were POSTed.
                    $event_a = isset($_POST['event_a']) ? $_POST['event_a'] : false;
                    $event_b = isset($_POST['event_b']) ? $_POST['event_b'] : false;

                    // Normal logic goes here. For SQL queries you can just set a variable.
                    if ($event_a)
                    {
                        $sqlQuery = "SELECT * FROM Location as l, Event as e, Admin as a, Student as s, University as u
                                            WHERE e.Location_Name = l.name AND e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Central Florida'
                                            ORDER BY EventID DESC;";
                    }
                    else if ($event_b)
                    {
                        $sqlQuery = "SELECT * FROM Location as l, Event as e, Admin as a, Student as s, University as u
                                            WHERE e.Location_Name = l.name AND e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Central Florida'
                                            ORDER BY EventID ASC;";
                    }
                    else
                    {
                        // Initialize query to still show something in case the if statements don't work.
						$sqlQuery = "SELECT * FROM Location as l, Event as e, Admin as a, Student as s, University as u
											WHERE e.Location_Name = l.name AND e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Central Florida'
											ORDER BY EventID DESC;";
                    }
            }
                    $sqlResult = mysql_query($sqlQuery);
                    $sqlNum = mysql_numrows($sqlResult);
                    $count = 0;

                    while ($count < $sqlNum)
                    {
                        $eventid = mysql_result($sqlResult, $count, "EventID");
                        $cat = mysql_result($sqlResult, $count, "EventCat");
                        $name = mysql_result($sqlResult, $count, "EventName");
                        $desc = mysql_result($sqlResult, $count, "description");
                        $phone = mysql_result($sqlResult, $count, "ContactPhone");
                        $email = mysql_result($sqlResult, $count, "ContactEmail");
                        $adminid = mysql_result($sqlResult, $count, "Admin_AdminID");
                        $loc = mysql_result($sqlResult, $count, "Location_Name");
						//$bldg = mysql_result($sqlResult, $count, "Building");
                        $datetime = mysql_result($sqlResult, $count, "DateTime");
                        $vis = mysql_result($sqlResult, $count, "Visibility");
                        //$rating = mysql_result($sqlResult, $count, "Rating");
                        $link = mysql_result($sqlResult, $count, "Link");
                         
                        // You can also close PHP inside the loop, and it will repeat this block of HTML for every result.
                        // Alternatively, you can just echo the HTML *inside* PHP.
                        // Each way has an advantage depending what you're doing. Here's both.
				?>
                        
					<h3><a href="<?php echo $link; ?>" /><?php echo $name; ?> (<?php echo $cat; ?>)</a></h3>
					<p>
						<b>Date:</b> <?php echo $datetime ?><br />
						<b>Location:</b> <?php echo $loc; ?><!-- (Building <?php //echo $bldg; ?>)--><br />
						<b>Contact:</b> Phone: <?php echo $phone; ?>, Email: <?php echo $email; ?><br />
						<b>Description:</b> <?php echo $desc; ?><br />
						<b>Comments:</b><br />
						<?php 
						
						/*$sqlAvgRating = "SELECT * FROM rating as r, Location as l, Event as e, Admin as a, Student as s, University as u
												WHERE e.EventName = '$name' AND e.EventID = r.Event_EventID"
						$sqlAvgResult = mysql_query($sqlAvgRating);
						$rating = mysql_result($sqlAvgResult, 0, "Rating");
						echo '<b>Rating:</b> ' . $rating . '</br />';*/
							
							
						$sqlcomms = "SELECT commentcontent FROM Comment as c, Event as e
											WHERE c.Event_EventID = e.EventID AND e.EventName = '$name';";
						$sqlcommsres = mysql_query($sqlcomms);
						$sqlNum4 = mysql_numrows($sqlcommsres);
						//echo $sqlNum4;
						$count4 = 0;
						
						while ($count4 < $sqlNum4)
						{
							$acomm = mysql_result($sqlcommsres, $count4, "commentcontent");
							
							//echo '<option value = "$name">' . $name . '</option><br><br>';
							echo ' ' . $acomm . '</br />';
							$count4++;
						}
							
						?>
                        </p><br />
                        
                        <?php
                            $count++;
                    }
                ?><br /><br />
            
            
            
            <h2 id="uf">University of Florida Events</h2>
			<form name="form" action="events.php#uf" method="POST">
                Sort by:
                <input name="event_a2" type="submit" value="Date (desc)">
                <input name="event_b2" type="submit" value="Date (asc)">
            </form><br />
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST')
            { ?>
                <!-- Handle post data here. -->
                <?php
                    //var_dump($_POST); // This is for debugging; it shows the variables that were POSTed.
                    $event_a2 = isset($_POST['event_a2']) ? $_POST['event_a2'] : false;
                    $event_b2 = isset($_POST['event_b2']) ? $_POST['event_b2'] : false;

                    // Normal logic goes here. For SQL queries you can just set a variable.
                    if ($event_a2)
                    {
                        $sqlQuery = "SELECT * FROM Location as l, Event as e, Admin as a, Student as s, University as u
                                            WHERE e.Location_Name = l.name AND e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Florida'
                                            ORDER BY EventID DESC;";
                    }
                    else if ($event_b2)
                    {
                        $sqlQuery = "SELECT * FROM Location as l, Event as e, Admin as a, Student as s, University as u
                                            WHERE e.Location_Name = l.name AND e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Florida'
                                            ORDER BY EventID ASC;";
                    }
                    else
                    {
                        // Initialize query to still show something in case the if statements don't work.
						$sqlQuery = "SELECT * FROM Location as l, Event as e, Admin as a, Student as s, University as u
											WHERE e.Location_Name = l.name AND e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'University of Florida'
											ORDER BY EventID DESC;";
                    }
            }
                    $sqlResult = mysql_query($sqlQuery);
                    $sqlNum = mysql_numrows($sqlResult);
                    $count = 0;

                    while ($count < $sqlNum)
                    {
                        $eventid = mysql_result($sqlResult, $count, "EventID");
                        $cat = mysql_result($sqlResult, $count, "EventCat");
                        $name = mysql_result($sqlResult, $count, "EventName");
                        $desc = mysql_result($sqlResult, $count, "description");
                        $adminid = mysql_result($sqlResult, $count, "Admin_AdminID");
                        $loc = mysql_result($sqlResult, $count, "Location_Name");
                        $datetime = mysql_result($sqlResult, $count, "DateTime");
                        $vis = mysql_result($sqlResult, $count, "Visibility");
                        //$rating = mysql_result($sqlResult, $count, "Rating");
                        $link = mysql_result($sqlResult, $count, "Link");
                    ?>
                        
                    <h2><a href="<?php echo $link; ?>" /><?php echo $name; ?> (<?php echo $cat; ?>)</a></h2>
                    <p>
                        <b>Date:</b> <?php echo $datetime ?><br />
                        <b>Location:</b> <?php echo $loc; ?><br />
                        <b>Description:</b> <?php echo $desc; ?><br />
                        <b>Comments:</b><br />
						<?php 
						/*
						$sqlAvgRating = "SELECT AVG(r.rating) FROM rating as r, Location as l, Event as e, Admin as a, Student as s, University as u
									WHERE e.EventName = '$name' AND e.EventID = r.Event_EventID"
						$sqlavgres = mysql_query($sqlAvgRating);
						$anavg = mysql_result($sqlavgres, 1);
						echo '<b>Rating:</b> ' . $anavg . '</br />';*/
							
							
						$sqlcomms = "SELECT commentcontent FROM Comment as c, Event as e
											WHERE c.Event_EventID = e.EventID AND e.EventName = '$name';";
						$sqlcommsres = mysql_query($sqlcomms);
						$sqlNum4 = mysql_numrows($sqlcommsres);
						//echo $sqlNum4;
						$count4 = 0;
						
						while ($count4 < $sqlNum4)
						{
							$acomm = mysql_result($sqlcommsres, $count4, "commentcontent");
							
							//echo '<option value = "$name">' . $name . '</option><br><br>';
							echo ' ' . $acomm . '</br />';
							$count4++;
						}
							
						?>
                    </p><br />
                    
                    <?php
                        $count++;
                    }
                ?><br /><br />
      
      
      
			<h2 id="valencia">Valencia Events</h2>
			<form name="form" action="events.php#valencia" method="POST">
                Sort by:
                <input name="event_a3" type="submit" value="Date (desc)">
                <input name="event_b3" type="submit" value="Date (asc)">
            </form><br />
            <?php /*if ($_SERVER['REQUEST_METHOD'] == 'POST')
            { ?>
                <!-- Handle post data here. -->
                <?php
                    //var_dump($_POST); // This is for debugging; it shows the variables that were POSTed.
                    $event_a3 = isset($_POST['event_a3']) ? $_POST['event_a3'] : false;
                    $event_b3 = isset($_POST['event_b3']) ? $_POST['event_b3'] : false;

                    // Normal logic goes here. For SQL queries you can just set a variable.
                    if ($event_a3)
                    {
                        $sqlQuery = "SELECT * FROM Event as e, Admin as a, Student as s, University as u
											WHERE e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'Valencia College'
											ORDER BY EventID DESC;";
                    }
                    else if ($event_b3)
                    {
                        $sqlQuery = "SELECT * FROM Event as e, Admin as a, Student as s, University as u
											WHERE e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'Valencia College'
											ORDER BY EventID ASC;";
                    }
                    else
                    {
                        // Initialize query to still show something in case the if statements don't work.
						$sqlQuery = "SELECT * FROM Event as e, Admin as a, Student as s, University as u
											WHERE e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'Valencia College'
											ORDER BY EventID DESC;";
                    }
            }*/
                    $sqlQuery = "SELECT * FROM Event as e, Admin as a, Student as s, University as u
                                        WHERE e.Admin_AdminID = a.AdminID AND a.Student_StudentID = s.StudentID AND s.University_UniversityID = u.UniversityID AND u.Name = 'Valencia College'
                                        ORDER BY EventID DESC;";
                    $sqlResult = mysql_query($sqlQuery);
                    $sqlNum = mysql_numrows($sqlResult);
                    $count = 0;

                    while ($count < $sqlNum)
                    {
                        $eventid = mysql_result($sqlResult, $count, "EventID");
                        $cat = mysql_result($sqlResult, $count, "EventCat");
                        $name = mysql_result($sqlResult, $count, "EventName");
                        $desc = mysql_result($sqlResult, $count, "description");
                        $phone = mysql_result($sqlResult, $count, "ContactPhone");
                        $email = mysql_result($sqlResult, $count, "ContactEmail");
                        $adminid = mysql_result($sqlResult, $count, "Admin_AdminID");
                        $loc = mysql_result($sqlResult, $count, "Location_Name");
                        $datetime = mysql_result($sqlResult, $count, "DateTime");
                        $vis = mysql_result($sqlResult, $count, "Visibility");
                        //$rating = mysql_result($sqlResult, $count, "Rating");
                        $link = mysql_result($sqlResult, $count, "Link");
                    ?>
                        
                    <h2><a href="<?php echo $link; ?>" /><?php echo $name; ?> (<?php echo $cat; ?>)</a></h2>
                    <p>
                        <b>Date:</b> <?php echo $datetime ?><br />
                        <b>Location:</b> <?php echo $loc; ?><br />
                        <b>Contact:</b> Phone: <?php echo $phone; ?>, Email: <?php echo $email; ?><br />
                        <b>Description:</b> <?php echo $desc; ?><br />
                        <b>Comments:</b><br />
						<?php 
						/*
						$sqlAvgRating = "SELECT AVG(r.rating) FROM rating as r, Location as l, Event as e, Admin as a, Student as s, University as u
									WHERE e.EventName = '$name' AND e.EventID = r.Event_EventID"
						$sqlavgres = mysql_query($sqlAvgRating);
						$anavg = mysql_result($sqlavgres, 1);
						echo '<b>Rating:</b> ' . $anavg . '</br />';*/
							
							
						$sqlcomms = "SELECT commentcontent FROM Comment as c, Event as e
											WHERE c.Event_EventID = e.EventID AND e.EventName = '$name';";
						$sqlcommsres = mysql_query($sqlcomms);
						$sqlNum4 = mysql_numrows($sqlcommsres);
						//echo $sqlNum4;
						$count4 = 0;
						
						while ($count4 < $sqlNum4)
						{
							$acomm = mysql_result($sqlcommsres, $count4, "commentcontent");
							
							//echo '<option value = "$name">' . $name . '</option><br><br>';
							echo ' ' . $acomm . '</br />';
							$count4++;
						}
							
						?>
                    </p><br />
                    
                    <?php
                        $count++;
                    }
                ?>
                
                
                
    	    </div><!--close content_item-->
      </div><!--close content-->
 
<?php include("footer.php"); ?>