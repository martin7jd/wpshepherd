<?php 
  /*
    file_name:    inst_three.php

    Description:  Downloads zipfile, unzips to the download folder, and renames it to the wordpress project name
    
    Authors:      Martin Rose/JB
    Copyright:    Copyright (c) 2013 
    Webaddress:   http://www.example.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    Revision:     None
  */  

  
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
    
  # Get host info so that it can be writen to the install.phppage that is created below
    $getValues = 'SELECT * FROM wpadmin_localhost.localhost_info WHERE admin_host = "localhost"';
        
    $getValue = mysqli_query($link,$getValues) or die(mysql_error());    
        
    $value = mysqli_fetch_array($getValue);               


  # Need to see if I can get CURL progress working 

    $host = $value['admin_host'];
    $user = $value['admin_user'];
    $pass = $value['admin_password'];
  
  # Global information
    $web = $_POST['web'];   

  # Check to see if there is a directory call wordpress_****** and delete it
    if (file_exists('../wordpress_' . $web)) {
        echo "The directory wordpress_$web exists";
      
        function rrmdir($dir) {
          if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
              if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
                }
            }
        reset($objects);
        rmdir($dir);
      }
    }
      rrmdir('../wordpress_' . $web);        
        
    # Drop database W3schools.com
      $sql='DROP DATABASE wordpress_' . $web;
      if (mysqli_query($link,$sql)){
          echo '<br/>Database wordpress_' . $web . ' deleted successfully';
      }else  {
          echo "<br/>Error deleting database: " . mysqli_error($link);
      }
    
    }

    file_put_contents( 'progress.txt', '' );
 
    $targetFile = fopen( './downloads/latest.zip', 'w' );
 
    $ch = curl_init( 'http://wordpress.org/latest.zip' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_NOPROGRESS, false );
    curl_setopt( $ch, CURLOPT_PROGRESSFUNCTION, 'progressCallback' );
    curl_setopt( $ch, CURLOPT_FILE, $targetFile );
    curl_exec( $ch );
 
