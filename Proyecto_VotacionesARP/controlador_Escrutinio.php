<?php

	include 'conex_bd.php';

	$orden3 = "SELECT * FROM convocatoria";

	$resultado3 = $conexion -> query($orden3);
	if ($resultado3 && $resultado3 -> num_rows > 0) {
      $FilaEscrutinio = $resultado3 -> fetch_array();
    }


	$radio = $_REQUEST['escrutinio'];

	if ($radio == "ABIERTO") {
		
		$orden = "UPDATE convocatoria SET ESCRUTINIO = '$radio'";
		$resultado = $conexion -> query($orden);
		if ($conexion -> affected_rows == 1) {
			header("Location: Vista_Escrutinio.php");
			//Escrutinio se actualiza
		} else {
			//Escrutinio no se actualiza
			$conexion -> rollback();
			$mensaje = "mal";
			header("Location: ");
			echo $mensaje;
		}
	} else {
		if ($FilaEscrutinio['ESCRUTINIO'] == "ABIERTO"){

			$orden = "UPDATE convocatoria SET ESCRUTINIO = '$radio'";
			$resultado = $conexion -> query($orden);
			if ($conexion -> affected_rows == 1) {
				header("Location: Vista_Escrutinio.php");
				//Escrutinio se actualiza
			} else {
				//Escrutinio no se actualiza
				$conexion -> rollback();
				$mensaje = "mal";
				header("Location: ");
				echo $mensaje;
			}
			//				INTRODUCCIÓN DE DATOS A LA TABLA RESULTADOS (CHAPUZA)
			//-----------------------------------------------

			$orden4 = "SELECT c.ID, p.ID, p.VOTOS_TOTALES 
			FROM convocatoria c, partido p";
			$resultado4 = $conexion -> query($orden4);
			 //Con esto lo que hacemos es recuperar los datos de la tabla y meterlos en un array
		    if ($resultado4 && $resultado4 -> num_rows > 0) {
		      $ArrayResultado = array();
		      $FilaResultado = $resultado4 -> fetch_array();
		      //Creamos un array y convertimos lo obtenido en la orden en un array

		      while ($FilaResultado) {
		        array_push($ArrayResultado, $FilaResultado);
		        $FilaResultado = $resultado4 -> fetch_array();
		        //Vamos metiendo valor a valor dentro de la variable anteriormente creada $ArrayDenominacion
		      }
		    } 

		    foreach ($ArrayResultado as $final) {
		          
		    }

		    $DENO = $ArrayResultado[0][0];
		    $NOM = $ArrayResultado[0][1];
		    $VOT = $ArrayResultado[0]['VOTOS_TOTALES'];

		    $DENO1 = $ArrayResultado[1][0];
		    $NOM1 = $ArrayResultado[1][1];
		    $VOT1 = $ArrayResultado[1]['VOTOS_TOTALES'];

		    $DENO2 = $ArrayResultado[2][0];
		    $NOM2 = $ArrayResultado[2][1];
		    $VOT2 = $ArrayResultado[2]['VOTOS_TOTALES'];

		    $DENO3 = $ArrayResultado[3][0];
		    $NOM3 = $ArrayResultado[3][1];
		    $VOT3 = $ArrayResultado[3]['VOTOS_TOTALES'];

		    $pp = "INSERT INTO resultado (ID, CONVOCATORIA, PARTIDO, TOTAL_VOTOS)
		    VALUES (NULL, $DENO, $NOM, $VOT)";
		    $pp2 = $conexion -> query($pp);

		    $psoe = "INSERT INTO resultado (ID, CONVOCATORIA, PARTIDO, TOTAL_VOTOS)
		    VALUES (NULL, $DENO1, $NOM1, $VOT1)";
		    $psoe2 = $conexion -> query($psoe);

		    $cs = "INSERT INTO resultado (ID, CONVOCATORIA, PARTIDO, TOTAL_VOTOS)
		    VALUES (NULL, $DENO2, $NOM2, $VOT2)";
		    $cs2 = $conexion -> query($cs);

		    $up = "INSERT INTO resultado (ID, CONVOCATORIA, PARTIDO, TOTAL_VOTOS)
		    VALUES (NULL, $DENO3, $NOM3, $VOT3)";
		    $up2 = $conexion -> query($up);

			//-----------------------------------------------

			$orden2 = "UPDATE convocatoria SET REALIZADO = 'SI'";
			$resultado2 = $conexion -> query($orden2);
			if ($conexion -> affected_rows == 1) {
				header("Location: Vista_Escrutinio.php");
				//Escrutinio se actualiza
			} else {
				//Escrutinio no se actualiza
				$conexion -> rollback();
				$mensaje = "mal";
				header("Location: ");
				echo $mensaje;
			}
		} else {
			header("Location: Vista_Escrutinio.php");
		}

		

	}

	
?>