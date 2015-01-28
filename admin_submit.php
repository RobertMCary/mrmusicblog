<?php
/* Begin session */
session_start();

/* Check that both the username, password and form token have been sent */
if(!isset( $_POST['mb_username'], $_POST['mb_password'], $_POST['form_token']))
{
    $message = 'Please enter a valid username and password';
}
/* Check form token validity */
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid form submission';
}
/* Check the username for correct length */
elseif (strlen( $_POST['mb_username']) > 20 || strlen($_POST['mb_username']) < 4)
{
    $message = 'Incorrect length for username';
}
/* Check the password for correct length */
elseif (strlen( $_POST['mb_password']) > 20 || strlen($_POST['mb_password']) < 4)
{
    $message = 'Incorrect length for password';
}
/* Check that the username has only alphanumeric characters */
elseif (ctype_alnum($_POST['mb_username']) != true)
{
    /* if there is no match... */
    $message = "Username must be alpha numeric";
}
/* Check the password has only alpha numeric characters */
elseif (ctype_alnum($_POST['mb_password']) != true)
{
        /* if there is no match... */
        $message = "Password must be alpha numeric";
}
else
{
    /* At this point, data must be valid, and we can insert into the database */
    $mb_username = filter_var($_POST['mb_username'], FILTER_SANITIZE_STRING);
    $mb_password = filter_var($_POST['mb_password'], FILTER_SANITIZE_STRING);

    /* Encrypt the password */
    $mb_password = sha1( $mb_password );
    
    /* Connect to db*/
    $mysql_hostname = 'localhost';

    $mysql_username = 'root';

    $mysql_password = 'c1u2r3r4y';

    $mysql_dbname = 'dbMusicBlog_Auth';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /* $message = a message saying we have connected */

        /* Set error mode to exceptions */
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* Prepare insert */
        $stmt = $dbh->prepare("INSERT INTO tblUsers (mb_username, mb_password ) VALUES (:mb_username, :mb_password )");

        /* Bind parameters */
        $stmt->bindParam(':mb_username', $mb_username, PDO::PARAM_STR);
        $stmt->bindParam(':mb_password', $mb_password, PDO::PARAM_STR, 40);

        /* Execute statement */
        $stmt->execute();

        /* Unset the form token session variable */
        unset( $_SESSION['form_token'] );

        /* If all is done, say thanks */
        $message = 'New user added';
    }
    catch(Exception $e)
    {
        /* Check if the username already exists */
        if( $e->getCode() == 23000)
        {
            $message = 'Username already exists';
        }
        else
        {
            /* If we are here, something has gone wrong with the database */
            $message = 'We are unable to process your request. Please try again later"';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<p><?php echo $message; ?></p>
</body>
</html>