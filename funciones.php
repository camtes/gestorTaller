<?php

 	function pintaMenu() {
 		echo '
            <a id="usuarioLogin" href="#"> '.$_SESSION['usuario'].' </a>
 			<nav id="menu">
        	    <ul>
            	    <li><a href="listado.php"> Inicio </a></li>
	                <li><a href=""> Nuevo SAT </a></li>
	                <li><a href=""> Búsqueda </a></li>
	                <li><a href=""> Clientes </a></li>
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
?>