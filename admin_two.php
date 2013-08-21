<?php
 
  # Global information
    $host = $_POST['host'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $host = 'localhost';
    
    echo '<h3>DB Table</h3>';
    
  # Path to php file
    $myFile = "temp_index_inst.php";

  # Open the file so the text can be added    
    $fh = fopen($myFile, 'w') or die("can't open file");
    
  # Opening PHP declaration
    $stringData = "<?php\n\n";    
    fwrite($fh, $stringData);    
    
  # First text string the verbage at the top of the page    
    $stringData = "# This page is created when the user adds the MySql user name and password 
  # Add the values to id=\"user\" and id=\"pass\".

  # Form to enter the website name that is to be used  
  
  # This page gathers the information together to install a version of wordpress
  # as a localhost copy.
  # Admin_main is set-up first so that the installation of each copy can take place.
  # It follows the \"Famous 5-Minute Install\"
  
  # See if there are any credentials in the wpadmin_localhost.localhost_info .
  # If not direct the user to the \"Admin\" tab and the \"Installation settings\" link\n\n\n";

  # Write the verbage  
    fwrite($fh, $stringData);
    
    $stringData = "\techo '<div id=\"sitename\">';";
    
    fwrite($fh, $stringData);    
    
    $stringData = "  # When the \"Submit\" button is press it launches install_one.php\n\n";
    
    fwrite($fh, $stringData);
    
    $stringData = "\techo '<h3>Web Site Name<h3/>';\n\n";    
        
    fwrite($fh, $stringData);
    
    $stringData = "\techo '<input id=\"web\" type=\"text\" name=\"web\" placeholder=\"Type Name Here\" required><br/><br/>';\n\n\n";
    
    fwrite($fh, $stringData);
    
    $stringData = "\techo '<button type=\"button\" onclick=\"inst_one()\">Fresh Install!</button>';\n\n";
    
    fwrite($fh, $stringData);                           
        
    $stringData = "\techo '</div>';";
    
    fwrite($fh, $stringData);    
    
    
    $grtThan = '>';

    $stringData = "\n\n?$grtThan";

    fwrite($fh, $stringData);
      
  # Close the php file
    fclose($fh);

  # Copy the file over the original
    $file = 'temp_index_inst.php';
    $newfile = 'index_inst.php';

    if (!copy($file, $newfile)) {
        echo "failed to copy $file...\n";
    }    


  # Create the rem_two.php file so that we can drop website tables    
    $newline = "';\n";
    $newlineonly = "\n";    
    $dbnewline = "';\n\n";
    $dobnewline = ";\n\n";    
    $tag = "\t";
    
    $myFile = "rem_two.php";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = "<?php\n";
    fwrite($fh, $stringData);

    $stringData = $tag . '$delWeb = $_POST[\'web\']' . $dobnewline;        
    fwrite($fh, $stringData);

    $stringData = $tag . 'echo \'Website \' . substr($delWeb, 10) . \' is being deleted<br/>' . $dbnewline;
    fwrite($fh, $stringData);

    $stringData = '# Check to see if there is a directory call wordpress_****** and delete it' .$newlineonly . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag  . 'if (file_exists(\'../\' . $delWeb)) {' . $newlineonly; 
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . 'echo \'The directory wordpress_\' . $delWeb . \' exists' . $newline;             
    fwrite($fh, $stringData);

    $stringData =  $tag . $tag . 'function rrmdir($dir) {' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . $tag . 'if (is_dir($dir)) {' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . $tag . $tag . '$objects = scandir($dir);' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . $tag . $tag . 'foreach ($objects as $object) {' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . $tag . $tag . $tag . 'if ($object != "." && $object != "..") {' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . $tag . $tag . $tag . $tag . 'if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . $tag . $tag . $tag . $tag . '}' . $newlineonly;        
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . $tag . $tag . $tag . '}' . $newlineonly;    
    fwrite($fh, $stringData);    

    $stringData = $tag . $tag . $tag . $tag . 'reset($objects);' . $newlineonly;
    fwrite($fh, $stringData);

    $stringData = $tag . $tag . $tag . $tag . 'rmdir($dir);' . $newlineonly;
    fwrite($fh, $stringData);    

    $stringData = $tag . $tag . $tag . '}' . $newlineonly;        
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . '}' . $newlineonly;    
    fwrite($fh, $stringData);    

    $stringData = $tag . $tag . $tag . $tag . 'rrmdir(\'../\' . $delWeb);' . $newlineonly . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . '# Drop the database'. $newlineonly;    
    fwrite($fh, $stringData);    
    
    $stringData = $tag . '$link = mysqli_connect("' . $host . '","' . $user . '","' . $pass . '");' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . '# Check connection' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag .  'if (mysqli_connect_errno()){' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag .  $tag . 'echo "Failed to connect to MySQL: " . mysqli_connect_error();' . $newlineonly;
    fwrite($fh, $stringData);

    $stringData = $tag . $tag . '}' . $newlineonly;    
    fwrite($fh, $stringData);    

    $stringData = $tag . '# Drop database W3schools.com'  . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . '$sql=\'DROP DATABASE \' . $delWeb;'  . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . 'if (mysqli_query($link,$sql)){' . $newlineonly;    
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag .  $tag . 'echo \'<br/>Database \' . $delWeb . \' deleted successfully\';'  . $newlineonly;    
    fwrite($fh, $stringData);

    $stringData = $tag . $tag . '}else  {' . $newlineonly;    
    fwrite($fh, $stringData);

    $stringData =  $tag . $tag .  $tag . 'echo "<br/>Error deleting database: " . mysqli_error($link);' . $newlineonly;
    fwrite($fh, $stringData);        

    $stringData = $tag . $tag . '}' . $newlineonly;    
    fwrite($fh, $stringData);    

    $stringData = $tag . $tag . '}else  {' . $newlineonly;    
    fwrite($fh, $stringData);

    $stringData =   $tag . $tag .  $tag . 'echo "The directory $delWeb does not exist<br/>";' . $newlineonly;
    fwrite($fh, $stringData);    

    $stringData = $tag . $tag . '}' . $newlineonly;    
    fwrite($fh, $stringData);    
    
    $grtThan = '>';
    $stringData = "\n?$grtThan";
    fwrite($fh, $stringData);
    fclose($fh);

  # Just create the database and the table
    $con = mysqli_connect("$host","$user","$pass");    
    # Check connection
      if (mysqli_connect_errno())  {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }  

    $db_name = 'wpadmin_localhost';
  
  # Create the database
    $sql = 'CREATE DATABASE ' . $db_name;

    if (mysqli_query($con,$sql)) {
        echo "Database my_db created successfully<br/>";
    } else {
        echo "" . mysqli_error($con) . "<br/>";
    }    

  # Create table
    $sql = "CREATE TABLE $db_name.localhost_info(id INT NOT NULL DEFAULT '1', admin_host VARCHAR(30),admin_user VARCHAR(30),admin_password VARCHAR(30),PRIMARY KEY (id))";

  # Execute query
    if (mysqli_query($con,$sql))  {        
        echo "Table localhost_info created successfully<br/>";
    } else {
    
    	echo '<h3>DB Information</h3>';
    
        echo "" . mysqli_error($con) . ' Table localhost_info not created';
    }

  # Find out if there is already an entry
    $sql = "SELECT * FROM $db_name.localhost_info WHERE admin_host = \"localhost\"";
        
    $getRow = mysqli_query($con,$sql) or die(mysqli_error($con));        
           
    $rows = mysqli_num_rows($getRow);

  # Add the host, MySql User, MySql Password  to localhost_info
    if($rows === 0){

      $sql = 'INSERT INTO ' . $db_name . '.localhost_info (admin_host, admin_user, admin_password)VALUES (\'' . $host . '\', \'' . $user . '\',\'' . $pass . '\')';

      if (mysqli_query($con,$sql))  {
      
      	  echo '<h3>Congratulations</h3>';
      
          echo "localhost_info credentials entered successfully<br/>";
      } else {
          
          echo '<h3>Warning</h3>';
          
          echo "" . mysqli_error($con) . ' Credentials not entered';
    
          unlink('./common/con_localhost.php');
    
      }    
    }
        
    mysqli_close($con);

  # Create the con_localhost.php file with the connection to the database credentials
    $myCon = "./common/con_localhost.php";
    $fh = fopen($myCon, 'w') or die("can't open file");
    
    $stringData = "<?php\n";
    fwrite($fh, $stringData);

    $stringData = $tag . "function local_db_connect(){" . $newlineonly;
    fwrite($fh, $stringData);

	$stringData = $tag . $tag . '$link = mysqli_connect(\'' . $host . '\', \'' . $user . '\',\'' . $pass . '\');' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . $tag . 'if (!$link) {' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . $tag . $tag . 'die(\'Could not connect: \' . mysqli_error());' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . '}' . $newlineonly;    
    fwrite($fh, $stringData);    
            
	$stringData = $tag . $tag . '$db_selected = mysqli_select_db($link, \'wpadmin_localhost\');' . $newlineonly;    
    fwrite($fh, $stringData);
    
	$stringData = $tag . $tag . $tag . 'if (!$db_selected) {' . $newlineonly;    
    fwrite($fh, $stringData);
    
	$stringData = $tag . $tag . $tag . $tag . 'die (\'Cannot use foo : \' . mysqli_error());' . $newlineonly;    
    fwrite($fh, $stringData);    
    
    $stringData = $tag . $tag . '}' . $newlineonly;    
    fwrite($fh, $stringData);    

	$stringData = $tag . 'return ($link);' . $newlineonly;
    fwrite($fh, $stringData);
    
    $stringData = $tag . $tag . '}' . $newlineonly;    
    fwrite($fh, $stringData);        
    
    $grtThan = '>';
    $stringData = "\n?$grtThan";
    fwrite($fh, $stringData);
        
    fclose($fh);    

?>