<?php

  include 'conex_bd.php';

  if (!isset($_SESSION['NIF'])) {
      header("Location: Vista_Principal.html");
    }

  $ordenEscrutinio = "SELECT * FROM convocatoria";

    $Escrutinio = $conexion -> query($ordenEscrutinio);

    if ($Escrutinio && $Escrutinio -> num_rows > 0) {
      $FilaEscrutinio = $Escrutinio -> fetch_array();
    }

    if ($FilaEscrutinio['ESCRUTINIO'] == "ABIERTO") {
      $MensError = "El escrutinio está abierto, esta opción no se puede realizar";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    }

    if ($FilaEscrutinio['REALIZADO'] == "SI") {
      $MensError = "Las votaciones han acabado, esta acción no puede ser realizada.";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    }


?>


<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/Vista_BajaVotante.css"/>
    <style>
      select, option {
        width: 250px;
      }
    </style>

    <script language="JavaScript"> 
        function pregunta() { 
          if (confirm ("¿Estas seguro de enviar este formulario?")){
            //return true;
            document.Vista_BajaVotante.submit();
          } else {
            return false;
          }
        }
    </script>        
  </head>
  <body>
    
    <div class="caja">
        <div class="titulin">
        <h2>Baja <span>De</span> Votante</h2></div>
    <form id="formulario" method="post" action="controlador_BajaVotante.php">
      <input class="input" id="nif" type="text" name="nif" placeholder="NIF:"></input>
        <br/>
      <input class="input" id="pass" type="password" name="pass" placeholder="Password:"></input>
        <br/>
      <input class="submit" type="submit" name="submit" value="Darse de baja" onclick="return pregunta()"></input>
      
    </form >   
  </body>
</html>