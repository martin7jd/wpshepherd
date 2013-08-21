<?php

  # Copy the wpadmin_localhost folder to some where safe on the server
  
  # Need to create the back-up directory
  
  
    function recurse_copy($src,$dst) { 
      $dir = opendir($src); 
        @mkdir($dst); 
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' ) && ( $file != '.git' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                }else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
  
     return true;
  }
  
  $src = '../wpadmin_localhost/';
  $dst = '../back-up/wpadmin_localhost/'; 
  
  if(recurse_copy($src,$dst)){
  
     echo 'Back-up done for this website';
  }  
?>