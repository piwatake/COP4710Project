<?php session_start(); // call to have access to session variables 
    require 'connect.php'; 
    // If the values are posted, then insert them into the database 
    if (isset($_POST['name'])) 
    { 
        $name = $_POST['name']; 
        $cat = $_POST['cat']; 
        $desc = $_POST['desc']; 
        $phone = $_POST['phone']; 
        $email = $_POST['email']; 
        $loc = $_POST['loc']; 
        $link = $_POST['link']; 
        $time = $_POST['time']; 
        $vis = $_POST['vis']; 
         
        if (strcmp($loc, 'University of Central Florida') == 0) 
        { 
            $Admin_AdminID = 1; 
        } 
        if (strcmp($loc, 'University of Florida') == 0) 
        { 
            $Admin_AdminID = 4; 
        } 
        if (strcmp($loc, 'Valencia College') == 0) 
        { 
            $Admin_AdminID = 3; 
        } 
         
        $query = "INSERT INTO Event (EventCat, EventName, description, ContactPhone, ContactEmail, Admin_AdminID, Location_Name, DateTime, Visibility, Link) VALUES ('$cat', '$name', '$desc', '$phone', '$email', '$Admin_AdminID', '$loc', '$time', '$vis', '$link')";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query); 
        if ($result) 
        { 
            $msg = "Event created successfully!"; 
        } 
        else 
        { 
            die('Could not enter data: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
        } 
    } 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Event Registered</title> 
</head> 
<body> 
    <h1>Event created successfully!</h1> 
    <p> 
        Thanks, <?php echo $_SESSION['myusername']; ?>! You may now <a class="btn" href="events.php" />see your event</a>. 
    </p> 
</body> 
</html> 