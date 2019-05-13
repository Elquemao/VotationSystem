<?php

	include 'conex_bd.php';

	session_start();
	$nombre = $_REQUEST['nombre'];
	$apellidos = $_REQUEST['apellidos'];
	$nif = $_REQUEST['nif'];
	$pass = $_REQUEST['pass'];
	$domicilio = $_REQUEST['domicilio'];
	$fecha_nac = $_REQUEST['fecha_nac'];

		
	$orden = "UPDATE votantes SET NIF = '$nif', APELLIDOS = '$apellidos', NOMBRE = '$nombre', DOMICILIO = '$domicilio', FECHA_NAC = '$fecha_nac', PASSWORD = AES_ENCRYPT('$pass','alejandro'), ROL = 'NORMAL', VOTADO = 'NO'
		WHERE NIF = '$nif'";


	$alta = $conexion -> query ($orden);

	if ($conexion -> affected_rows == 1) {
		$resp = "Serás redirigido en 5 segundos";
		header("Location: PaginaModificaciones.php");
	} else {
		echo "fallo";
	}

?>