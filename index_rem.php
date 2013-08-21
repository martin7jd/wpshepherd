<?php
  /*
    file_name:    index_rem.php

    Description:  Landing page for removing Wordpress installations
    
    Authors:      Martin Rose/JB
    Copyright:    Copyright (c) 2013 
    Webaddress:   http://www.example.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    Revision:     None
  
  */  

  if(file_exists('rem_two.php')){

   	echo '<div id="sitename">';


  	echo '<h3>Delete Website</h3>';
  
  # List all the wordpress_****** in the directory
    $d = dir('../');
  
    $count = 0;

    while(false !== ($entry = $d->read())){
      if(($entry != '.') && ($entry != '..')){
      
        $wordPress_value = substr($entry, 0, 10); 
            
        if($wordPress_value === 'wordpress_'){
              echo '<a href="#" id="' . $entry . '" onclick="rem_one(this.id)">' . substr($entry, 10) . '</a><br/>';                
            
            # match found index by one
              $count++;
        
        }      
      }
    }  

	echo '</div>';

    if($count <= 0){
    
    echo '<div id="sitename">';     
    
		echo '<h3>Confirmation</h3>';
    
      echo 'No Instances of Wordpress Found';        
    
    echo '</div>';         	
    
    
    }

 }	else	{

    echo '<div id="sitename">';     

		echo '<h3>Warning</h3>';
 
    	echo 'You need to click on the Admin tab and select Installation Settings';
    	
    echo '</div>';         	
 
 }
?>