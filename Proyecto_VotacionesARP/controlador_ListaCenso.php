<?php
	include 'conex_bd.php';

	session_start();
	$rol = $_SESSION['rol'];

	if($rol == "NORMAL") {
        header("Location: Vista_Menu.php");
        exit();
    }

    $nif = $_SESSION['nif'];
    
    if (!isset($_SESSION['nif'])) {
      header("Location: Vista_Principal.html");
    }

	$orden = "SELECT * FROM votantes";
	$resultado = $conexion -> query($orden);

	if ($resultado && $resultado -> num_rows > 0) {
		$ArrayVotantes = array();
		$FilaVotantes = $resultado -> fetch_array();

		while ($FilaVotantes) {
			array_push($ArrayVotantes, $FilaVotantes);
			$FilaVotantes = $resultado -> fetch_array();
		}
	} 

	session_start();
	$_SESSION['ARRAYVOTANTES'] = $ArrayVotantes;
	header ("Location: Vista_ListadoVotantes.php");


	

?> 