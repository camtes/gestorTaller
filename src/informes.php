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
</head>
<body>
  <section id="cabecera">
      <?php pintaMenu() ?>
  </section>

  <section id="contenedor">
    <h2> Informes </h2>
    <section id="contenido">
      <div id="anioForm">
        <select name="anioInforme" id="anioInforme" class="select">
          <?php
          foreach (generarAnios() as $fila) {
            echo "<option value='".$fila["anio"]."'>".$fila["anio"]."</option>";
          }
          ?>
        </select>
        <button id="botonRefrescarInform" name="botonRefrescarInform" class="boton"> Refrescar informes </button>
      </div>
      <div id="informe1" style="width:100%; height:400px;"></div>
      <br >
      <br>
      <div id="informe2" style="width:100%; height:400px;"></div>
    </section   </section>
  <footer>
    <?php pintaFooter() ?>
  </footer>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="js/informes.js"></script>
</body>
</html>
