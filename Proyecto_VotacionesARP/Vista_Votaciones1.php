<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Custom Radio Buttons y Checkboxes</title>
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


	<div class="wrap">
		<div class="info">
			<h1>Radio Buttons y Checkbox Personalizados</h1>
			<h2>Y Animados :D</h2>
			<p>Por: <a href="http://www.twitter.com/falconmasters">Carlos Arturo</a> - <a href="http://www.falconmasters.com">FalconMasters</a></p>
		</div>
		<form action="" class="formulario">
			<div class="radio">
				<h2>Radio Buttons</h2>
				<input type="radio" name="sexo" id="hombre">
				<img src="<?php echo $ArrayPartido['1']['LOGO'] ?>"></img>
		
				<input type="radio" name="sexo" id="mujer">
				<label for="mujer">Mujer</label>
		
				<input type="radio" name="sexo" id="alien">
				<label for="alien">Alien</label>
			</div>
		
			<div class="checkbox">
				<h2>Checkboxines :D</h2>
				<input type="checkbox" name="checkbox" id="checkbox1">
				<label for="checkbox1">Checkboxin 1</label>
		
				<input type="checkbox" name="checkbox" id="checkbox2">
				<label for="checkbox2">Checkboxin 2</label>
			</div>
		</form>
	</div>
</body>
</html>