<?php session_start();
include("connect.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>University Events</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
  </script> 
</head>

<body>
  <div id="main">

	<div id="menubar">
	  <div id="welcome">
	    <h1><a href="#">University Events</a></h1>
	  </div><!--close welcome-->
      <div id="menu_items">
	    <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="add.php">Add</a></li>
		  <li><a href="list.php">List</a></li>
		  <li><a href="eventratecomment.php">Rate & Comment</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div><!--close menu-->
    </div><!--close menubar-->	
    
	<div id="site_content">

	  <div id="banner_image">
	    <div id="slider-wrapper">        
          <div id="slider" class="nivoSlider">
            <img src="images/home_1.jpg" alt="" />
            <img src="images/home_2.jpg" alt="" />
		  </div><!--close slider-->
		</div><!--close slider_wrapper-->
	  </div><!--close banner_image-->	

	  <div class="sidebar_container">
      
		<div class="sidebar">
          <div class="sidebar_item">
            <h2>Welcome<?php if (isset($_SESSION['loggedin'])) echo ", " . $_SESSION['myusername'] . "!"; ?></h2>
            <p>UCF, UF, and Valencia welcome you to the events site<?php if (isset($_SESSION['loggedin'])) echo ", " . $_SESSION['myusername']; ?>!</p>
          </div><!--close sidebar_item-->
        </div><!--close sidebar-->
        
		<div class="sidebar">
          <div class="sidebar_item">
            <h2>Latest Events</h2>
            <?php
                    $sqlQuery = "SELECT * FROM event ORDER BY EventID DESC";
                    $sqlResult = mysql_query($sqlQuery);
                    $sqlNum = mysql_numrows($sqlResult);
                    $count = 0;

                    while ($count < $sqlNum && $count < 3)
                    {
                        $cat = mysql_result($sqlResult, $count, "EventCat");
                        $name = mysql_result($sqlResult, $count, "EventName");
                        $datetime = mysql_result($sqlResult, $count, "DateTime");
                        $link = mysql_result($sqlResult, $count, "Link");
                    ?>
                    
                    <h3><a href="<?php echo $link; ?>" /><?php echo $name; ?></a></h3>
                    <p><?php echo $datetime ?></p>
                    
                    <?php
                        $count++;
                    }
                ?>  
		  </div><!--close sidebar_item-->
        </div><!--close sidebar-->
        
      </div><!--close sidebar_container-->