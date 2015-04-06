<?php

$url = "http://events.ucf.edu/this-week/feed.xml";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url); //get the url contents

$data = curl_exec ($ch);  //excute curl request
curl_close($ch);

$xml = simplexml_load_string($data);

echo'<pre>';
print_r($xml);

$con=mysql_connect("localhost","root",""); //connect to server

if(!$con){
	die('Could not connect:' . mysql_error());
}
mysql_select_db("test1", $con) or die(mysql_error()); //select database

foreach ($xml-> event as $row) {
	$title = $row -> title;
	$room = $row -> room;
	$start_date = $row -> start_date;
	
	//$room = 'NO ROOM';
	
	//print " $room   ";
	
// performing sql query

$sql = "INSERT INTO 'xml_table' ('title', 'room','start_date')"
		.  "VALUES ('$title','$room','$start_date')";

$result = mysql_query($sql);

if(!$result) {
	die('Could not enter data: ' . mysql_error());
	} else {
	echo 'SUCCESS ';
	}
					}

?>
