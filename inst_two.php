<?php 
          
          echo '<div id="sitename">';

  		# Title
    	  echo '<h3>Installation</h3>';
          
        
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
           
		echo '</div>';


?>