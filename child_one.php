<?php
  /*
    Creates the child directory of the current theme
    Also creates the style.css with the required vwebiage 
  
  */
  # Website title
    $web = $_POST['web'];

  # Website theme name
    $theme = $_POST['theme'];    
  
  # Create the child directory
    $path =  '../wordpress_' . $web . '/wp-content/themes/' . $theme . '-child/';
  
    mkdir($path, 0700);
    
  # Create the style.css file with the required verbiage
    $style =  $path . 'style.css';
  
    $myFile = $style;
    $fh = fopen($myFile, 'w') or die("can't open file");

    $stringData = "/*\n";
    fwrite($fh, $stringData);

    $stringData = "\t\tTheme Name:\t\t\t$theme-Child\n";
    fwrite($fh, $stringData);
    
    $stringData = "\t\tTheme URI:\t\t\thttp://example.com/\n";
    fwrite($fh, $stringData);
    
    $stringData = "\t\tDescription:\t\tChild theme for the $theme theme\n";
    fwrite($fh, $stringData);

    $stringData = "\t\tAuthor:\t\t\t\t\tYour name here\n";
    fwrite($fh, $stringData);

    $stringData = "\t\tAuthor URI:\t\t\thttp://example.com/about/\n";
    fwrite($fh, $stringData);

    $stringData = "\t\tTemplate:\t\t\t\t$theme\n";
    fwrite($fh, $stringData);

    $stringData = "\t\tVersion:\t\t\t\t0.1.0\n";
    fwrite($fh, $stringData);
        
    $stringData = "*/\n\n";
    fwrite($fh, $stringData);

    $stringData = "\t/* This line makes the original $theme css available */\n";
    fwrite($fh, $stringData);    
    
    $stringData = "\t\t@import url(\"../$theme/style.css\");";
    fwrite($fh, $stringData);
    
    fclose($fh);      

    echo 'Child theme directory and sytle.css created<br/>';
    echo 'Activate the child theme. Log in to your site\'s dashboard, and go to Administration Panels > Appearance > Themes. You will see your child theme listed there. Click Activate.';

?>