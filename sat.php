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
    <link rel="stylesheet" type="text/css" href="css/sat.css">
</head>
<body>
    <section id="cabecera">
        <?php pintaMenu() ?>
        <a id="botonMenu" href="#"><span><img src="img/menu.png"></span></a>
    </section>
    
    <section id="contenedor">
        <h2> SAT</h2>
        <section id="contenido">

        <?php
            foreach (cargar_sat($_GET["id"]) as $fila) {
                echo '
                    <form action="actions/modificar_sat.php" method="post" id="sat">
                    <input type="hidden" name="fsat" value='.$_GET["id"].'>
                        <table summary="Nuevo sat">
                            <tr>
                                <td>Nombre</td>
                                <td>Telefono</td>
                            </tr>
                            <tr>
                            <td><input type="text" name="fnombre" value="'.obtener_nombre_cliente($fila["id_cliente"]).'" 
                                    size=30 maxlength="50"  disabled></td>
                            <td>
                                <input type="text" name="ftelefono" value="'.obtener_tlfn_cliente($fila["id_cliente"]).'" 
                                        size=15 maxlength="9" disabled>
                                <input type="text" name="ftelefono2" value="'.obtener_tlfn2_cliente($fila["id_cliente"]).'" 
                                        size=15 maxlength="9" disabled>
                            </td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="fdireccion" value="'.obtener_direccion_cliente($fila["id_cliente"]).'" 
                                        size=50 maxlength="50" disabled></td>
                                <td>REP <input type="text" name="frep" size=30 maxlength="10"  placeholder="Ultimo rep: '.ultimo_rep().'" value="'.$fila["rep"].'"></td>
                            </tr>
                            <tr>
                                <td>Problema</td>
                            </tr>
                            <tr>
                                <td colspan=3>
                                    <textarea name="fproblema" rows="5" cols="67" disabled>
                                    '.$fila["problema"].'
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Informe</td>
                            </tr>
                            <tr>
                                <td colspan=3>
                                    <textarea name="finforme" rows="5" cols="67" >
                                    '.$fila["informe"].'
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Piezas</td>
                            </tr>
                            <tr>
                                <td colspan=3>
                                    <textarea name="fpiezas" rows="5" cols="67" >
                                    '.$fila["piezas"].'
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2> Precio reparación 
                                    <input type="number" name="fpreciorep" value="'.$fila["precio_rep"].'" size=5 > 
                                 Precio piezas 
                                    <input type="number" name="fpreciopiezas" value="'.$fila["precio_piezas"].'" size=5> </td>
                            <tr>
                                <td><input type="checkbox" name="festado" value="2"> Cerrar SAT</td>
                                <td><input type="submit" value="Guardar sat" class="derecha"></td>

                            </tr>
                        </table>
                    </form>';
            }            
        ?>
        </section>
    </section>
    <footer>
        <?php pintaFooter() ?>
    </footer>
    <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
    <script src="js/busqueda-clientes-rep.js"></script>
</body>
</html>