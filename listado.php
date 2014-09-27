<?php
    if (!isset($_SESSION)){
        session_start();
    } 
    else {
        header("Location:index.html");
    }   
    require_once("funciones.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <?php pintaHeader() ?>
    <link rel="stylesheet" type="text/css" href="css/listado.css">
</head>
<body>
    <section id="cabecera">
        <?php pintaMenu() ?>
        <a id="botonMenu" href="#"><span><img src="img/menu.png"></span></a>
    </section>
    
    <section id="contenedor">
        <h2> Listado de equipos informáticos</h2>
        <section id="contenido">
            <table border=0 summary="Listado de equipos informáticos" id="listado">
                <thead>
                    <tr>
                        <th> REP </th>
                        <th> Nombre </th>
                        <th> Telefono </th>
                        <th> Solución </th>
                        <th> Estado </th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><a href="#">01/14</a></td>
                        <td>Carlos</td>
                        <td>680482120</td>
                        <td>Se le cambia la fuente de alimentación y se vuelve a instalar windows 7Se le cambia la fuente de alimentación y se vuelve a instalar windows 7Se le cambia la fuente de alimentación y se vuelve a instalar windows 7Se le cambia la fuente de alimentación y se vuelve a instalar windows 7</td>
                        <td> Reparado </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>
    <footer>
        gestorTaller - Desarrollado por <a href="http://carloscamposfuentes.wordpress.com" target="_blank">Carlos Campos</a>.
    </footer>
</body>
</html>
