<?php
require_once __DIR__.'/clases/consultas.php';

$combo_actividades = datos::actividades();

include_once __DIR__.('\templates\cargas_temp.php');
?>