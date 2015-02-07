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
    </section>

    <section id="contenedor">
        <h2> Clientes</h2>
        <section id="contenido">
            <secton id="nuevo_cliente">
                <form action="acciones/nuevo_cliente.php" method="post">
                    <table summary="Nuevo cliente" >
                        <tr>
                            <td>Nombre</td>
                            <td>Telefono</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="fnombre" size=30 maxlength="50" required></td>
                            <td><input type="text" name="ftelefono" size=10 maxlength="9"></td>
                            <td><input type="text" name="ftelefono2" size=10 maxlength="9"></td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="fdireccion" size=50 maxlength="50"></td>
                            <td></td>
                            <td><input type="submit" value="Crear cliente"  class="boton"></td>
                        </tr>
                   </table>
                </form>
            </section>
            <!-- Tabla de clientes en el sistema -->

            <h3> Listado de clientes </h3>
            <form action="" method="" id="busq_cliente">
                <input type="text" name="b-name" id="b-name" size=30 maxlength="50" required>
                <button id="buscar" name="buscar" class="boton">Buscar</button>
            </form>
            <br />
            <table summary="Listado de clientes" id="listado">
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Telefono </th>
                        <th>  </th>
                        <th> Dirección </th>
                        <th>  </th>
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
                                <td> <a href='nuevo.php?cliente=".$fila["id_cliente"]."'>Nuevo rep</a></td>
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
        <?php pintaFooter() ?>
    </footer>
    <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
    <script src="js/busqueda-clientes.js"></script>
</body>
</html>
