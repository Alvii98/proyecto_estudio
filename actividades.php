<?php
require_once __DIR__.'/clases/consultas.php';

$actividades = datos::actividades();

// print'<pre>';print_r($actividades);exit;

include_once __DIR__.('\templates\actividades_temp.php');
?>