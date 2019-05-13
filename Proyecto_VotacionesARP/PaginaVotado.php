<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/PaginaMensajes.css"/>      
  </head>
  <body>
    
    <div class="caja">
          <div class="titulin">
          <h2><span>¡VOTADO!</span></h2></div>

          <div class="mens">
          <?php          
            $respuesta = $_GET['TEXTO'];
            echo $respuesta;
            header("refresh: 3; url = Vista_Menu.php");
          ?>
          </div>

    </div> 
  </body>
</html>