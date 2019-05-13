<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/PaginaErrorVotar.css"/>      
  </head>
  <body>
    
    <div class="caja">
        <div class="titulin">
        <h2> <span>ERROR</span></h2></div>

        <div class="mens">
        	<?php

            	$respuesta = $_GET['ERROR'];
            	echo $respuesta;
            
          	?>
        </div>
        <br/>
        <div class="mens">
        	<a href="Vista_Menu.php">
   	        <p class="volver">Volver atrás</p>
	        </a>
		    </div>
    </div> 
  </body>
</html>