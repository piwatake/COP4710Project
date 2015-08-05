<?php include("header.php"); ?>
	
    
    
    
    
      <div id="content">
        <div class="content_item">
          <h2>Add Content</h2>
            <?php
                if (isset($_SESSION['loggedin']))
                    echo '<p>Hi, ' . $_SESSION['myusername'] . '! Would you like to <a href="adduni.php">add a university</a>, <a href="addrso.php">add an RSO</a>, or <a href="addevent.php">add an event</a>?</p>';
                else
                    echo '<p>You must login to see this page.</p>';
            ?>
	    </div><!--close content_item-->
      </div><!--close content-->

      
      
      
 
<?php include("footer.php"); ?>