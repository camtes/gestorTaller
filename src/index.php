<?php
	if (!isset($_SESSION)){
	    session_start();
	}
	header("Location: listado.php");
	require_once("funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>gestorTaller</title>
	<?php pintaHeader() ?>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<section id="login">
		<header><img src="img/logo.png"></header>
		<section id="login-box">
			<form action="acciones/login.php" method="post">
				Usuario
				<br>
				<input type="text" name="fUsuario" class="text">
				<br><br>
				Contraseña
				<br>
				<input type="password" name="fPasswd" class="text">
				<br><br>
         		<input type="checkbox" id="fRecordarUsuario" value="1"> Recordar usuario
				<input type="submit" value="Identificar" class="enviar">
			</form>
		</section>
	</section>
</body>
</html>
