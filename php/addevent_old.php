<?php include("header.php"); ?>
	
    
    
    
    
      <div id="content">
        <div class="content_item">
          <h2>Add Content</h2>
            <div class="content_container">
                <div id="content_blue">

                
                    
                    <div class="content_blue_container_box">
                        <h3>Add Event</h3>
                        <form action="eventregistered.php" method="POST">
                            <p><label>Username&nbsp; : </label>
                            <input id="login" type="text" name="login" placeholder="username" /></p>
                            
                             <p><label>Password&nbsp;&nbsp; : </label>
                             <input id="password" type="password" name="password" placeholder="password" /></p>
                             
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
                             
                             <p><label>Location&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="loc" type="text" name="loc" placeholder="location" /></p>
                             
                             <p><label>Link&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                             <input id="link" type="url" name="link" placeholder="link" /></p>
                             
                             <p><label>Time : </label>
                             <input id="time" type="datetime-local" name="time" placeholder="time" /></p>
                             
                             <p><label>Visibility : </label>
                             <select name="vis">
                                <option value="public">Public</option>
                                <option value="rso">RSO</option>
                             </select>
                             <!--<input id="vis" type="text" name="vis" placeholder="visibility" />--></p>
                             
                            <input class="submitbtn" type="submit" name="submit" value="Register" />
                        </form>
                    </div><!--close content_blue_container_box-->
                    
                    
                    
                </div><!--close content_blue-->
        
			</div><!--close content_container-->
	    </div><!--close content_item-->
      </div><!--close content-->

      
      
      
 
<?php include("footer.php"); ?>