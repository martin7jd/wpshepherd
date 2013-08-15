<?php

        $os = $_SERVER["HTTP_USER_AGENT"];
        echo $os . '<br/>';          

        $subject = "abcdef";
        $pattern = '/^def/';
        preg_match($pattern, substr($subject,3), $matches, PREG_OFFSET_CAPTURE);
        print_r($matches);        

   
?>