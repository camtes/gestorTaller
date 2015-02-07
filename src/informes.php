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
    <h2> Informes </h2>
    <section id="contenido">
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
