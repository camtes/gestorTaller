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
        <h2> Listado de equipos informáticos en el taller</h2>
        <section id="contenido">
            <table border=0 summary="Listado de equipos informáticos" id="listado">
                <thead>
                    <tr>
                        <th> REP </th>
                        <th> Nombre </th>
                        <th> Telefono </th>
                        <th> </th>
                        <th> Problema </th>
                        <th>  </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        if (existen_equipos(1) == 'false') {
                            echo "
                            <tr>
                                <td colspan=5> No hay ningún equipo en el taller </td>
                            </tr>";
                        } 
                        else {
                            foreach (cargar_equipos(1) as $fila) {
                                echo "
                                <tr>
                                    <td> ".$fila["rep"]."</a></td>
                                    <td> ".obtener_nombre_cliente($fila["id_cliente"])."</td>
                                    <td> ".obtener_tlfn_cliente($fila["id_cliente"])."</td>
                                    <td> ".obtener_tlfn2_cliente($fila["id_cliente"])."</td>
                                    <td> ".$fila["problema"]."</td>
                                    <td> <a href='#'> Editar </a> - <a href='#'> Cerrar </a> </td>
                                </tr>";
                            } 
                        }
                    ?>
                    
                    <!--
                    <tr>
                        <td><a href="#">01/14</a></td>
                        <td>Carlos</td>
                        <td>680482120</td>
                        <td>Se le cambia la fuente de alimentación y se vuelve a instalar windows 7Se le cambia la fuente de alimentación y se vuelve a instalar windows 7Se le cambia la fuente de alimentación y se vuelve a instalar windows 7Se le cambia la fuente de alimentación y se vuelve a instalar windows 7</td>
                        <td> Reparado </td>
                    </tr>
                    -->
                </tbody>
            </table>
            <h2> Listado de equipos informáticos en espera de recogida </h2>
            <table border=0 summary="Listado de equipos informáticos" id="listado">
                <thead>
                    <tr>
                        <th> REP </th>
                        <th> Nombre </th>
                        <th> Telefono </th>
                        <th> Solución </th>
                        <th>  </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        if (!existen_equipos(2)) {
                            echo "
                            <tr>
                                <td colspan=5> No hay ningún equipo reparado sin recoger </td>
                            </tr>";
                        } 
                        else {
                            foreach (cargarListaClientes() as $fila) {
                                echo "
                                <tr>
                                    <td> <a href='#'>".$fila["rep"]."</a></td>
                                    <td> ".obtener_nombre_cliente($fila["id_cliente"])."</td>
                                    <td> ".obtener_tlfn1_cliente($fila["telefono"])."</td>
                                    <td> ".obtener_tlfn1_cliente($fila["telefono2"])."</td>
                                    <td> ".$fila["problema"]."</td>
                                    <td> <a href='#'> cerrar </a> </td>
                                </tr>";
                            } 
                        }
                    ?>
                    <!--
                    <tr>
                        <td><a href="#">01/14</a></td>
                        <td>Carlos</td>
                        <td>680482120</td>
                        <td>Se le cambia la fuente de alimentación y se vuelve a instalar windows 7Se le cambia la fuente de alimentación y se vuelve a instalar windows 7Se le cambia la fuente de alimentación y se vuelve a instalar windows 7Se le cambia la fuente de alimentación y se vuelve a instalar windows 7</td>
                        <td> Reparado </td>
                    </tr>
                    -->
                </tbody>
            </table>
        </section>
    </section>
    <footer>
        <?php pintaFooter() ?>
    </footer>
</body>
</html>