function progressCallback( $download_size, $downloaded_size, $upload_size, $uploaded_size ){
  static $previousProgress = 0;
    if ( $download_size == 0 ){
      $progress = 0;
    }else{
      $progress = round( $downloaded_size * 100 / $download_size );
      if ( $progress > $previousProgress){
           $previousProgress = $progress;
           $fp = fopen( 'progress.txt', 'r+b' );

			  # Div required for the dynamic loading of the download count
          echo '<div id="load"></div>';
          		   
        # This is for the jquery
          echo '<input id="projNum" value="0" type="hidden"/>';           
           $to_file = "Downloaded: $progress%";
           
           if($progress == '100'){
                $to_file = 'Downloaded the latest version Wordpress &#10004;<br/>';           
           }            
            fputs( $fp, $to_file );
            fclose( $fp );
      }
    }
} 
    sleep(4);
    
    $fp = fopen( 'progress.txt', 'a' );

    $to_file = 'Unzipping Wordpress File "Latest.zip"<br/>';
    fputs( $fp, $to_file );    
        
    $path = './downloads/latest.zip';

  # Unzip the latest.zip to the parent above
    $zip = new ZipArchive;
      if ($zip->open($path) === TRUE) {
        $zip->extractTo('./downloads');        
        $zip->close();        

        $to_file = 'Wordpress Unzip Complete &#10004;<br/>';
        fputs( $fp, $to_file );          
      } else {
        $to_file = 'Unzip Failed<br/>';
        fputs( $fp, $to_file );            
      
      }
 
   # Clean up by deleting the downloaded zip file
   # Commented out because of "Permissions denied error"
     //if ( file_exists($path)  ){
          //unlink($path);          
     //}
    
  # Rename wordpress to wordpress_web name
    rename('downloads/wordpress/','../wordpress_' . $web . '/');     
       
  # Create database W3schools.com
    $sql = 'CREATE DATABASE wordpress_' . $web;
    if (mysqli_query($link,$sql)){
        
        $to_file = 'Database wordpress_' . $web . ' created &#10004;<br/>';
        fputs( $fp, $to_file );            
        
    }else  {
        $to_file = 'Database wordpress_' . $web . ' already exists<br/>';
        fputs( $fp, $to_file );            
    }

  # Copy the install.php from wpshepherd to the newly downloaded wordpress_*****/wp-admin/
    $file = "../wpshepherd/install.php";    
    $newfile = "../wordpress_$web/wp-admin/install.php";

    if (!copy($file, $newfile)) {
        $to_file = 'failed to copy ' . $file . ' <br/>';
        fputs( $fp, $to_file );                
    
    }else{
        $to_file = 'Copying install.php to wordpress_' . $web . ' directory &#10004;<br/>';
        fputs( $fp, $to_file );            
    }
  
    
  # Create the wp-config.php file so that the install will work   
    $myFile = "../wordpress_$web/wp-config.php";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = "<?php\n";
    fwrite($fh, $stringData);


    $stringData = "/**
    * The base configurations of the WordPress.
    *
    * This file has the following configurations: MySQL settings, Table Prefix,
    * Secret Keys, WordPress Language, and ABSPATH. You can find more information
    * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
    * wp-config.php} Codex page. You can get the MySQL settings from your web host.
    *
    * This file is used by the wp-config.php creation script during the
    * installation. You don't have to use the web site, you can just copy this file
    * to \"wp-config.php\" and fill in the values.
    *
    * @package WordPress
    * 
    * This page is created by inst_three.php        
    */
    
    // ** MySQL settings - You can get this info from your web host ** //\n";
    fwrite($fh, $stringData);

    $stringData = "/** The name of the database for WordPress */\ndefine('DB_NAME', 'wordpress_$web');\n\n";
    fwrite($fh, $stringData);
    
    $stringData = "/** MySQL database username */\ndefine('DB_USER', '$user');\n\n";    
    fwrite($fh, $stringData);
    
    $stringData = "/** MySQL database password */\ndefine('DB_PASSWORD', '$pass');\n\n";    
    fwrite($fh, $stringData);

    $stringData = "/** MySQL hostname */\ndefine('DB_HOST', '$host');\n\n";    
    fwrite($fh, $stringData);

    $stringData = "/** Database Charset to use in creating database tables. */\ndefine('DB_CHARSET', 'utf8');\n\n";
    fwrite($fh, $stringData);

    $stringData = "/** The Database Collate type. Don't change this if in doubt. */\ndefine('DB_COLLATE', '');\n\n";
    fwrite($fh, $stringData);

    $stringData = "/**#@+
    * Authentication Unique Keys and Salts.
    *
    * Change these to different unique phrases!
    * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
    * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
    *
    * @since 2.6.0
    */\n";
    fwrite($fh, $stringData);

    $stringData = "define('AUTH_KEY',         'put your unique phrase here');\ndefine('SECURE_AUTH_KEY',  'put your unique phrase here');\ndefine('LOGGED_IN_KEY',    'put your unique phrase here');\ndefine('NONCE_KEY',        'put your unique phrase here');\ndefine('AUTH_SALT',        'put your unique phrase here');\ndefine('SECURE_AUTH_SALT', 'put your unique phrase here');\ndefine('LOGGED_IN_SALT',   'put your unique phrase here');\ndefine('NONCE_SALT',       'put your unique phrase here');\n";
    fwrite($fh, $stringData);

    $stringData = "/**#@-*/

    /**
    * WordPress Database Table prefix.
    *
    * You can have multiple installations in one database if you give each a unique
    * prefix. Only numbers, letters, and underscores please!
    */\n\n";
    fwrite($fh, $stringData);

    $stringData = "\$table_prefix  = 'wp_';\n\n";
    fwrite($fh, $stringData);
    
    $stringData = "/**
    * WordPress Localized Language, defaults to English.
    *
    * Change this to localize WordPress. A corresponding MO file for the chosen
    * language must be installed to wp-content/languages. For example, install
    * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
    * language support.
    */\n";    
    fwrite($fh, $stringData);
    
    $stringData = "define('WPLANG', '');\n\n";
    fwrite($fh, $stringData);
    
    $stringData = "/**
    * For developers: WordPress debugging mode.
    *
    * Change this to true to enable the display of notices during development.
    * It is strongly recommended that plugin and theme developers use WP_DEBUG
    * in their development environments.
    */\n";
    fwrite($fh, $stringData);
    
    $stringData = "define('WP_DEBUG', false);\n\n";
    fwrite($fh, $stringData);
    
    $stringData = "/* That's all, stop editing! Happy blogging. */\n\n/** Absolute path to the WordPress directory. */\n"; 
    fwrite($fh, $stringData);
    
    $stringData = "if ( !defined('ABSPATH') )\n\tdefine('ABSPATH', dirname(__FILE__) . '/');\n\n";
    fwrite($fh, $stringData);
    
    $stringData = "/** Sets up WordPress vars and included files. */\n";
    fwrite($fh, $stringData);
    
    $stringData = "require_once(ABSPATH . 'wp-settings.php');\n";        
    fwrite($fh, $stringData);
    
    $grtThan = '>';
    $stringData = "\n?$grtThan";
    fwrite($fh, $stringData);
    fclose($fh);

    $to_file = 'Creating the wp-config.php &#10004;<br/>';
    fputs( $fp, $to_file );                

    $to_file = 'WP Shepherd set-up complete. <br/>Now let\'s complete the Wordpress "Famous 5 minute installation"<br/>';
    fputs( $fp, $to_file );                
    sleep(4);
    
    fclose( $fp );/* Closes the process that writes to the screen*/
    

    mysqli_close($link);

?>