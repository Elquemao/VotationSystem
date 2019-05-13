<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Resultado Votaciones</title>

  <link rel="stylesheet" type="text/css" href="CSS/ListadoResultado.css"/>
</head>
<body>

  <?php

    include 'conex_bd.php';

    session_start();
    $ArrayResultado = $_SESSION['ARRAYRESULTADO'];
    $nombre = $_SESSION['nombre'];
    $nif = $_SESSION['nif'];
    
    if (!isset($_SESSION['nif'])) {
      header("Location: Vista_Principal.html");
    }


    $orden = "SELECT * FROM convocatoria";
    $denominacion = $conexion -> query($orden);
        

    //Con esto lo que hacemos es recuperar los datos de la tabla y meterlos en un array
    if ($denominacion && $denominacion -> num_rows > 0) {
      $ArrayDenominacion = array();
      $FilaDenominacion = $denominacion -> fetch_array();
      //Creamos un array y convertimos lo obtenido en la orden en un array

      while ($FilaDenominacion) {
        array_push($ArrayDenominacion, $FilaDenominacion);
        $FilaDenominacion = $denominacion -> fetch_array();
        //Vamos metiendo valor a valor dentro de la variable anteriormente creada $ArrayDenominacion
      }
    } 

    foreach ($ArrayDenominacion as $final) {
          
    }

    $ordenEscrutinio = "SELECT * FROM convocatoria";

    $Escrutinio = $conexion -> query($ordenEscrutinio);

    if ($Escrutinio && $Escrutinio -> num_rows > 0) {
      $FilaEscrutinio = $Escrutinio -> fetch_array();
    }

    if ($FilaEscrutinio['ESCRUTINIO'] == "CERRADO") {
      if ($FilaEscrutinio['REALIZADO'] == "SI") {
        //Se pueden ver los resultados
      } else {
        $MensError = "El escrutinio está cerrado, no se pueden ver los resultados";
        header("Location: PaginaErrorVotar.php?ERROR=$MensError");
      } 
    } else {
      $MensError = "Las votaciones aún no han acabado, esta acción no puede ser realizada.";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    }

    

     /*if ($FilaEscrutinio['ESCRUTINIO'] == "CERRADO") {
      $MensError = "El escrutinio está cerrado, no se pueden ver los resultados";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    }

    if ($FilaEscrutinio['REALIZADO'] == "NO") {
      $MensError = "Las votaciones aún no han acabado, esta acción no puede ser realizada.";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    }*/

    

  ?>

  <div id="titulo">
    <p id="header">Resultado de las <?php echo $final['DENOMINACION']; ?> de <?php echo $final['FECHA']; ?></p>
  </div>


  <div id="main-container">

    <table>


  
   
      <thead>
        <tr>
          <th>PARTIDO</th>
          <th>SIGLAS</th>
          <th>VOTOS TOTALES</th>
        </tr>
      </thead>

      <?php
        foreach ($ArrayResultado as $fila) {
          
      ?>

      <tr>
        <td><?php echo $fila['NOMBRE']; ?></td>
        <td><?php echo $fila['SIGLAS']; ?></td>
        <td><?php echo $fila['VOTOS_TOTALES']; ?></td>
      </tr>
      <!--<tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>-->

      <?php
      }
    ?>
    </table>
    
  </div>

  <a href="Vista_Menu.php">
    <p class="atras">Volver al menú</p>
  </a>

  
</body>
</html>


