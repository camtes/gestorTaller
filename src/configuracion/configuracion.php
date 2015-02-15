<?php
    date_default_timezone_set('Europe/Madrid');

    // Datos de conexión a la base de datos
    $host = "192.168.56.101" ;
    $bdname = "gestorTaller";
    define("DB_USUARIO", "gTaller_user");
    define("DB_CONTRASENA", "g3stor");

    // Conexión a base de datos (NO MODIFICAR)
    define("DB_DSN", "mysql:host=$host;dbname=$bdname");
    define("TABLA_CLIENTE", 'cliente');
    define("TABLA_SAT", 'sat');
?>
