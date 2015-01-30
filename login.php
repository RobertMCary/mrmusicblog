<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link type="text/css" rel="stylesheet" href="main.css"/>
	</head>
<body style="background-color:#426352">
	<? include("mainnavbar.php"); ?>
	<div id="mainpageintro">
<?php if( !isset( $_SESSION['mb_user_id'] ) ): ?>
<h2>Login Here</h2>
<form action="login_submit.php" method="post">
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
<input type="submit" value="Login" />
</p>
</fieldset>
</form>
<?php else: ?>
<h2>Logout Here</h2>
<p><a href="logout.php">Log Out Link</p>
<?php endif; ?>
	</div>
</body>
</html>