<?php
require_once("../configuracion/configuracion.php");
require_once("../funciones.php");

$data = array();

for ($i = 1; $i <= 12; $i++) {
    if ($i >= 10) {
        $mes = generar_json_informes($i);
    }
    else {
        $mes = generar_json_informes("0".$i);
    }

    switch($i) {
        case 1:
            $data[] = array('Enero'=> $mes);
            break;
        case 2:
            $data[] = array('Febrero'=> $mes);
            break;
        case 3:
            $data[] = array('Marzo'=> $mes);
            break;
        case 4:
            $data[] = array('Abril'=> $mes);
            break;
        case 5:
            $data[] = array('Mayo'=> $mes);
            break;
        case 6:
            $data[] = array('Junio'=> $mes);
            break;
        case 7:
            $data[] = array('Julio'=> $mes);
            break;
        case 8:
            $data[] = array('Agosto'=> $mes);
            break;
        case 9:
            $data[] = array('Septiembre'=> $mes);
            break;
        case 10:
            $data[] = array('Octubre'=> $mes);
            break;
        case 11:
            $data[] = array('Noviembre'=> $mes);
            break;
        case 12:
            $data[] = array('Diciembre'=> $mes);
            break;

    }
}

//Creamos el JSON
$json_string = json_encode($data);
echo $json_string;

?>
