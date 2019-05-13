<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Votaciones</title>
	<link rel="stylesheet" href="CSS/Vista_Votacion.css">

	<?php 

		include 'conex_bd.php'; 

		$ordenEscrutinio = "SELECT * FROM convocatoria";

		$Escrutinio = $conexion -> query($ordenEscrutinio);

		if ($Escrutinio && $Escrutinio -> num_rows > 0) {
			$FilaEscrutinio = $Escrutinio -> fetch_array();
		}

		if ($FilaEscrutinio['ESCRUTINIO'] == "CERRADO") {
			$MensError = "El escrutinio está cerrado, no se puede votar";
			header("Location: PaginaErrorVotar.php?ERROR=$MensError");
		}

		if ($FilaEscrutinio['REALIZADO'] == "SI") {
      		$MensError = "Las votaciones han acabado, esta acción no puede ser realizada.";
      		header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    	}


	?>

</head>
<body>
	
	<div id="titulo">
		<?php
			$orden = "SELECT * FROM convocatoria";
			$denominacion = $conexion -> query($orden);
			

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
		<p id="header"><?php echo $final['DENOMINACION']; ?> del <?php echo $final['FECHA']; ?></p>
        <!-- <p id="subheader">By Alejandro Ramón Palarea</p> !-->

	</div>

	<header>

		<?php
			$orden = "SELECT * FROM partido";
			$partido = $conexion -> query($orden);
			

			if ($partido && $partido -> num_rows > 0) {
				$ArrayPartido = array();
				$FilaPartido = $partido -> fetch_array();
				//Creamos un array y convertimos lo obtenido en la orden en un array

				while ($FilaPartido) {
					array_push($ArrayPartido, $FilaPartido);
					$FilaPartido = $partido -> fetch_array();
					//Vamos metiendo valor a valor dentro de la variable anteriormente creada $ArrayDenominacion
				}
			} 

			foreach ($ArrayPartido as $final2) {
				
			}
			
		?>



		<p id="header">Seleccione el partido que desea votar</p>
		<a href="pp.php">
			<div class="contenedor" id="uno">
				<img class="icon" src="<?php echo $ArrayPartido['0']['LOGO']; ?>">
				<p class="texto"><?php echo $ArrayPartido['0']['SIGLAS']; ?></p>
            
			</div>
		</a>

		<a href="psoe.php">
		<div class="contenedor" id="dos">
			<img class="icon" src="<?php echo $ArrayPartido['1']['LOGO']; ?>">
			<p class="texto"><?php echo $ArrayPartido['1']['SIGLAS']; ?></p>
		</div>
		</a>

		<a href="podemos.php">
			<div class="contenedor" id="tres">
				
					<img class="icon" src="<?php echo $ArrayPartido['2']['LOGO']; ?>">
					<p class="texto"><?php echo $ArrayPartido['2']['SIGLAS']; ?></p>
				
			</div>
		</a>

		<a href="ciudadanos.php">
		<div class="contenedor" id="cuatro">
			<img class="icon" src="<?php echo $ArrayPartido['3']['LOGO']; ?>">
			<p class="texto"><?php echo $ArrayPartido['3']['SIGLAS']; ?></p>
		</div>
		</a>

		
    </header>

    <div class="mens">
        <a href="Vista_Menu.php">
   			<p class="volver">Volver atrás</p>
	    </a>
	</div>

	

</body>
</html>