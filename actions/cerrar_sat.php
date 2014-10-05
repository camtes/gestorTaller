<?php
	if (!isset($_SESSION)){
	    session_start();
	}    
	require_once("../funciones.php");
	require_once("../configuracion/configuracion.php"); 

	cerrar_sat($_GET["id"]);
	
    header('Location:../listado.php');
?>