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
    </section>

    <section id="contenedor">
        <h2> Listado de equipos informáticos en el taller</h2>
        <section id="contenido">
            <!-- Tabla para los equipos que estan en el taller -->
            <table border=0 summary="Listado de equipos informáticos" id="listado">
                <thead>
                    <tr>
                        <th> SAT </th>
                        <th> Nombre </th>
                        <th> Telefono </th>
                        <th> </th>
                        <th> Problema </th>
                        <th>  </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                      foreach (cargar_equipos(1) as $fila) {
                            echo "
                            <tr>
                                <td> ".$fila["id_sat"]."</a></td>
                                <td> ".obtener_nombre_cliente($fila["id_cliente"])."</td>
                                <td> ".obtener_tlfn_cliente($fila["id_cliente"])."</td>
                                <td> ".obtener_tlfn2_cliente($fila["id_cliente"])."</td>
                                <td> ".$fila["problema"]."</td>
                                <td class='opciones'>
                                    <a href='sat.php?id=".$fila["id_sat"]."'>
                                      <i class='fa fa-pencil-square-o fa-lg'></i>
                                    </a>
                                </td>
                            </tr>";
                        }
                    ?>
                    <tr>
                      <td colspan=6></td>
                    </tr>
                </tbody>
            </table>
            <h2> Listado de equipos informáticos en espera de recogida </h2>
            <!-- Tabla para los equipos que estan en espera para recoger -->
            <table border=0 summary="Listado de equipos informáticos" id="listado2">
                <thead>
                    <tr>
                        <th> SAT </th>
                        <th> Nombre </th>
                        <th> Telefono </th>
                        <th> </th>
                        <th> Precio </th>
                        <th> </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        foreach (cargar_equipos(2) as $fila) {
                            echo "
                            <tr>
                                <td> ".$fila["id_sat"]."</a></td>
                                <td> ".obtener_nombre_cliente($fila["id_cliente"])."</td>
                                <td> ".obtener_tlfn_cliente($fila["id_cliente"])."</td>
                                <td> ".obtener_tlfn2_cliente($fila["id_cliente"])."</td>
                                <td> ".$fila["precio"]." €</td>
                                <td class='opciones'>
                                  <a href='sat.php?id=".$fila["id_sat"]."'>
                                    <i class='fa fa-eye fa-lg'></i>
                                  </a>
                                  <a href='acciones/cerrar_sat.php?id=".$fila["id_sat"]."'>
                                    <i class='fa fa-times fa-lg'></i>
                                  </a>
                                </td>
                            </tr>";
                        }
                    ?>
                    <tr>
                      <td colspan=6></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>
    <footer>
        <?php pintaFooter() ?>
    </footer>
</body>
</html>
