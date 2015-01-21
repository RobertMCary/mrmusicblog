<?php
	/* Begin session */
	session_start();

	/* Set form token */
	$form_token = md5( uniqid('auth', true) );

	/* Set session form token */
	$_SESSION['form_token'] = $form_token;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Drunk At The Jazz Club</title>
	<link type="text/css" rel="stylesheet" href="main.css"/>
</head>
<body style="background-color:#426352">
	<div id="mainnavbar">
		<table>
			<thead></thead>
			<tbody>
				<tr class="mainnavbutton">
					<td><a href="index.php" class="mainnavbuttonlink">(home.)</a></td>
				</tr>
				<tr class="mainnavbutton">
					<td><a href="review.php" class="mainnavbuttonlink">(reviews.)</a></td>
				</tr>
				<tr class="mainnavbutton">
					<td>(database.)</td>
				</tr>
				<tr class="mainnavbutton">
					<td><a href="admin.php" class="mainnavbuttonlink">(admin.)</a></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div id="mainpageintro">
		<h1 class="subtext">Administrator panel.</h1>
		<h2>Add user</h2>
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
			<input type="submit" value="Submit" />
		</p>
		</fieldset>
		</form>
		<!--<p style="text-align:left">This area of the site allows an admin (and <em>only</em> an admin!) to add
			, edit, and delete various content on the site, the least of which is the reviews.</p>-->
	</div>
</body>
</html>