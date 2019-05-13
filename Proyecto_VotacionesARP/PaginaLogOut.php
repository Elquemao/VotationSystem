<?php



?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/PaginaErrores.css"/>      
  </head>
  <body>
    
    <div class="caja">
          <div class="titulin">
          <h2>Desconexión <span>correctamente</span> realizada</h2></div>

          <div class="mens">
          <?php

            $respuesta = $_GET['bye'];
            echo $respuesta;
            header("refresh: 3; url = Vista_Principal.html");
          ?>
          </div>
     
    </div> 
  </body>
</html>