<?php include("header.php"); ?>
	
    
    
    
    
      <div id="content">
        <div class="content_item">
          <h2>Add Event</h2>
            <div class="content_container">
                <div id="content_blue">

                
                    
                    <div class="content_blue_container_box">
                        <h3>Add Event</h3>
                        <form action="eventregistered.php" method="POST">
                             <p><label>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="name" type="text" name="name" placeholder="name" /></p>
                             
                             <p><label>Category&nbsp;&nbsp;&nbsp; : </label>
                             <input id="cat" type="text" name="cat" placeholder="category" /></p>
                             
                             <p><label>Description : </label>
                             <input id="desc" type="text" name="desc" placeholder="description" /></p>
                             
                             <p><label>Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="phone" type="tel" name="phone" placeholder="phone" /></p>
                             
                             <p><label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="email" type="email" name="email" placeholder="name@site.com" /></p>
							 
							 <p><label>Location : </label>
                             <select name="loc">
                                <option value="University of Central Florida">University of Central Florida</option>
                                <option value="University of Florida">University of Florida</option>
								<option value="Valencia College">Valencia College</option>
                             </select></p>
                             
                             <p><label>Link&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="link" type="url" name="link" placeholder="link" /></p>
                             
                             <p><label>Time : </label>
                             <input id="time" type="datetime-local" name="time" placeholder="time" /></p>
                             
                             <p><label>Visibility : </label>
                             <select name="vis">
                                <option value="Public">Public</option>
                                <option value="rso">RSO</option>
                             </select></p>
                             
                            <input class="submitbtn" type="submit" name="submit" value="Create" />
                        </form>
                    </div><!--close content_blue_container_box-->
                    
                    
                    
                </div><!--close content_blue-->
        
			</div><!--close content_container-->
	    </div><!--close content_item-->
      </div><!--close content-->

      
      
      
 
<?php include("footer.php"); ?>