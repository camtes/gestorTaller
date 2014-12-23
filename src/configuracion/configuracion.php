<?php
	// IP del host donde se aloja la base de datos
	$host = "192.168.56.101" ;
	define("DB_USUARIO", "gTaller_user");
	define("DB_CONTRASENA", "g3stor");
	
	// Conexión a base de datos (NO MODIFICAR)
	define("DB_DSN", "mysql:host=$host;dbname=gestorTaller");
	define("TABLA_CLIENTE", 'cliente');
	define("TABLA_SAT", 'sat');
?>
