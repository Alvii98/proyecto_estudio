<?php
require_once __DIR__.'/clases/consultas.php';

$actividades = datos::actividades();

include_once __DIR__.('\templates\index_temp.php');
?>