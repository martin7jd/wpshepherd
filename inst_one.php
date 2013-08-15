<?php 

  # Download wordpress latestzip to /htdocs/...
  # Link URL http://wordpress.org/latest.zip
  # 
  
  # Form to enter the website name that is to be used  
  
  # This page gathers the information together to install a version of wordpress
  # as a localhost copy.
  # Admin_main is set-up first so that the installation of each copy can take place.
  # It follows the "Famouse 5-Minute Install"   
  
    require_once('./common/con_localhost.php');
    
    $link = local_db_connect();
  
 
  # Global information
    $web = $_POST['web'];   

  # Check to see if there is a directory call wordpress_****** and ask if it wants to be deleted
    if (file_exists('../wordpress_' . $web)) {
  
        echo '<div>';
            echo 'The directory wordpress_' . $web . ' exists<br/>';
        echo '</div>';
    }
			  
  # Delete the progress.txt file
    if(file_exists('progress.txt')){
        unlink('progress.txt');           
    }
      
  # make foo the current db
    $db_selected = mysqli_select_db($link, $web);
    if ($db_selected) {    
      echo 'A database with that name already exists<br/>';
      echo 'By clicking on Continue it will delete the existing installation and do you a fresh install<br/>';    
    } else  {
    
      echo 'There are no current websites found with the name ' . $web;
    
    } 

   $lh_port = $_SERVER["HTTP_HOST"];  

  # Confirmation that they wish to proceed and overwrite the folder and database    
    echo '<br/><button type="button" onclick="inst_confirm();inst_cont(\'' . $web . '\', \'' . $lh_port . '\')">Continue?</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="inst_deny()">Cancel!</button>';    
 
  # Close db connection
    mysqli_close($link);  

?>