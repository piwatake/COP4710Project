<?php include("header.php"); ?>
	
    
    
    
    
      <div id="content">
        <div class="content_item">
          <h2>Add RSO</h2>
            <div class="content_container">
            
                <div id="content_blue">
                
                
                
                    <div class="content_blue_container_box">
                        <h3>Add RSO</h3>
                        <form action="rsoregistered.php" method="POST">
                             <p><label>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="name" type="text" name="name" placeholder="name" /></p>
                             
                             <p><label>Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="type" type="text" name="type" placeholder="type" /></p>
                             
                             <p><label>Description&nbsp; : </label>
                             <input id="desc" type="text" name="desc" placeholder="description" /></p>
                             
                             <p><label>Admin email : </label>
                             <input id="aemail" type="email" name="aemail" placeholder="yourname@site.com" /></p>
                             
                             <p><label>Email 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="email2" type="email" name="email2" placeholder="someonesname@site.com" /></p>
                             
                             <p><label>Email 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="email3" type="email" name="email3" placeholder="someonesname@site.com" /></p>
                             
                             <p><label>Email 4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="email4" type="email" name="email4" placeholder="someonesname@site.com" /></p>
                             
                             <p><label>Email 5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="email5" type="email" name="email5" placeholder="someonesname@site.com" /></p>
                             
                            <input class="submitbtn" type="submit" name="submit" value="Create" />
                        </form>
                    </div><!--close content_blue_container_box-->
                    
                    
                </div><!--close content_blue-->
        
			</div><!--close content_container-->
	    </div><!--close content_item-->
      </div><!--close content-->

      
      
      
 
<?php include("footer.php"); ?>