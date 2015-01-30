<?php

function checkUpload(){
	if (isset($_FILES['upload'])){
		$allowed = array ('text/plain');
		if(in_array($_FILES['upload']['type'], $allowed)){
			print "Uploading the review...";
			// Let's move the file to a new location...
			if(move_uploaded_file($_FILES['upload']['tmp_name'], "reviews/{$_FILES['upload']['name']}")){
				echo "<p>The review has been successfully uploaded.</p>";
				$review = "{$_FILES['upload']['name']}";
				print "$review";
			}
		} else {
			//Invalid type...
			echo '<p>Please upload a .txt file.</p>';
		}
	}

	if ($_FILES['upload']['error'] > 0) {
		echo '<p>File could not be uploaded because: <strong>';

		switch ($_FILES['upload']['error']){
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini.';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
				break;
			case 3:
				print 'The file was only partially uploaded.';
				break;
			case 4:
				print 'No file was uploaded.';
				break;
			case 6:
				print 'No temporary folder was available.';
				break;
			case 7:
				print 'Unable to write to the disk.';
				break;
			case 8:
				print 'File upload was stopped.';
				break;
			default:
				print 'A system error occurred.';
				break;				
		} //end switch IF
		
		print '</strong></p>';
	} //end error IF

	// Delete file if it still exists:
	if (file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])){
		print "File exists.";
		unlink ($_FILES['upload']['tmp_name']);
	}

	return $review;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload a review</title>
	<link type="text/css" rel="stylesheet" href="main.css"/>
	<?php include("db_connect.inc") ?>
</head>
<body style="background-color:#426352">
	<?php include("mainnavbar.php"); ?>
	<div id="mainpageintro">
		<h1 class="subtext">Submit a review to the database...</h1>
		<form id="upload_review" method="POST" enctype="multipart/form-data">
			<label for="review_txt">Review:</label>
				<input type="file" name="upload" size="50">
				<br><small>Must be .txt file</small><br>
			<input type="submit" name="submit" value="Submit">
		</form>
	</div>
</body>
</html>