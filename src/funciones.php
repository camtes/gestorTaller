<?php
require_once("configuracion/configuracion.php");

 	function pintaMenu() {
 		echo '
 			<nav id="menu">
  	    <ul>
      	    <li><a href="listado.php"> Inicio </a></li>
            <li><a href="nuevo.php"> Nuevo </a></li>
            <li><a href="cliente.php"> Clientes </a></li>
            <li><a href="informes.php" disabled> Informes </a></li>
              <li><a class="final" href="#" disabled> Búsqueda </a></li>
        </ul>
    		</nav>
    		';
 	}

 	function pintaHeader() {
 		echo '
 			<title>gestorTaller</title>
 			<link rel="icon" type="image/png" href="img/favicon.png" />
    		<link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    		<meta name="viewport" content="width=device-width, initial-scale=1" />
    		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>';
 	}

    function pintaFooter() {
        echo '
          <a href="http://github.com/gestorTaller" target="_blank"> gestorTaller</a> -
          Desarrollado por <a href="http://www.ccamposfuentes.es" target="_blank">Carlos Campos</a>';
    }

// FUNCIONES CON USO DE BASE DE DATOS ---------------------------

    // Función que comprueba cual es el último rep introducido
    function ultimo_rep() {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT rep FROM ".TABLA_SAT." ORDER BY 1 DESC LIMIT 1";
        $resultados = $conexion->query($consultaSQL);

        foreach ($resultados as $fila) {
            return $fila["rep"];
        }
    }

    // Función que comprueba cual es el último cliente
    function ultimo_cliente() {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT id_cliente FROM ".TABLA_CLIENTE." ORDER BY id_cliente DESC LIMIT 1";
        $resultados = $conexion->query($consultaSQL);

        foreach ($resultados as $fila) {
            return $fila["id_cliente"];
        }
    }

    // Función que comprueba si existen usuarios en la base de datos
    function existen_usuario() {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT * FROM ".TABLA_CLIENTE;
        $resultados = $conexion->query($consultaSQL);

        if (count($resultados)>2) {
            return true;
        }
        else {
            return false;
        }
    }

    // Función que comprueba si existen equipos con el estado que se pasa por referencia
    function existen_equipos($estado) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT * FROM ".TABLA_SAT." WHERE estado like ".$estado;
        $resultados = $conexion->query($consultaSQL);

        return count($resultados);

    }

    // Función para insertar un cliente en la base de datos
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

    // Función para insertar un nuevo sat en la base de datos
    function insertar_sat($cliente, $rep, $problema) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        if ($rep == "") {
            $consultaSQL = "INSERT INTO ".TABLA_SAT."(id_cliente, problema, estado) VALUES
                            (".$cliente.",'".$problema."', 1)";
        }
        else {
        $consultaSQL = "INSERT INTO ".TABLA_SAT."(id_cliente, rep, problema, estado) VALUES
                            (".$cliente.",'".$rep."','".$problema."', 1)";
        }

        $resultados = $conexion->query($consultaSQL);
    }

    // Función para actualizar la entrada de sat identificado por el id_sat
    function actualizar_sat($sat, $informe, $piezas, $precio_rep, $precio_piezas, $estado) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $precio_final = $precio_rep + $precio_piezas;

        $consultaSQL = "UPDATE sat SET informe='".$informe."',
                                        piezas='".$piezas."',
                                        precio_rep='".$precio_rep."',
                                        precio_piezas='".$precio_piezas."',
                                        precio='".$precio_final."',
                                        estado=".$estado."
                        WHERE id_sat like ".$sat;

        $resultados = $conexion->query($consultaSQL);
    }

    // Función para cerrar la entrada de sat identificado por el id_sat
    function cerrar_sat($sat) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "UPDATE sat SET estado=3 WHERE id_sat like ".$sat;

        $resultados = $conexion->query($consultaSQL);
    }

    // Función para cargar todos los clientes existentes en la base de datos
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

    // Función para obtener los datos de un cliente pasando su id por referencia
    function cargarDatosCliente($cliente) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT * FROM ".TABLA_CLIENTE." WHERE id_cliente like '".$cliente."'";
        $resultados = $conexion->query($consultaSQL);

        return $resultados;
    }

    // Función para obtener los equipos según su estado
    function cargar_equipos($estado) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT * FROM ".TABLA_SAT." WHERE estado like ".$estado;
        $resultados = $conexion->query($consultaSQL);

        return $resultados;
    }

    // Función para obtener los datos de un sat por su id
    function cargar_sat($id_sat) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT * FROM ".TABLA_SAT." WHERE id_sat like ".$id_sat;
        $resultados = $conexion->query($consultaSQL);

        return $resultados;
    }

    // Función para obtener el nombre del cliente por su id
    function obtener_nombre_cliente($id_cliente) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT nombre FROM ".TABLA_CLIENTE." WHERE id_cliente like '".$id_cliente."'";
        $resultados = $conexion->query($consultaSQL);

        foreach ($resultados as $fila) {
            return $fila["nombre"];
        }
    }

    // Función para obtener el telefono del cliente por su id
    function obtener_tlfn_cliente($id_cliente) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT telefono FROM ".TABLA_CLIENTE." WHERE id_cliente like '".$id_cliente."'";
        $resultados = $conexion->query($consultaSQL);

        foreach ($resultados as $fila) {
            return $fila["telefono"];
        }
    }

    // Función para obtener el telefono2 del cliente por su id
    function obtener_tlfn2_cliente($id_cliente) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT telefono2 FROM ".TABLA_CLIENTE." WHERE id_cliente like '".$id_cliente."'";
        $resultados = $conexion->query($consultaSQL);

        foreach ($resultados as $fila) {
            return $fila["telefono2"];
        }
    }

    // Función para obtener la direccion del cliente por su id
    function obtener_direccion_cliente($id_cliente) {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENA);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {echo "Conexión fallida: ".$e->getMessage();}

        $consultaSQL = "SELECT direccion FROM ".TABLA_CLIENTE." WHERE id_cliente like '".$id_cliente."'";
        $resultados = $conexion->query($consultaSQL);

        foreach ($resultados as $fila) {
            return $fila["direccion"];
        }
    }
?>
