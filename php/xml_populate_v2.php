<?php

$url = "http://events.ucf.edu/feed.xml";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url); //get the url contents

$data = curl_exec ($ch);  //execute curl request
curl_close($ch);

$xml = simplexml_load_string($data);

$con = mysql_connect("localhost","root",""); //connect to server
if (!$con)
{
	die('Could not connect:' . mysql_error());
}
$db = "ProjectDB";
mysql_select_db($db, $con) or die(mysql_error()); //select database

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
	$EventName = mysql_real_escape_string($EventName);
	$room = mysql_real_escape_string($room);
	$DateTime = mysql_real_escape_string($DateTime);
	$description = mysql_real_escape_string($description);
	$location_website = mysql_real_escape_string($location_website);
	$building_no = mysql_real_escape_string($building_no);
	$ContactPhone = mysql_real_escape_string($ContactPhone);
	$ContactEmail = mysql_real_escape_string($ContactEmail);
	$EventCat = mysql_real_escape_string($EventCat);
	$Location = mysql_real_escape_string($Location);
	
	$description = htmlspecialchars($description);
    
    
    // performing sql query
    $sql1 = "INSERT IGNORE INTO location (Name, Building)"
            .	"VALUES('$Location', '$building_no')";

    $result1 = mysql_query($sql1);
    if (!$result1)
    {
        die('Could not enter data: ' . mysql_error());
    }

    $sql = "INSERT INTO Event (EventName, EventCat, DateTime, description, ContactPhone, ContactEmail, Admin_AdminID, Location_Name, Visibility, Link)"
            .  "VALUES ('$EventName','$EventCat','$DateTime','$description', '$ContactPhone', '$ContactEmail', '1', '$Location', 'Public', '$location_website')";

    $result = mysql_query($sql);

    if (!$result)
    {
        die('Could not enter data: ' . mysql_error());
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

$con = mysql_connect("localhost","root",""); //connect to server
if (!$con)
{
	die('Could not connect:' . mysql_error());
}
$db = "ProjectDB";
mysql_select_db($db, $con) or die(mysql_error()); //select database

foreach ($xml-> channel -> item as $row)
{
	$EventName = $row -> title;
	$DateTime = $row -> pubDate;
	$description = strip_tags($row -> description);
	$EventCat = $row -> category;

	
	
	
	// Fixes some issues with " ' " in the fields 
	$EventName = mysql_real_escape_string($EventName);
	$DateTime = mysql_real_escape_string($DateTime);
	$description = mysql_real_escape_string($description);
	$EventCat = mysql_real_escape_string($EventCat);
	
	
	$description = htmlspecialchars($description);
    
    
    // performing sql query
	
    $sql = "INSERT INTO Event (EventName, EventCat, DateTime, description, Admin_AdminID, Location_Name, Visibility)"
            .  "VALUES ('$EventName','$EventCat','$DateTime','$description', 4, 'University of Florida', 'Public')";

    $result = mysql_query($sql);

    if (!$result)
    {
        die('Could not enter data: ' . mysql_error());
    }
}
?>
<h2>XML populate completed!</h2>
<p>Click <a href="events.php">here</a> to see the new events.</p>