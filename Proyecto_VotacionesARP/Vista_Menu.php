<?php

	include 'conex_bd.php';

	session_start();

	$nif = $_SESSION['nif'];
	$rol = $_SESSION['rol'];

	if (!isset($_SESSION['nif'])) {
		header("Location: Vista_Principal.html");
	}

	if ($_SESSION['rol'] == "ADMIN") {
		header("Location: Vista_MenuAdmin.php");
		exit();
	}
	
	
	$orden = "SELECT * FROM votantes WHERE NIF = '$nif'";

	$resultado = $conexion -> query($orden);

	if ($resultado && $resultado -> num_rows > 0) {
		$ArrayVotantes = array();
		$FilaVotantes = $resultado -> fetch_array();
			//Creamos un array y convertimos lo obtenido en la orden en un array

		while ($FilaVotantes) {
			array_push($ArrayVotantes, $FilaVotantes);
			$FilaVotantes = $resultado -> fetch_array();
				//Vamos metiendo valor a valor dentro de la variable anteriormente creada $ArrayDenominacion
		}
	} 

	foreach ($ArrayVotantes as $final2) {
	}

		
	$nombre = $ArrayVotantes[0]['NOMBRE'];
	$apellidos = $ArrayVotantes[0]['APELLIDOS'];
	$pass = $ArrayVotantes[0]['PASSWORD'];
	$domicilio = $ArrayVotantes[0]['DOMICILIO'];
	$fecha_nac = $ArrayVotantes[0]['FECHA_NAC'];

	$_SESSION['nombre'] = $nombre;
	$_SESSION['apellidos'] = $apellidos;
	$_SESSION['pass'] = $pass;
	$_SESSION['domicilio'] = $domicilio;
	$_SESSION['fecha_nac'] = $fecha_nac;




?>



<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Menu Principal</title>
	<link rel="stylesheet" href="CSS/VistaMenu.css">
</head>
<body>

	<div class="mensaje">
		<p>&#128100;Bienvenido/a <?php echo $ArrayVotantes[0]['NOMBRE']; ?> | <a href="controlador_LogOut.php">Desconexión</a></p>
		
	</div>
	
	<div id="titulo">
		<p id="header">Programa de votaciones municipales</p>
        <!-- <p id="subheader">By Alejandro Ramón Palarea</p> !-->
	</div>

	<header>
		
		<a href="Vista_Modificaciones.php">
			<div class="contenedor" id="uno">
				<img class="icon" src="pictures/icon6.png">
				<p class="texto">Modificación de datos</p>
            
			</div>
		</a>

		<div class="contenedor" id="dos">
			<img class="icon" src="pictures/magnifier.png">
			<p class="texto">Consultas</p>
		</div>

		
		<a href="Vista_Votaciones.php">
			<div class="contenedor" id="cuatro">
				<img class="icon" src="pictures/message-closed-envelope.png">
				<p class="texto">Votar</p>
			</div>
		</a>

		<a href="controlador_TablaResultado.php">
			<div class="contenedor" id="cinco">
				<img class="icon" src="pictures/line-chart.png">
				<p class="texto">Mostrar resultados</p>
			</div>
		</a>
    </header>

	

</body>
</html>



















































