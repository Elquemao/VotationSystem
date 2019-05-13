<?php

  include 'conex_bd.php';

  session_start();

  $nif = $_SESSION['nif'];
  
  if (!isset($_SESSION['nif'])) {
    header("Location: Vista_Principal.html");
  }


  $orden = "SELECT VOTADO FROM votantes where NIF = '$nif'";
  $votantes = $conexion -> query($orden);

  if ($votantes && $votantes -> num_rows > 0) {
    $FilaVotantes = $votantes -> fetch_array();
  }
 
  if ($FilaVotantes['VOTADO'] == "SI") {
    $MensError = "Ya has votado anteriormente";
    header("Location: PaginaErrorVotar.php?ERROR=$MensError");
  }

?>



<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/Vistapp.css"/>      
  </head>
  <body>

  	<?php include 'conex_bd.php'; ?>

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


    
    <div class="caja">
          <div class="titulin">
          <h2><span>Está a punto de votar a <?php echo $ArrayPartido['0']['NOMBRE'] ?></span></h2>

          <h2 class="norma">Si esta de acuerdo marque la casilla y dele a VOTA</h2> 
          <h2 class="norma">si no pulse en volver atras.</h2>
          </div>
        
          <form id="formulario" method="post" action="controlador_Votaciones.php">
          	
          	<input type="checkbox" class="check" id="partido" name="partido" value="1" required></input>

          	</br>
          	</br>

          	<input class="submit" type="submit" name="submit" value="!VOTA!"></input>
          		
          	<div class="mens">
          		<a href="Vista_Votaciones.php">
   	          <p class="volver">Volver atrás</p>
	          </a>
	        
	          <?php

	            //$respuesta = $_GET['TEXTO'];
	            //echo $respuesta;
	            //header("url = Vista_Modificaciones.php");
	          ?>
          </div>
          </form>
     
    </div> 
  </body>
</html>