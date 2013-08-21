<?php
  /*
    file_name:    index_admin_res.php

    Description:  Resets the con_localhost.php so that the info can be re-entered
    
    Authors:      Martin Rose/JB
    Copyright:    Copyright (c) 2013 
    Webaddress:   http://www.example.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    Revision:     None
  */  

    if(file_exists('./common/con_localhost.php')){
      
      require_once('./common/con_localhost.php');    

	    $link = local_db_connect();

    # Copy reset_index_inst.php to index_inst.php
      $file = 'reset_index_inst.php';
      $newfile = 'index_inst.php';

      if (!copy($file, $newfile)) {
        echo "failed to copy $file...\n";
      } else  {
    
      # Delete rem_two.php
        if(file_exists('rem_two.php')){
          unlink('rem_two.php');      
        }     
      
      # Clear the entry in the database wpadmin_localhost.localhost_info
        $sql = "DROP TABLE localhost_info";
        mysqli_select_db($link,'wpadmin_localhost');
        $retval = mysqli_query( $link, $sql );
        if(! $retval ){
              /*die('No Table Found ');*/              
        }
          
    	  echo '<div id="sitename">';     

		  echo '<h3>Warning</h3>';
          
          echo 'Table deleted successfully<br/>';            
        
          echo 'Reset is done'; 
          
          echo '</div>';     
      
        if(file_exists('./common/con_localhost.php')){
            echo './common/con_localhost.php Found';
         
            unlink('./common/con_localhost.php');
                   
        } else  {
        
          echo './common/con_localhost.php Not found';
        }      
      }      
    
    mysqli_close($link);
  
  }else {

    echo '<div id="sitename">';     

	echo '<h3>Warning</h3>';
  
  	echo 'You need to click on the Admin tab and select Installation Settings';
	
  echo '</div>';
  }        
?>
