<?php
	if (!isset($_SESSION)){
	    session_start();
	}    
	require_once("../funciones.php");
	require_once("../configuracion/configuracion.php"); 

	if ($_POST["festado"] == "2") {
		actualizar_SAT($_POST["fsat"], $_POST["finforme"], $_POST["fpiezas"], 
			$_POST["fpreciorep"], $_POST["fpreciopiezas"], $_POST["festado"]);
	}
	else {
		actualizar_SAT($_POST["fsat"], $_POST["finforme"], $_POST["fpiezas"], 
			$_POST["fpreciorep"], $_POST["fpreciopiezas"], 1);
	}
	
    header('Location:../listado.php');
?>