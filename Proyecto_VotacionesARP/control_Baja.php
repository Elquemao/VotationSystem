<?php

	include 'conex_bd.php';

	session_start();

	$NIF = $_SESSION['NIF'];
	$PASS = $_SESSION['PASS'];

	$orden = "DELETE FROM votantes WHERE NIF = '$NIF'";

	$resultado = $conexion -> query ($orden);

	$error = "Serás redirigido a la página principal en 5 segundos.";
	header("Location: PaginaErrores.php?COD=$error");


?>