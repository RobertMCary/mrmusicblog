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
    <?php include("mainnavbar.php"); ?>
    <div id="mainpageintro">
        <h1>You are now logged out. Come again!</h1>
        <p> <?php echo $_SESSION['mb_user_id'] ?> </p>
    </div>
</body>
</html>