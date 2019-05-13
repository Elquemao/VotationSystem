<?php

	session_start();
	session_destroy();

	$bye = "Será redirigido a la página principal en 3 segundos";
	header("Location: PaginaLogOut.php?bye=$bye");

?>