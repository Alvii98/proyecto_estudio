<?php
require_once __DIR__.'/clases/consultas.php';
// Agrego el campo descuento en las actividades por ahora
datos::agregar_campo_tablabdd();
// print'<pre>';print_r(datos::actividades());exit;
$actividades = datos::actividades();

include_once __DIR__.('\templates\index_temp.php');
?>