<?php
  /*
    file_name:    index_dev.php

    Description:  Landing page that displays the list of websites you curently have under development
    
    Authors:      Martin Rose/JB
    Copyright:    Copyright (c) 2013 
    Webaddress:   http://www.example.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    Revision:     None
  */  

	
  $lh_port = $_SERVER["HTTP_HOST"];
		
  if(file_exists('./common/con_localhost.php')){
  
  require_once('./common/con_localhost.php');
      			   
	$link = local_db_connect();
  
  # Get all the directories that have wordpress_******
    $dirs = array_filter(glob('../wordpress_*'), 'is_dir');
    
    echo '<h3>Installed Websites</h3>';
    
    foreach($dirs as $value){

      $value = substr($value, 3);

            $site = substr($value, 10);           
    
            $getValues = 'SELECT * FROM wordpress_' . $site . '.wp_options WHERE option_name = "template"'; 
          
            $getValue = mysqli_query($link,$getValues); 
        
            if(!$getValue){ 
            
              echo '<h3>Error</h3>';
                          
              die('Website: "' . $site . '" Installation was not finished. Click <a href="http://' . $lh_port . '/' . $value . '/wp-admin/index.php" target="_blank" onclick="resetDiv()">Here</a> to finish it');                     
            }          
          
              $valuePic = mysqli_fetch_array($getValue);          
                         
        echo '<div id ="dev_1">';  
          echo '<br/><img border="0" src="../wordpress_' . $site . '/wp-content/themes/' . $valuePic['option_value'] . '/screenshot.png" alt="' . $valuePic['option_value'] . '" width="152" height="114">';
            echo '<div id="dev_2">Based on the "' . $valuePic['option_value'] . '" theme<br/>';
              echo 'Launch website: <a href="http://' . $lh_port . '/' . $value . '/wp-admin/index.php" target="_blank">' . $site . '</a><br/>';
              
              # Check to see if the directory exist. If it does hide the button
                $path = '../wordpress_' . $site . '/wp-content/themes/' . $valuePic['option_value'] . '-child/';                
                
                if (!file_exists($path)) {
                  	echo 'To create a child directory for this theme click <button onclick="setChild(\'' . $site . '\', \'' . $valuePic['option_value'] . '\')">here</button>';
                }	else	{
                  	/* echo 'To delete the current child directory for this theme click here. Maybe<br/>'; */
                }
                        
            echo '</div>';
       echo '</div>';   
    }    
  
  
  } else {
  
  	echo '<div id="sitename">';
  
  	echo '<h3>Warning</h3>';
  
  	echo 'You need to click on the Admin tab and select Installation Settings';
  
  	echo '</div>';
  
  }

  # Close db connection
    mysqli_close($link);
?>