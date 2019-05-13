
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/PaginaMensajes.css"/>      
  </head>
  <body>
    
    <div class="caja">
          <div class="titulin">
          <h2>Alta <span>correctamente</span> realizada</h2></div>

          <div class="mens">
          <?php
          
            session_start();
            $nif = $_SESSION['nif'];
            $pass = $_SESSION['pass'];
            
            
            include 'conex_bd.php';
            $orden = ("SELECT * FROM votantes WHERE NIF = '$nif' AND '$pass' = AES_DECRYPT(PASSWORD, 'alejandro')");

            $resultado = $conexion -> query($orden);

            if($resultado && $resultado -> num_rows == 1) {
                $ArrayRegistro = array();
                $ArrayRegistro = $resultado -> fetch_array();              
                $_SESSION['rol'] = $ArrayRegistro['ROL'];
            }
            
            $respuesta = $_GET['TEXTO'];
            echo $respuesta;
            header("refresh: 5; url = Vista_Menu.php");
          ?>
          </div>

    </div> 
  </body>
</html>