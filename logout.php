<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="refresh" content="1;url=index.php"> <!-- Not as sure a redirect as using the javascript below, but just in case -->
    <script type="text/javascript">
            window.location.href = "index.php"
        </script>
	<title>Logout</title>
</head>
<body>
	<?php
        // Initialize session
        session_start(); // Call to have access to session variables

        // Delete certain session
        unset($_SESSION['myusername']);
        
        // Delete all session variables
        session_destroy();
    ?>
    <h1>You have been logged out.</h1> If you are not redirected automatically, follow <a href="index.php" />this link</a> to go back to the homepage.
</body>
</html>

