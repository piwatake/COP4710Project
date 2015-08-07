<?php include("header.php"); ?>

  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript">stLight.options({publisher: "1b03252f-567e-4dd9-bff7-060208e8b6e2", doNotHash: false, doNotCopy: true, hashAddressBar: true});</script>

	  <div id="content">
        <div class="content_item">
		  <h1><?php if (isset($_SESSION['loggedin'])) echo "Hello, " . $_SESSION['myusername'] . "! "; ?>Welcome to University Events!</h1> 
	      <p>On this site you can find information about UCF, UF, and Valencia and their associated events. Feel free to make an account, login, and rate these events if you like them!</p>	  
		  <br />
          <div class="content_container">
            <a href="events.php"><h2>University of Central Florida</h2></a>
		    <p>The <b>University of Central Florida (UCF)</b> is a metropolitan public research university located in Orlando, Florida, United States. <b>UCF</b> is a member institution of the State University System of Florida, and it is the largest university in the United States by undergraduate enrollment and the country's second-largest by total enrollment.</p>
		  	<div class="button_small">
		      <a href="events.php">Find events</a>
		    </div><!--close button_small-->
		  </div><!--close content_container-->
          <div class="content_container">
            <a href="events.php"><h2>University of Florida</h2></a>
		    <p>The <b>University of Florida (UF)</b> is an American public land-grant, sea-grant, and space-grant research university located on a 2,000-acre campus in North Central Florida. It is a senior member of the State University System of Florida and traces its historical origins to 1853, and has operated continuously on its present Gainesville campus since September 1906.</p>          
		  	<div class="button_small">
		      <a href="events.php">Find events</a>
		    </div><!--close button_small-->
		  </div><!--close content_container-->
          <div class="content_container">
            <a href="events.php"><h2>Valencia College</h2></a>
		    <p><b>Valencia College (VC)</b>, also known as just <b>Valencia</b>, is a public state college in Orlando, Florida, United States. <b>Valencia</b> is the third-largest member institution of the Florida College System.</p>          
		  	<div class="button_small">
		      <a href="events.php">Find events</a>
		    </div><!--close button_small-->
		  </div><!--close content_container-->
		</div><!--close content_item-->
      </div><!--close content-->
	  

  <span class='st_facebook_vcount' displayText='Facebook'></span>
  <span class='st_googleplus_vcount' displayText='Google +'></span>
  <span class='st_twitter_vcount' displayText='Tweet'></span>

<?php include("footer.php"); ?>