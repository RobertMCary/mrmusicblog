<?php

/* Begin session */
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['mb_user_id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['mb_username'], $_POST['mb_password']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['mb_username']) > 20 || strlen($_POST['mb_username']) < 4)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['mb_password']) > 20 || strlen($_POST['mb_password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['mb_username']) != true)
{
    /*** if there is no match ***/
    $message = "Username must be alpha numeric";
}
/*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['mb_password']) != true)
{
        /*** if there is no match ***/
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $mb_username = filter_var($_POST['mb_username'], FILTER_SANITIZE_STRING);
    $mb_password = filter_var($_POST['mb_password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $mb_password = sha1( $mb_password );
    
    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = 'c1u2r3r4y';

    /*** database name ***/
    $mysql_dbname = 'dbMusicBlog_Auth';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT mb_user_id, mb_username, mb_password FROM tblUsers 
                    WHERE mb_username = :mb_username AND mb_password = :mb_password");

        /*** bind the parameters ***/
        $stmt->bindParam(':mb_username', $mb_username, PDO::PARAM_STR);
        $stmt->bindParam(':mb_password', $mb_password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $mb_user_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($mb_user_id == false)
        {
                $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['mb_user_id'] = $mb_user_id;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Drunk At The Jazz Club</title>
    <link type="text/css" rel="stylesheet" href="main.css"/>
</head>
<body style="background-color:#426352">
    <div id="mainpageintro">
        <p><?php echo $message; ?></p>
    </div>
    <?php include("mainnavbar.php"); ?>
</body>
</html>