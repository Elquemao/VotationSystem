<?php

	include 'conex_bd.php';

	session_start();

	$nif = $_SESSION['nif'];

	if (!isset($_SESSION['nif'])) {
		header("Location: Vista_Principal.html");
	}
	

	$nombre = $_SESSION['nombre'];

	$orden = "SELECT * FROM convocatoria";
	$denominacion = $conexion -> query($orden);
			

	//Con esto lo que hacemos es recuperar todos los datos de la tabla y meterlos en un array
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



?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/Vista_Escrutinio.css"/>
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

    <div class="mensaje">
		<p>&#128100;Bienvenida/o <?php echo $nombre; ?> | <a href="controlador_LogOut.php">Desconexión</a></p>
	</div>

		
       
  </head>
  <body>
    
    <div class="caja">
        <div class="titulin">
        <h2><p id="header"><?php echo $final['DENOMINACION']; ?> del </p> <span><?php echo $final['FECHA']; ?></span></h2>

        <?php

        if ($final['ESCRUTINIO'] == "CERRADO") {
			echo '<h2 id="cerrado" class="cerrado">CERRADO</h2>';    
		} else {
			echo '<h2 id="abierto" class="abierto">ABIERTO</h2>';
		}

		?>
        
    </div>


    <form id="formulario" method="post" action="controlador_Escrutinio.php">
      Abrir escrutinio<input class="input" id="abrir" type="radio" name="escrutinio" value="ABIERTO"></input>
        <br/>
      Cerrar escrutinio<input class="input" id="cerrar" type="radio" name="escrutinio" value="CERRADO"></input>
        <br/>
      <input class="submit" type="submit" name="submit" value="Aceptar"></input>

      <a href="Vista_Menu.php">
        <p class="atras">Volver a pagina principal</p>
      </a>
      
    </form >   
  </body>
</html>

