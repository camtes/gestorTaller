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
  <link rel="stylesheet" type="text/css" href="css/rep.css">
</head>
<body>
  <section id="cabecera">
      <?php pintaMenu() ?>
  </section>

  <section id="contenedor">
    <h2> Nuevo SAT</h2>
    <section id="contenido">
      <form action="" method="" id="busq_cliente">
          Buscar cliente
          <input type="text" name="b-name" id="b-name" size=30 maxlength="50" required>
          <button id="buscar" name="buscar" class="boton">Buscar</button>
      </form>

      <table summary="Listado de clientes" id="listado" visible="false">
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
                          <td> <a class='name' id='cliente_nuevo_rep'
                              href='nuevo.php?cliente=".$fila["id_cliente"]."'>".$fila["nombre"]."</a></td>
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

  <!-- Formulario para crear nuevo REP, si hay valores por referencia lo rellenamos-->
  <!-- Compruebo si hemos seleccionado un usuario o lo introducimos a mano -->
  <?php
      if ($_GET["cliente"] > 0) {
          foreach (cargarDatosCliente($_GET["cliente"]) as $fila) {
              echo '
                  <form action="acciones/nuevo_sat.php" method="post" id="nuevo_sat">
                  <input type="hidden" name="fcliente" value='.$_GET["cliente"].'>
                  <input type="hidden" name="fexiste_cliente" value="true">
                      <table summary="Nuevo sat">
                          <tr>
                              <td>Nombre</td>
                              <td>Telefono</td>
                          </tr>
                          <tr>
                          <td><input type="text" name="fnombre" value="'.$fila["nombre"].'"
                                  size=50 maxlength="50"  disabled></td>
                          <td>
                              <input type="number" name="ftelefono" value="'.$fila["telefono"].'"
                                      size=30 maxlength="9" disabled>
                              <input type="number" name="ftelefono2" value="'.$fila["telefono2"].'"
                                      size=30 maxlength="9" disabled>
                          </td>
                          </tr>
                          <tr>
                              <td>Dirección <input type="text" name="fdireccion" value="'.$fila["direccion"].'"
                                      size=50 maxlength="50" disabled></td>
                              <td>REP <input type="text" name="frep" size=25 maxlength="9"
                                      placeholder="Ultimo rep: '.ultimo_rep().'"></td>
                          </tr>
                          <tr>
                              <td>Problema</td>
                          </tr>
                          <tr>
                              <td colspan=3>
                                  <textarea name="fproblema" rows="10" cols="92" required></textarea>
                              </td>
                          </tr>
                          <tr>
                              <td colspan=3><input type="submit" value="Crear sat" class="boton"></td>
                          </tr>
                      </table>
                  </form>';
          }
      }
      else {
          echo '
              <form action="acciones/nuevo_sat.php" method="post" id="nuevo_sat">
                  <input type="hidden" name="fexiste_cliente" value="false">
                  <table summary="Nuevo sat">
                  <tr>
                      <td>Nombre</td>
                      <td>Telefono</td>
                  </tr>
                  <tr>
                    <td><input type="text" name="fnombre" size=50 maxlength="50" required></td>
                  <td>
                      <input type="number" name="ftelefono" size=30 max="999999999" >
                      <input type="number" name="ftelefono2" size=30 max="999999999">
                  </td>
                  </tr>
                  <tr>
                      <td>Dirección <input type="text" name="fdireccion" size=50 maxlength="50" ></td>
                      <td>REP <input type="text" name="frep" size=25 maxlength="9" placeholder="Ultimo rep: '.ultimo_rep().'"></td>
                  </tr>
                  <tr>
                      <td>Problema</td>
                  </tr>
                  <tr>
                      <td colspan=3>
                          <textarea name="fproblema" rows="10" cols="92" required></textarea>
                      </td>
                  </tr>
                  <tr>
                      <td colspan=3><input type="submit" value="Crear sat" class="boton" ></td>
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
