<?php include("connect.php"); 
    /* Table I created to test this 
    CREATE TABLE User ( 
        id int(11) AUTO_INCREMENT, 
        login varchar(60) NOT NULL, 
        password varchar(60) NOT NULL, 
        PRIMARY KEY (id), 
        UNIQUE (login) 
    );*/ 

    // Username and password sent from form. 
    $myusername = $_POST['myusername'];  
    $mypassword = $_POST['mypassword'];  

    // To protect against MySQL injection. 
    $myusername = stripslashes($myusername); 
    $mypassword = stripslashes($mypassword); 
    $myusername = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $myusername) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
    $mypassword = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $mypassword) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 

    $sql = "SELECT * FROM $tbl_name WHERE Username='$myusername' and password='$mypassword'"; 
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql); 
    $count = mysqli_num_rows($result); // mysql_numrows counts the table row. 
    if ($count >= 1) // If the result matched $myusername and $mypassword, the table row match. (can be ==) 
    { 
        // Register $myusername and $mypassword and redirect to file "loginsuccess.php". 
        session_start(); 
        $_SESSION['myusername'] = $myusername; 
        $_SESSION['mypassword'] = $mypassword; 
        $_SESSION['loggedin'] = true; 
        header("location:loginsuccess.php"); 
    } 
    else 
    { 
        echo "Wrong username or password. "; ?><a href="index.php" />Try again</a><?php 
    } 
// Note: Don't use closing php tags in php-only pages; this renders no html