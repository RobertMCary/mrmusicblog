<?php
// Begin the session
session_start();

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logged out</title>
    <link type="text/css" rel="stylesheet" href="main.css"/>
</head>
<body style="background-color:#426352">
    <div id="mainpageintro">
        <h1>You are now logged out. Come again!</h1>
    </div>
    <?php include("mainnavbar.php"); ?>
</body>
</html>