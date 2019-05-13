<?php

$conexion = new mysqli ("localhost", "root", "", "bd_votacionesARP");
$error = $conexion -> connect_errno;
if ($error != null) {
	echo "<p>Error $error conectando a la base de datos:
	$conexion->connect_error</p>";
exit();
}

?>