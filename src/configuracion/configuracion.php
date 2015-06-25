<?php
    date_default_timezone_set('Europe/Madrid');

    // Datos de conexión a la base de datos
    $host = "localhost" ;
    $bdname = "gestorTaller";
    define("DB_USUARIO", "root");
    define("DB_CONTRASENA", "root");

    // Conexión a base de datos (NO MODIFICAR)
    define("DB_DSN", "mysql:host=$host;dbname=$bdname");
    define("TABLA_CLIENTE", 'cliente');
    define("TABLA_SAT", 'sat');
?>
