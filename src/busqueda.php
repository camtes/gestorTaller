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
  <link rel="stylesheet" type="text/css" href="css/busqueda.css">
  <?php pintaHeader() ?>
</head>
<body>
  <section id="cabecera">
      <?php pintaMenu() ?>
  </section>

  <section id="contenedor">
    <h2> Búsqueda </h2>
    <section id="contenido">
      <form id="formSearchRtusEP">
        <span class="form"><i class="fa fa-search"></i></span>
        <input class="form-control" type="text" placeholder="Buscar por REP: 1/15">
        <input type="submit" class="boton" value="Buscar">
      </form>
    </section>
  </section>
  <footer>
    <?php pintaFooter() ?>
  </footer>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="js/informes.js"></script>
</body>
</html>