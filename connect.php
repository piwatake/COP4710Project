<?php 
$host="piwatake-cop4710project-1757295"; // Host name. 
$db_name="ProjectDB"; // Database name. 
$tbl_name="User"; // Table name. 
$username="piwatake"; // MySQL username. 
$password=""; // MySQL password. 
$port = 3306;

// Connect to server and select database. 

$connection = ($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost',  $username,  null, $db_name, 3306)) or die("Cannot connect to database!");  
//"$localhost",  "$dbusername",  "$dbpass", "$db", "3306"))
//$select_db = ((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . $db_name)) or die("Cannot select database!");



function db_result($result,$row,$field) { 
  if($result->num_rows==0) return 'unknown'; 
  $result->data_seek($row);
  $ceva=$result->fetch_assoc(); 
  $rasp=$ceva[$field]; 
  return $rasp; 
}