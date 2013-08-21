<?php
  /*
    file_name:    rem_one.php

    Description:  Confirmation page that you wish to delete the Wordpress installation
    
    Authors:      Martin Rose/JB
    Copyright:    Copyright (c) 2013 
    Webaddress:   http://www.example.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    Revision:     None
  */  

   $delWeb = $_POST['web'];
   
   echo '<div id="sitename">';
         
   echo '<h3>Warning</h3>';
           
   echo 'You are about to delete the website "' . substr($delWeb,10) . '"';

   echo '<br/><br/><button type="button" onclick="rem_confirm(\'' . $delWeb . '\')">Continue?</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="rem_deny()">Cancel!</button>';

   echo '</div>';

?>