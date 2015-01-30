<?php

/*** begin the session ***/
session_start();

if(!isset($_SESSION['mb_user_id']))
{
    $message = 'You must be logged in to access this page.';
}
else
{
    try
    {
        /*** connect to database ***/
        /*** mysql hostname ***/
        $mysql_hostname = 'localhost';

        /*** mysql username ***/
        $mysql_username = 'root';

        /*** mysql password ***/
        $mysql_password = 'c1u2r3r4y';

        /*** database name ***/
        $mysql_dbname = 'dbMusicBlog_Auth';


        /*** select the users name from the database ***/
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("SELECT mb_username FROM tblUsers 
        WHERE mb_user_id = :mb_user_id");

        /*** bind the parameters ***/
        $stmt->bindParam(':mb_user_id', $_SESSION['mb_user_id'], PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $mb_username = $stmt->fetchColumn();

        /*** if we have no something is wrong ***/
        if($mb_username == false)
        {
            $message = 'Access Error';
        }
        else
        {
            $message = 'Welcome ' . $mb_username;
        }
    }
    catch (Exception $e)
    {
        /*** if we are here, something is wrong in the database ***/
        $message = 'We are unable to process your request. Please try again later!"';
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
	<?php include("mainnavbar.php"); ?>
    <div id="mainpageintro">
		<h1 class="subtext">Administrator panel</h1>
		<!--<p style="text-align:left">This area of the site allows an admin (and <em>only</em> an admin!) to add
			, edit, and delete various content on the site, the least of which is the reviews.</p>-->
		<?php echo $message; ?>

		<h2 style="text-align:center">Add new user</h2>
		<form action="admin_submit.php" method="post">
			<fieldset>
			<p>
				<label for="mb_username">Username</label>
				<input type="text" id="mb_username" name="mb_username" value="" maxlength="20" />
			</p>
			<p>
				<label for="mb_password">Password</label>
				<input type="text" id="mb_password" name="mb_password" value="" maxlength="20" />
			</p>
			<p>
				<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
				<input type="submit" value="Add user" />
			</p>
			</fieldset>
		</form>
	</div>
</body>
</html>