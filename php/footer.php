      <div id="content_blue">
      
      <?php if (!isset($_SESSION['loggedin'])) echo '
        <div class="content_blue_container_box">
            <h4>Register</h4>
            <form action="registered.php" method="POST">
                <p><label>Username&nbsp; : </label>
                <input id="login" type="text" name="login" placeholder="username" /></p>
                
                 <p><label>Password&nbsp;&nbsp; : </label>
                 <input id="password" type="password" name="password" placeholder="password" /></p>
                 
                 <p><label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                 <input id="email" type="email" name="email" placeholder="yourname@site.com" /></p>
                 
                <input class="submitbtn" type="submit" name="submit" value="Register" />
            </form>
	    </div><!--close content_blue_container_box-->
        
        <div class="content_blue_container_box">
            <h4>Login</h4>
            <form action="checklogin.php" method="POST">
                <p><label>Username&nbsp; : </label>
                <input id="login" type="text" name="myusername" placeholder="username" /></p>
             
                 <p><label>Password&nbsp;&nbsp; : </label>
                 <input id="password" type="password" name="mypassword" placeholder="password" /></p>
             
                <input class="submitbtn" type="submit" name="submit" value="Login" />
            </form>
	    </div><!--close content_blue_container_box-->
        '; ?>
        
        <?php if (isset($_SESSION['loggedin'])) echo '
        <div class="content_blue_container_boxl">
	      <div class="readmore">
		    <a href="logout.php">Logout</a>
		  </div><!--close readmore-->	  
	    </div><!--close content_blue_container_box1-->
        '; ?>
        
	    <br style="clear:both"/>
      </div><!--close content_blue--> 	
	</div><!--close site_content--> 

    
  </div><!--close main-->
  
  <div id="footer">
	  Paul Iwatake, Katie Jurek, Erwin Holzhauser, Justin Kimble
  </div><!--close footer-->  
  
</body>
</html>