<?php
require_once __DIR__.'/clases/consultas.php';

$actividades = datos::actividades();
$descuento_actividad = datos::actividades()[0]['descuento_actividad'];
$descuento_familiar = datos::actividades()[0]['descuento_familiar'];

// print'<pre>';print_r($actividades);exit;d

include_once __DIR__.('\templates\actividades_temp.php');
?>
