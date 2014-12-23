<?php
	if (!isset($_SESSION)){
	    session_start();
	}    
	require_once("../funciones.php");
	require_once("../configuracion/configuracion.php"); 

	if ($_POST["fexiste_cliente"] == 'true') {
		insertar_sat($_POST["fcliente"], $_POST["frep"], $_POST["fproblema"]);
	}
	else {
		insertar_cliente($_POST["fnombre"], $_POST["ftelefono"], $_POST["ftelefono2"], $_POST["fdireccion"]);
		
		$cliente = ultimo_cliente();
		insertar_sat(ultimo_cliente(), $_POST["frep"], $_POST["fproblema"]);
	}
	
    header('Location:../listado.php');
?>