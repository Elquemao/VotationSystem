<?php

	include 'conex_bd.php';

	$NIF = $_REQUEST['nif'];
	$PASS = $_REQUEST['pass'];

	session_start();
	$_SESSION['NIF'] = $NIF;
	$_SESSION['PASS'] = $PASS;

	$orden = "SELECT * FROM votantes WHERE NIF = '$NIF' AND '$PASS' = AES_DECRYPT(PASSWORD, 'alejandro') AND VOTADO = 'NO'";

	$resultado = $conexion -> query ($orden);

	if ($resultado && $resultado -> num_rows == 1) {
		$filaVotante = $resultado -> fetch_array();
		
		if ($opcion == "Baja") {
			header ("Location: control_Baja.php");
		} else if ($opcion == "Modificacion") {

		} else if ($opcion == "Votar") {
			header ("Location: control_Partidos.php");
		}

	} else {
		echo "No puedes dar de baja ese usuario o no existe.";
	}

	

?>