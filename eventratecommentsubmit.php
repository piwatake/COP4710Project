<?php session_start(); // call to have access to session variables 
    require 'connect.php'; 
    // If the values are posted, then insert them into the database 
    if (isset($_POST['comment'])) 
    { 
        $comment = $_POST['comment']; 
        $rate = $_POST['rate']; 
        $event = $_POST['event']; 
        $rso = $_POST['rso']; 
        $username = $_SESSION['myusername']; 
         
        //echo $event; 
         
         

        $sqleventID = "SELECT EventID FROM Event WHERE EventName = '$event'"; 
        $sqleventIDres = mysqli_query($GLOBALS["___mysqli_ston"], $sqleventID); 
        $sqlNum2 = mysqli_num_rows($sqleventIDres); 
                        $count2 = 0; 
                         
                        while ($count2 < $sqlNum2) 
                        { 
                            $eID = db_result($sqleventIDres, $count2, "EventID"); 
                             
                            //echo '<option value = "$name">' . $name . '</option></br />'; 
                            $count2++; 
                        } 
         
         
                             
        $sqlcurrusrID = "SELECT StudentID FROM Student as s, User as u WHERE s.User_UserID = u.userID AND u.Username = '$username'";  
        $sqlcurrusrIDres = mysqli_query($GLOBALS["___mysqli_ston"], $sqlcurrusrID); 
        $sqlNum1 = mysqli_num_rows($sqlcurrusrIDres); 
                        $count1 = 0; 
                         
                        while ($count1 < $sqlNum1) 
                        { 
                            $uID = db_result($sqlcurrusrIDres, $count1, "StudentID"); 
                             
                            //echo '<option value = "$name">' . $name . '</option></br />'; 
                            $count1++; 
                        } 
         

            //echo "submitting query ". $comment ." ". $rate ." event: " .$eID ." rso: ". $rso ." ". $username. " ". $uID."   \n"; 
         
        $query1 = "INSERT INTO Comment (commentcontent, Student_StudentID, Event_EventID)  
        VALUES ('$comment', '$uID', '$eID')"; 
        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1); 
        if ($result1) 
        { 
            $msg1 = "Comment submitted successfully!"; 
        } 
        else 
        { 
            die('Could not enter data: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
        } 
         
        $query2 = "INSERT INTO Rating (Rating, Event_EventID)  
        VALUES ('$rate', '$eID')"; 
        $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2); 
        if ($result1) 
        { 
            $msg2 = "Rating submitted successfully!"; 
        } 
        else 
        { 
            die('Could not enter data: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
        } 
         
         
    }  else { 
        echo "didn't reach it"; 
    } 
     
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Event Registered</title> 
</head> 
<body> 
    <h1>Comment and rating submitted!</h1> 
    <p> 
        Thanks, <?php echo $_SESSION['myusername']; ?>! You may now see your <a class="btn" href="events.php" />comment</a>. 
    </p> 
</body> 
</html> 