<?php

	include 'conex_bd.php';

	session_start();
	$nif = $_SESSION['nif'];

	$IDpartido = $_REQUEST['partido'];

	$conexion -> autocommit(false);
	$mensaje = "bien";


	$orden = "UPDATE votantes SET VOTADO = 'SI' WHERE NIF = '$nif'";

	$resultado = $conexion -> query($orden);

						//VER LOS COMMIT

	if ($conexion -> affected_rows == 1) {
		//Votante se actualiza
	} else {
		//Votante no se actualiza
		$conexion -> rollback();
		$mensaje = "mal";
		header("Location: ");
		echo $mensaje;
	}

	$orden2 = "UPDATE partido SET VOTOS_TOTALES = (VOTOS_TOTALES + 1) WHERE ID = $IDpartido";

	$resultado2 = $conexion -> query($orden2);

	if ($conexion -> affected_rows == 1) {
		//El partido se actualiza
	} else {
		$conexion -> rollback();
		$mensaje = "mal";
		header("Location: ");
		echo $mensaje;
		//Fallo al actualizar el partido
	}

	if ($mensaje = "bien") {
		$conexion -> commit();
		$conexion -> autocommit(true);
		$MENSAJE = "Has votado correctamente, se te redirigirá al menú enseguida.";
		header("Location: PaginaVotado.php?TEXTO=$MENSAJE");
		echo $mensaje;
		//Insercion con exito
	}

?>