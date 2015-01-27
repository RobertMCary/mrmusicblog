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

			$sql = "SELECT recordProducer, recordTitle FROM tblReviews";
			foreach($conn1->query($sql) as $row){
				echo "<p class='review_title'>" . $row['recordProducer'] . " // " . $row['recordTitle'] . "</p>" . "<br/>";
			}
		?>
		<div id="review_text_div"><p style="text-indent: 1.5em">Lorem ipsum dolor sit amet, pro sapientem dissentiet ad, at quis conclusionemque eum. Ex erat dicat quo, usu clita hendrerit te. Ipsum dicit nam ne, viris verear recteque mei te. Lobortis erroribus mel ex, per ne ubique dissentias delicatissimi.

Nulla homero saperet sed ne, pri te falli omnes ocurreret. Nam atqui ubique tincidunt et, an brute sadipscing duo, sea sint tation nostro id. An vitae petentium mel. Cu hendrerit democritum mea.

Eum erant feugiat volumus ex. Id duo legimus postulant principes, dolore qualisque ne usu. Te pri fugit officiis recteque, ei sit mucius tincidunt. Vitae reprehendunt te nam, at prima vitae nonumes eos. Ei vim graeci torquatos voluptaria, veritus alienum eam no, in vel facer semper. Sed ex mutat minimum theophrastus, velit quodsi deterruisset vel et. Sea offendit delectus et, graece labore delenit vix eu.

Impedit delicatissimi ei vel, eu ancillae similique maiestatis pri. Ei eum dolorem pertinacia. Duo affert nonumy suavitate in, duo ad summo tractatos laboramus, an sale eleifend volutpat qui. Virtute equidem ex sit, nostrum nominavi vim ne, odio vero aeterno quo ea.

Et iudico repudiare mel, in per oratio electram imperdiet, pericula incorrupte sit ea. Cu duo elitr fabulas suscipiantur, ex tantas fierent vituperata mel. An duo porro salutandi deterruisset. Pri modo putent vulputate ea, cum ei fabellas dignissim interesset. Nonumes consetetur pri et.</p>
		</div>
		<div id="review_info_div">
			<?
				$sql = "SELECT recordLabel,  recordReleaseDate FROM tblReviews";
				foreach($conn1->query($sql) as $row){
					echo "<h3>Label: " . $row['recordLabel'] . "</h3><br/>";
					echo "<h4>Released on: " . $row['recordReleaseDate'] . "</h4>";
				}
			?>
		</div>
	</div>
<?php include("mainnavbar.php"); ?>
</body>
</html>