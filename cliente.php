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
            <secton id="nuevo_cliente">
                <form action="actions/nuevo_cliente.php" method="post">
                    <table summary="Nuevo cliente">
                        <tr>
                            <td>Nombre</td>
                            <td>Telefono</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="fnombre" size=30 maxlength="50" required></td>
                            <td><input type="text" name="ftelefono" size=10 maxlength="9" required></td>
                            <td><input type="text" name="ftelefono2" size=10 maxlength="9"></td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="fdireccion" size=50 maxlength="50" required></td>
                            <td></td>
                            <td><input type="submit" value="Crear cliente" ></td>
                        </tr>
                   </table>
                </form>
            </section>
            <!-- Tabla de clientes en el sistema -->
            <form action="" method="">
                <input type="text" name="b-name" size=30 maxlength="50" required>
                <input type="submit" id="buscar" name="buscar" value="Buscar" ></td>
            </form>
            <h3> Listado de clientes </h3>
            <table summary="Listado de clientes" id="listado">
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Telefono </th>
                        <th>  </th>
                        <th> Dirección </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    if (existen_usuario) {
                        foreach (cargarListaClientes() as $fila) {
                            echo "
                            <tr>
                                <td> <a class='name' href='#'>".$fila["nombre"]."</a></td>
                                <td> ".$fila["telefono"]."</td>
                                <td> ".$fila["telefono2"]."</td>
                                <td> ".$fila["direccion"]."</td>
                            </tr>";
                        }
                    }    
                    else {
                        echo "
                        <tr>
                            <td colspan=4> No existen usuarios en el sistema </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </section>
    <footer>
        gestorTaller - Desarrollado por <a href="http://carloscamposfuentes.wordpress.com" target="_blank">Carlos Campos</a>.
    </footer>
    
    <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
    <script src="js/busqueda-clientes.js"></script>
</body>
</html>
