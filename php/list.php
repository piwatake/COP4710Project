<?php include("header.php"); ?>
	
    <div id="content">
        <div class="content_item">
          <h2>List</h2>
			<p>Here's a list of what universities and RSOs our database holds:</p><br />
				
				<h2>Universities</h2>
				<p>
					<?php
					$sqlQuery = "SELECT * FROM University
										ORDER BY UniversityID DESC;";
					$sqlResult = mysql_query($sqlQuery);
					$sqlNum = mysql_numrows($sqlResult);
					$count = 0;
					
					while ($count < $sqlNum)
					{
						$name = mysql_result($sqlResult, $count, "Name");
						
						echo '<option value = "' . $name . '" >' . $name . '</option></br />';
						$count++;
					}
					?>
				</p>
				
				<h2>RSOs</h2>
				<p>
						<?php
						$sqlQuery = "SELECT * FROM rso
											ORDER BY rsoname ASC;";
						$sqlResult = mysql_query($sqlQuery);
						$sqlNum = mysql_numrows($sqlResult);
						$count = 0;
						
						while ($count < $sqlNum)
						{
							$name = mysql_result($sqlResult, $count, "rsoname");
							
							echo '<option value = "$name">' . $name . '</option></br />';
							$count++;
						}
						?>
				</p>

        </div><!--close content_item-->
      </div><!--close content-->
 
<?php include("footer.php"); ?>