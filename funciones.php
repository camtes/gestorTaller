<?php
require_once("configuracion/configuracion.php");

    function conectaBD($tabla) {

    }

 	function pintaMenu() {
 		echo '
            <a id="usuarioLogin" href="#"> '.$_SESSION['usuario'].' </a>
 			<nav id="menu">
        	    <ul>
            	    <li><a href="listado.php"> Inicio </a></li>
	                <li><a href=""> Nuevo SAT </a></li>
	                <li><a href=""> Búsqueda </a></li>
	                <li><a href="cliente.php"> Clientes </a></li>
	                <li><a class="final" href=""> Opciones</a></li>
	            </ul>
    		</nav>
    		';
 	}

 	function pintaHeader() {
 		echo '
 			<title>gestorTaller</title>
 			<link rel="icon" type="image/png" href="img/favicon.png" />
    		<link rel="stylesheet" type="text/css" href="css/estilo.css">
    		<meta name="viewport" content="width=device-width, initial-scale=1" />
    		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>';
 	}

// FUNCIONES CON USO DE BASE DE DATOS ---------------------------

    function insertar_cliente($nombre, $tlfn, $tlfn2, $dir) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        if ($tlfn2 == "") {
            $consultaSQL = "INSERT INTO ".TABLA_CLIENTE."(nombre, telefono, 
                        direccion) VALUES ('".$nombre."', ".$tlfn.", 
                        '".$dir."')";
        }
        else {
        $consultaSQL = "INSERT INTO ".TABLA_CLIENTE."(nombre, telefono, telefono2, 
                        direccion) VALUES ('".$nombre."', ".$tlfn.", 
                        ".$tlfn2.", '".$dir."')";
        }
        
        $resultados = $conexion->query($consultaSQL);
    }

    function cargarListaClientes() {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT * FROM ".TABLA_CLIENTE;
        $resultados = $conexion->query($consultaSQL);

        return $resultados;
    }
?>