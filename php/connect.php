<?php
$host="localhost"; // Host name.
$db_name="ProjectDB"; // Database name.
$tbl_name="User"; // Table name.
$username="root"; // MySQL username.
$password=""; // MySQL password.

// Connect to server and select database.
$connection = mysql_connect("$host", "$username", "$password") or die("Cannot connect to database!"); 
$select_db = mysql_select_db("$db_name") or die("Cannot select database!");