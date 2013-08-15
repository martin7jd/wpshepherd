<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Wordpress Localhost Administration
    </title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    

  </head>
  <body>



<?php

  echo 'Start Here';
  
file_put_contents( 'progress.txt', '' );
 
$targetFile = fopen( './downloads/latest.zip', 'w' );
 
//$ch = curl_init( 'http://ftp.free.org/mirrors/releases.ubuntu-fr.org/11.04/ubuntu-11.04-desktop-i386-fr.iso' );
$ch = curl_init( 'http://wordpress.org/latest.zip' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt( $ch, CURLOPT_NOPROGRESS, false );
curl_setopt( $ch, CURLOPT_PROGRESSFUNCTION, 'progressCallback' );
curl_setopt( $ch, CURLOPT_FILE, $targetFile );
curl_exec( $ch );
//fclose( $ch );
 
function progressCallback( $download_size, $downloaded_size, $upload_size, $uploaded_size ){
  static $previousProgress = 0;
    if ( $download_size == 0 ){
      $progress = 0;
    }else{
      $progress = round( $downloaded_size * 100 / $download_size );
      if ( $progress > $previousProgress){
           $previousProgress = $progress;
           $fp = fopen( 'progress.txt', 'r+b' );

			  # Div required for the dynamic loading of the  number count
          echo '<div id="load"></div>';
          		   
        # This is for the jquery No below
          echo '<input id="projNum" value="0" type="hidden"/>';

         ?>       
          <script type="text/javascript"> 
 		        var projNum = document.getElementById("projNum").value;          
            var auto_refresh = setInterval(
            function (){
            $('#load').load('progress.txt',{projNum:projNum}).fadeIn("slow");
            }, 0); // refresh every 1000 milliseconds = 1 sec
            </script>
           <?php
           
           $to_file = "Downloaded: $progress %";
           
           if($progress == '100'){
                $to_file = 'Download complete<br/>';           
           }
           
            fputs( $fp, $to_file );
            fclose( $fp );
      }
    }
} 

    echo 'Uzipping Wordpress File<br/>';
    
      sleep(3);

    $path = './downloads/latest.zip';

  # Unzip the latest.zip to the parent above
    $zip = new ZipArchive;
      if ($zip->open($path) === TRUE) {
        $zip->extractTo('./downloads');        
        $zip->close();        
        echo 'Wordpress Unzip Complete<br/>';
      } else {
        echo 'Unzip Failed';
      }
 
   # Clean up by deleting the downloaded zip file
     if ( file_exists($path)  ){
          unlink($path);          
     }


?>

  </body>
</html>