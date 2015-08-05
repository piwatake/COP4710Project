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
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);

    $sql = "SELECT * FROM $tbl_name WHERE Username='$myusername' and password='$mypassword'";
    $result = mysql_query($sql);
    $count = mysql_numrows($result); // mysql_numrows counts the table row.
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