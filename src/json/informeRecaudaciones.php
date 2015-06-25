<?php
require_once("../configuracion/configuracion.php");
require_once("../funciones.php");

$data = array();
$anio = $_GET['anio'];

for ($i = 1; $i <= 12; $i++) {
    if ($i >= 10) {
        $mes = generar_json_informeRecaudaciones($i, $anio);
    }
    else {
        $mes = generar_json_informeRecaudaciones("0".$i, $anio);
    }

    $data[] = array(floatval($mes));
}

//Creamos el JSON
$json_string = json_encode($data);
echo $json_string;

?>
