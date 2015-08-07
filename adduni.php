<?php include("header.php"); ?>
	
    
    
    
    
      <div id="content">
        <div class="content_item">
          <h2>Add University</h2>
            <div class="content_container">
                <div id="content_blue">
                
                
                
                    <div class="content_blue_container_box">
                        <h2>Add University</h2>
                        <form action="uniregistered.php" method="POST">
                            <p><label>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                            <input id="name" type="text" name="name" placeholder="name" /></p>
                            
                             <p><label>Location&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="loc" type="text" name="loc" placeholder="location" /></p>
                             
                             <p><label>Description : </label>
							 
                             <input id="desc" type="text" name="desc" placeholder="description" /></p>
                             
                            <input class="submitbtn" type="submit" name="submit" value="Create" />
                        </form>
                    </div><!--close content_blue_container_box-->

                    
                    
                </div><!--close content_blue-->
        
			</div><!--close content_container-->
	    </div><!--close content_item-->
      </div><!--close content-->

      
      
      
 
<?php include("footer.php"); ?>