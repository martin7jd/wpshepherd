<?php 
    
  # This page

	$lh_port = $_SERVER["HTTP_HOST"];
	

	
    $filename = './common/con_localhost.php'; 

    if (file_exists($filename)) {
      echo 'Click Re-set Settings if you want to input your credentials again and then come back and see me';
    } else {
      echo 'MySql Host Address: <input id="host" disabled="disabled" type="text" name="host" value="'  . $lh_port . '"><br>';
      echo 'MySql User Name: <input id="user" type="text" name="user"><br>';
      echo 'MySql Password: <input id="pass" type="text" name="pass"><br>';
      echo '<button type="button" onclick="admin_one()">Add Data!</button>'; 

    }    
?>