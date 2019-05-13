<?php

	include 'conex_bd.php';

	$orden = "SELECT p.NOMBRE, p.SIGLAS, p.VOTOS_TOTALES
	FROM convocatoria c, partido p, resultado r
	WHERE (c.ID = r.CONVOCATORIA) AND (p.ID = r.PARTIDO)
	ORDER BY r.TOTAL_VOTOS DESC";
	$resultado = $conexion -> query($orden);

	if ($resultado && $resultado -> num_rows > 0) {
		$ArrayResultado = array();
		$FilaResultado = $resultado -> fetch_array();

		while ($FilaResultado) {
			array_push($ArrayResultado, $FilaResultado);
			$FilaResultado = $resultado -> fetch_array();
		}
	} 

	session_start();
	$_SESSION['ARRAYRESULTADO'] = $ArrayResultado;
	header ("Location: Vista_Resultados.php");


?>