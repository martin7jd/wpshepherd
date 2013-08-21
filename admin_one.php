<?php 
    
  # This page

	$lh_port = $_SERVER["HTTP_HOST"];
	

	
    $filename = './common/con_localhost.php';
    
    echo '<div id="sitename">';     

    if (file_exists($filename)) {
    
      echo '<h3>Warning</h3>';
      echo 'Click Re-set Settings if you want to input your credentials again, then come back and see me';
    } else {
      echo '<h3>Configuration</h3>';    
      echo 'MySql <input id="host" disabled="disabled" type="text" name="host" value="'  . $lh_port . '"><br/>';
      
      if($lh_port == 'localhost:8888'){
      	echo 'MySql <input id="user" type="text" name="user" placeholder="MAPP User=root" required><br/>';
      	echo 'MySql <input id="pass" type="text" name="pass" placeholder="MAMP Password=root" required><br/><br/>';            
      }	else	{
      	echo 'MySql <input id="user" type="text" name="user" placeholder="User Name" required><br/>';
      	echo 'MySql <input id="pass" type="text" name="pass" placeholder="Password" required><br/><br/>';     
      }
      
      echo '<button type="button" onclick="admin_one()">Add Data!</button>';  

    }    
echo '</div>';

?>