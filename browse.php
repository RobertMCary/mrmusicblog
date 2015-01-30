<!DOCTYPE html>
<html>
<head>
	<title>Drunk At The Jazz Club</title>
	<link type="text/css" rel="stylesheet" href="main.css"/>
	<?php include("db_connect.inc") ?>
</head>
<body style="background-color:#426352">
	<?php include("mainnavbar.php"); ?>
	<div style="">
		<table id="browse_table">
			<tr>
				<th>PRODUCER</th>
				<th>RECORD</th>
				<th>LABEL</th>
				<th>BLURB</th>
				<th>RELEASE DATE</th>
			</tr>
			<?
			$servername = "localhost";
			$username = "root";
			$password = "c1u2r3r4y";
			$dbname = "dbMusicBlog";
			// Create connection
			$conn1 = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn1->connect_error) {
    			die("Connection failed: " . $conn1->connect_error);
			} 

			$sql = "SELECT COUNT(*) FROM tblReviews";
			$num_rows = $conn1->query($sql);

			$sql = "SELECT recordProducer, recordTitle, recordLabel, reviewBlurb, recordReleaseDate FROM tblReviews";
			foreach($conn1->query($sql) as $row){
				echo "<tr><td>" . $row['recordProducer'] . "</td><td>" . $row['recordTitle'] . "</td><td>" . $row['recordLabel'] . "</td><td>" . $row['reviewBlurb'] . "</td><td>" . $row['recordReleaseDate'] . "</td></tr>";
			}
		?>
		</table>
	</div>
</body>
</html>