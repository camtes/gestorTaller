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
    </section>

    <section id="contenedor">
        <h2> SAT</h2>
        <section id="contenido">

        <?php
            foreach (cargar_sat($_GET["id"]) as $fila) {
                echo '
                    <form action="acciones/modificar_sat.php" method="post" id="sat">
                    <input type="hidden" name="fsat" value='.$_GET["id"].'>
                        <table summary="Nuevo sat" id="tablaNuevoSAT">
                          <tr>
                            <td>Nombre </td>
                            <td>Teléfono </td>
                            <td> Problema </td>
                          </tr>
                          <tr>
                            <td class="arriba">
                              <input type="text"  name="fnombre" value="'.obtener_nombre_cliente($fila["id_cliente"]).'" size=40 maxlength="50"  disabled>
                              <br>
                              Dirección <br>
                              <input type="text" name="fdireccion" value="'.obtener_direccion_cliente($fila["id_cliente"]).'" size=40 maxlength="50" disabled>
                            </td>
                            <td>
                              <input type="text" name="ftelefono" value="'.obtener_tlfn_cliente($fila["id_cliente"]).'" size=20 maxlength="9" disabled>
                              <input type="text" name="ftelefono" value="'.obtener_tlfn_cliente($fila["id_cliente"]).'" size=20 maxlength="9" disabled>
                            </td>
                            <td>
                              <textarea name="fproblema" rows="6" cols="74" disabled>'.$fila["problema"].'"</textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>REP <input type="text" name="frep" size=30 maxlength="10"  placeholder="Ultimo rep: '.ultimo_rep().'" value="'.$fila["rep"].'"></td>
                          </tr>
                          <tr></tr>
                          <tr>

                            <td>Informe</td>
                          </tr>
                          <tr>
                            <td colspan=4>
                              <textarea name="finforme" rows="7" cols="175" >'.$fila["informe"].'</textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>Piezas</td>
                          </tr>
                          <tr>
                            <td colspan=4>
                              <textarea name="fpiezas" rows="7" cols="175" >'.$fila["piezas"].'</textarea>
                            </td>
                          </tr>
                          <tr>
                            <td> Precio reparación </td>
                            <td> Precio piezas </td>

                          </tr>
                          <tr>
                                <td> <input type="number" name="fpreciorep" value="'.$fila["precio_rep"].'" size=10 ></td>
                                <td> <input type="number" name="fpreciopiezas" value="'.$fila["precio_piezas"].'" size=10 ></td>

                                <td colspan=2>';
                                if ($fila["estado"] == 2) {
                                  echo '<input type="checkbox" name="festado" value="2" checked> Cerrar SAT';
                                }
                                else {
                                  echo '<input type="checkbox" name="festado" value="2"> Cerrar SAT';
                                }
                                echo '
                                <input type="submit" value="Guardar sat" class="boton">
                                </td>
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
