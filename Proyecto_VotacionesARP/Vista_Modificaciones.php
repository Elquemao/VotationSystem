<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/VistaModificaciones.css"/>
    <style>
      select, option {
        width: 250px;
      }
        
    </style>

    <?php
  

    include 'conex_bd.php';

    $ordenEscrutinio = "SELECT * FROM convocatoria";

    $Escrutinio = $conexion -> query($ordenEscrutinio);

    if ($Escrutinio && $Escrutinio -> num_rows > 0) {
      $FilaEscrutinio = $Escrutinio -> fetch_array();
    }

    if ($FilaEscrutinio['ESCRUTINIO'] == "ABIERTO") {
      $MensError = "El escrutinio está abierto, esto no se puede realizar";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    }

    if ($FilaEscrutinio['REALIZADO'] == "SI") {
      $MensError = "Las votaciones han acabado, esta acción no puede ser realizada.";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    }


    ?>

  </head>
  <body>
    
    <?php
      session_start();
      $nombre = $_SESSION['nombre'];
      $apellidos = $_SESSION['apellidos'];
      $nif = $_SESSION['nif'];
      $pass = $_SESSION['pass'];
      $domicilio = $_SESSION['domicilio'];
      $fecha_nac = $_SESSION['fecha_nac'];

    ?>

    <div class="caja">
        <div class="titulin">
        <h2>Modifica <span>Tus Datos</span> personales</h2></div>
    <form id="formulario" method="post" action="controlador_Modificacion.php">
    
      <input class="input" id="nombre" type="text" name="nombre" placeholder="<?php echo $nombre; ?>" value="<?php echo $nombre; ?>"></input>
        <br/>
      <input class="input" id="apellidos" type="text" name="apellidos" placeholder="<?php echo $apellidos; ?>" value="<?php echo $apellidos; ?>"></input>
        <br/>
      <input class="input" id="nif" type="text" name="nif" maxlength="9" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))" placeholder="<?php echo $nif; ?>" value="<?php echo $nif ?>" readonly></input>
        <br/>
      <input class="input" id="pass" type="password" name="pass" placeholder="Nueva Contraseña: " value="<?php echo $pass ?>"</input>
        <br/>
      <input class="input" id="domicilio" type="text" name="domicilio" placeholder="<?php echo $domicilio; ?>" value="<?php echo $domicilio; ?>"</input>
        <br/>
      <input class="input" id="fecha_nac" type="date" name="fecha_nac" value="<?php echo $fecha_nac; ?>"></input>
        <br/>
        
      <input class="submit" type="submit" name="submit" value="Termina la modificación"></input>
      
      <a href="Vista_Menu.php">
        <p class="atras">Volver a pagina principal</p>
      </a>
      
    </form >

    

    </div>
  </body>
