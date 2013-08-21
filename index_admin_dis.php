<?php 
  /*
    file_name:    index_admin_dis.php

    Description:  Gets the usr information from the db i.e. username and password and displays it.
    
    Authors:      Martin Rose/JB
    Copyright:    Copyright (c) 2013 
    Webaddress:   http://www.example.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    Revision:     None
  */  

    echo '<div id="sitename">';     


  if  (file_exists('rem_two.php')){
  
      echo '<h3>Admin Settings</h3>';  
    
      echo 'Reads the wpadmin_localhost.localhost_info table<br/>and displays the hostname, user name and a + sign to display the password';

  } else{
  
  	echo '<h3>Warning</h3>';
  
    echo 'You need to click on the Admin tab and select Installation Settings';
  }
  
  echo '</div>';

?>