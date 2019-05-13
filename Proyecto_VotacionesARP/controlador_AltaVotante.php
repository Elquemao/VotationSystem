<?php

	include 'conex_bd.php';

	$nombre = $_REQUEST['nombre'];
	$apellidos = $_REQUEST['apellidos'];
	$nif = $_REQUEST['nif'];
	$pass = $_REQUEST['pass'];
	$domicilio = $_REQUEST['domicilio'];
	$fecha_nac = $_REQUEST['fecha_nac'];
	
	session_start();
	$_SESSION['nombre'] = $nombre;
	$_SESSION['apellidos'] = $apellidos;
	$_SESSION['nif'] = $nif;
	$_SESSION['pass'] = $pass;
	$_SESSION['domicilio'] = $domicilio;
	$_SESSION['fecha_nac'] = $fecha_nac;


	$orden = "INSERT INTO votantes (ID, NIF, APELLIDOS, NOMBRE, DOMICILIO, FECHA_NAC, PASSWORD, ROL, VOTADO)
	VALUES (NULL, '$nif', '$apellidos', '$nombre', '$domicilio', '$fecha_nac', AES_ENCRYPT('$pass','alejandro'), 'NORMAL', 'NO')";


	$alta = $conexion -> query ($orden);
        
    if ($conexion -> affected_rows == 1) {
		$resp = "Serás redirigido en 5 segundos";
		header("Location: PaginaMensajes.php?TEXTO=$resp");
	} else {
		$MensError = "Este usuario ya está registrado";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
	}



?>