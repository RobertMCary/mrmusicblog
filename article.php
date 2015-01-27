<!DOCTYPE html>
<html>
<head>
	<title>Drunk At The Jazz Club</title>
	<link type="text/css" rel="stylesheet" href="main.css"/>
	<?php include("db_connect.inc") ?>
</head>
<body style="background-color:#426352">
	<div id="review_div">
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

			$sql = "SELECT reviewAuthor FROM tblReviews";
			$result = $conn1->query($sql);
			if ($result_->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo "<h1>" . $row["reviewAuthor"] . "</h1>";
				}
			} else {
				echo "0 results.";
			}
		?>
	</div>
<?php include("mainnavbar.php"); ?>
</body>
</html>