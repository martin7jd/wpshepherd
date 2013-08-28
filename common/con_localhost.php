<?php
	function local_db_connect(){
		$link = mysqli_connect('localhost', 'root','root');
			if (!$link) {
				die('Could not connect: ' . mysqli_error());
		}
		$db_selected = mysqli_select_db($link, 'wpadmin_localhost');
			if (!$db_selected) {
				die ('Cannot use foo : ' . mysqli_error());
		}
	return ($link);
		}

?>