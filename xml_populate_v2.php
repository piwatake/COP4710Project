<?php 

$url = "http://events.ucf.edu/feed.xml"; 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url); //get the url contents 

$data = curl_exec ($ch);  //execute curl request 
curl_close($ch); 

$xml = simplexml_load_string($data); 

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost", "root", "")); //connect to server 
if (!$con) 
{ 
    die('Could not connect:' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
} 
$db = "ProjectDB"; 
((bool)mysqli_query( $con, "USE " . $db)) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); //select database

foreach ($xml-> event as $row) 
{ 
    $EventName = $row -> title; 
    $room = $row -> room; 
    $DateTime = $row -> start_date; 
    $description = strip_tags($row -> description); 
    $location_website = $row -> location_info -> location_website; 
    $building_no = $row -> location_info -> location_website; 
    $ContactPhone = $row -> contact_phone; 
    $ContactEmail = $row -> contact_email; 
    $EventCat = $row -> category; 
    $Location = $row -> location; 
     
    $building_no = preg_replace("/[^0-9]/","",$building_no); 
     
    if ($building_no > 10000) 
    { 
        $building_no = NULL; 
    } 
     
    // Fixes some issues with " ' " in the fields  
    $EventName = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $EventName) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $room = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $room) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $DateTime = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $DateTime) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $description = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $description) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $location_website = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $location_website) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $building_no = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $building_no) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $ContactPhone = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $ContactPhone) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $ContactEmail = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $ContactEmail) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $EventCat = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $EventCat) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $Location = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $Location) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
     
    $description = htmlspecialchars($description); 
     
     
    // performing sql query 
    $sql1 = "INSERT IGNORE INTO location (Name, Building)" 
            .    "VALUES('$Location', '$building_no')"; 

    $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $sql1); 
    if (!$result1) 
    { 
        die('Could not enter data: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
    } 

    $sql = "INSERT INTO Event (EventName, EventCat, DateTime, description, ContactPhone, ContactEmail, Admin_AdminID, Location_Name, Visibility, Link)" 
            .  "VALUES ('$EventName','$EventCat','$DateTime','$description', '$ContactPhone', '$ContactEmail', '1', '$Location', 'Public', '$location_website')"; 

    $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql); 

    if (!$result) 
    { 
        die('Could not enter data: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
    } 
} 
?> 

<?php 

$url = "http://gatortimes.ufl.edu/events/feed/"; 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url); //get the url contents 

$data = curl_exec ($ch);  //execute curl request 
curl_close($ch); 

$xml = simplexml_load_string($data); 

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost", "root", "")); //connect to server 
if (!$con) 
{ 
    die('Could not connect:' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
} 
$db = "ProjectDB"; 
((bool)mysqli_query( $con, "USE " . $db)) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); //select database

foreach ($xml-> channel -> item as $row) 
{ 
    $EventName = $row -> title; 
    $DateTime = $row -> pubDate; 
    $description = strip_tags($row -> description); 
    $EventCat = $row -> category; 

     
     
     
    // Fixes some issues with " ' " in the fields  
    $EventName = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $EventName) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $DateTime = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $DateTime) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $description = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $description) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $EventCat = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $EventCat) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
     
     
    $description = htmlspecialchars($description); 
     
     
    // performing sql query 
     
    $sql = "INSERT INTO Event (EventName, EventCat, DateTime, description, Admin_AdminID, Location_Name, Visibility)" 
            .  "VALUES ('$EventName','$EventCat','$DateTime','$description', 4, 'University of Florida', 'Public')"; 

    $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql); 

    if (!$result) 
    { 
        die('Could not enter data: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
    } 
} 
?> 
<h2>XML populate completed!</h2> 
<p>Click <a href="events.php">here</a> to see the new events.</p>