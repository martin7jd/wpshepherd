<?php
  /*
    file_name:    index_main.php

    Description:  Landing page for this website
    
    Authors:      Martin Rose/JB
    Copyright:    Copyright (c) 2013 
    Webaddress:   http://www.example.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    Revision:     0.1
    Comments:     2013-08-01 Add the global variable to display the host in the git tab (Temp)
                  2013-08-01 Added links to left menu
                  2013-08-14 Updated the text and added ccs to centre the site add the logo position and style the fonts
  */  
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>WP Shepherd</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="jscript/wpadmin.js" type="text/javascript"></script>    
    <link rel="stylesheet" href="css/wpadmin.css" />
        
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>
  </head>
  <body>
	<table width="100%">
		<tr>
			<td style="background-color:lightgrey">
				<IMG class="displayed" src="./images/logo.png" alt="WP Shepherd" >
			</td>
		</tr>
	</table>			  
    <div id="tabs">
      <ul>
        <li>
          <a href="#tabs-1">Home</a>
        </li>
        <li>
          <a href="#tabs-2" id="websites" onclick="splash(this.id)">Websites</a>
        </li>
        <li>
          <a href="#tabs-3" id="admin" onclick="splash(this.id)">Admin</a>
        </li>
        <li>
          <a href="#tabs-4">Contact</a>
        </li>
        <li>
          <a href="#tabs-5">About</a>
        </li>
      </ul>
      <div id="tabs-1">
        <div id="left-box">                
        </div>
        <div id="content_1"> 
<?php 
          $lh_port = $_SERVER["HTTP_HOST"];
          echo '<h3>WP Shepherd</h3>';                                  
          echo 'WP Shepherd allows a user to install, develop and manage multiple Wordpress installations using "' . $lh_port . '"<br/>';                                             
          echo 'The assumption here is that you have "xampp", "wamp" or "mamp" already installed and running<br/>';
          echo 'To started here is a bit of a check list<br/>';
          echo '1. Make sure browser pop-ups are enabled for "' . $lh_port . '"<br/>';   
          echo '2. A one time set-up is required (honest guv): Go to Admin tab and click on Installation Settings. The port you are using, ' . $lh_port . ' is auto completed, complete the other two fields<br/>';
          echo '3. Remember the user name and password used here is <b>NOT</b> secure, so keep that in mind during this set-up<br/>';                           
          echo '4. With the Admin bit done it\'s time to play.<br/>'; 
          echo '5. To install a fresh copy of Wordpress click the "Websites" tab click "New Set-up", then follow the onscreen instructions<br/>'; 
          echo 'If you have any feedback or comments please use the email link in the "Contacts" tab<br/>';                          
?>        
        </div>                                 
      </div>
      <div id="tabs-2">
        <div class="menu_div" id="left-box">
          <ul>
            <li>
              <a href="#" id="inst" onclick="page(this.id)">New Set-up<div id="i"></div></a><!--index_inst.php-->              
            </li>
            <li>
              <a href="#" id="dev" onclick="page(this.id)">Develop<div id="d"></div></a><!-- List of all the current installed websites-->
            </li>
            <li>
              <a href="#" id="bac" onclick="page(this.id)">Back-up<div id="b"></div></a>
            </li>
            <li>
              <a href="#" id="rem" onclick="page(this.id)">Remove<div id="r"></div></a><!--index_rem.php-->
            </li>        
          </ul>        
        </div>
        <div id="content_2">
        </div>
     </div>
      <div id="tabs-3">
        <div class="menu_div"  id="left-box">
          <ul>
           <li>
              <a href="#" id="admin_set" onclick="page(this.id)">Installation Settings<div id="a_s"></div></a><!--index_admin_set.php-->              
            </li> 
            <li>
              <a href="#" id="admin_res" onclick="page(this.id)">Re-set Settings<div id="a_r"></div></a><!--index_admin_res.php-->              
            </li>
            <li>
              <a href="#" id="admin_dis" onclick="page(this.id)">Display Settings<div id="a_d"></div></a><!--index_admin_dis.php-->              
            </li>            
            <li>
              <a href="#" id="admin_bac" onclick="page(this.id)">Back-up this code<div id="a_b"></div></a><!--index_admin_bac.php-->              
            </li>                         
          </ul>        
        </div>
        <div id="content_3">
        </div>                         
      </div>
      <div id="tabs-4">
        <div class="menu_div"  id="left-box">
        </div>
        <div id="content_4">
        
    	<div id="sitename">     
        
        
        <h3>How to get in touch for requests, bugs and comments</h3>
        
			<p>Email <a href="mailto:bncoders@yahoo.co.uk?Subject=Hello%20again" target="_top">BNCoders</p>			
		
		</div>               
        </div>                                                  
      </div>
      <div id="tabs-5">
        <div class="menu_div"  id="left-box">
        <div id="content_7">
        <h3>All about the BNCoders</h3>
        <p>Formed in 2013</p>        
        </div>                                 
        </div>                 
      </div>            
    </div>
    <div id="cr">
      BNCoders
    </div>
    
  </body>
</html>