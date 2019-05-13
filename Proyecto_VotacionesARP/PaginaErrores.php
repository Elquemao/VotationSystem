
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/PaginaErrores.css"/>      
  </head>
  <body>
    
    <div class="caja">
          <div class="titulin">
          <h2>Baja <span>correctamente</span> realizada</h2></div>

          <div class="mens">
          <?php

            $respuesta = $_GET['COD'];
            echo $respuesta;
            header("refresh: 5; url = Vista_Principal.html");
          ?>
          </div>
     
    </div> 
  </body>
</html>