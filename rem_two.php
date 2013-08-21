<?php
	$delWeb = $_POST['web'];
	
    echo '<div id="sitename">';     
	

	echo '<h3>Website "' . substr($delWeb, 10) . '" is being deleted</h3>';

	# Check to see if there is a directory call wordpress_****** and delete it
	if (file_exists('../' . $delWeb)) {
		echo 'The directory ' . $delWeb . ' exists';
		function rrmdir($dir) {
			if (is_dir($dir)) {
				$objects = scandir($dir);
				foreach ($objects as $object) {
					if ($object != "." && $object != "..") {
						if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
						}
					}
				reset($objects);
				rmdir($dir);
			}
		}
				rrmdir('../' . $delWeb);
				
		echo '<p>Directory and files for ' . $delWeb . ' deleted &#10004</p>';				
	# Drop the database
	  $link = mysqli_connect("localhost","root","root");
	# Check connection
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	# Drop database W3schools.com
		$sql='DROP DATABASE ' . $delWeb;
		if (mysqli_query($link,$sql)){
			echo '<p>Database ' . $delWeb . ' deleted successfully &#10004</p>';
		}else  {
			echo "<br/>Error deleting database: " . mysqli_error($link);
		}
		}else  {
			echo "The directory $delWeb does not exist<br/>";
		}

		echo '</div>';
?>