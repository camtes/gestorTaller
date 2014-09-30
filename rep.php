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
    <link rel="stylesheet" type="text/css" href="css/cliente.css">
</head>
<body>
    <section id="cabecera">
        <?php pintaMenu() ?>
        <a id="botonMenu" href="#"><span><img src="img/menu.png"></span></a>
    </section>
    
    <section id="contenedor">
        <h2> Clientes</h2>
        <section id="contenido">
            <secton id="nuevo_rep">
                <form action="actions/busqueda_cliente.php" method="post">
                    <td><input type="text" name="fnombre" size=30 maxlength="50" required></td>
                    
                            <td><input type="submit" value="Crear cliente" ></td>
                        </tr>
                   </table>
                </form>
            </section>
        </section>
    </section>
    <footer>
        gestorTaller - Desarrollado por 
        <a href="http://carloscamposfuentes.wordpress.com" target="_blank">Carlos Campos</a>.
    </footer>
</body>
</html>
