<?php
	if (!isset($_SESSION)){
	    session_start();
	}    
	require_once("../funciones.php");
	require_once("../configuracion/configuracion.php"); 

	insertar_cliente($_POST["fnombre"], $_POST["ftelefono"], 
		$_POST["ftelefono2"], $_POST["fdireccion"]);   

    header('Location:../cliente.php');
?>