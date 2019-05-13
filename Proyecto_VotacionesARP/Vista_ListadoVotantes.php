<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listado de votantes</title>

	<link rel="stylesheet" type="text/css" href="CSS/Vista_ListadoVotantes.css"/>
</head>
<body>

	<div id="titulo">
    	<p id="header">Listado de votantes</p>
  	</div>

	<div id="main-container">

		<table>

			

			<thead>
				<tr>
					<th>NIF</th>
					<th>APELLIDOS</th>
					<th>NOMBRE</th>
					<th>DOMICILIO</th>
					<th>FECHA_NACIMIENTO</th>
					<th>VOTADO</th>
				</tr>
			</thead>
            
            <?php
            	session_start();
            	$ArrayVotantes = $_SESSION['ARRAYVOTANTES'];
            	$nif = $_SESSION['nif'];
			    if (!isset($_SESSION['nif'])) {
			      header("Location: Vista_Principal.html");
			    }

				foreach ($ArrayVotantes as $fila) {
				
			?>
			<tr>
				<td><?php echo $fila['NIF']; ?></td>
				<td><?php echo $fila['APELLIDOS']; ?></td>
				<td><?php echo $fila['NOMBRE']; ?></td>
				<td><?php echo $fila['DOMICILIO']; ?></td>
				<td><?php echo $fila['FECHA_NAC']; ?></td>
				<td><?php echo $fila['VOTADO']; ?></td>
			</tr>
			<!--<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>-->
            <?php
				}
           	?>
		</table>
	</div>

	<a href="Vista_Menu.php">
    	<p class="atras">Volver al menú</p>
    </a>

</body>
</html>


