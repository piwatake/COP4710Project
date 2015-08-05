<?php include("header.php"); ?>
	
    <div id="content">
        <div class="content_item">
          <h2>Events</h2>
            <?php
			if (isset($_SESSION['loggedin']))
			{
				echo '<p>We have events for UCF, UF, and Valencia.</p><br />
				
				<h2>Comment</h2>
				<form name="form" action="eventratecommentsubmit.php" method="POST">
					<p><label>Name : </label><select id = "event" name="event">';
						$sqlQuery = "SELECT * FROM Event
											ORDER BY EventID DESC;";
						$sqlResult = mysql_query($sqlQuery);
						$sqlNum = mysql_numrows($sqlResult);
						$count = 0;
						
						while ($count < $sqlNum)
						{
							$anevent = mysql_result($sqlResult, $count, "EventName");
							
							echo '<option value = "' . $anevent . '" >' . $anevent . '</option></br />';
							$count++;
						}
					echo '</select></p>
					<p><label>Comment : </label><br />
					 <!-- <textarea  id = "comment" name = "comment" form = "form" rows="4" cols="50"></textarea><br /></p> -->
					<input id="comment" name="comment" placeholder="comment" /></p> 
					<p><label>Rating : </label>
						<select type = "number" id = "rate" name="rate">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select></p>
					<p><label>What RSO are you a member of? </label><select type = "text" id="rso" name="rso">';
							$sqlQuery = "SELECT * FROM rso
												ORDER BY rsoname ASC;";
							$sqlResult = mysql_query($sqlQuery);
							$sqlNum = mysql_numrows($sqlResult);
							$count = 0;
							
							echo '<option value = "$none" selected="selected">None</option></br />';
							while ($count < $sqlNum)
							{
								$name = mysql_result($sqlResult, $count, "rsoname");
								
								echo '<option value = "$name">' . $name . '</option></br />';
								$count++;
							}
					echo '</select></p>
					<input class="submitbtn" type="submit" name="submit" value="Rate & Comment" />
				</form>';
			}
			else
				echo '<p>You must login to see this page.</p>'; ?>
        
        </div><!--close content_item-->
      </div><!--close content-->
 
<?php include("footer.php"); ?>