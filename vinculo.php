<?php
require_once __DIR__.'/clases/consultas.php';

$alumnos = datos::alumnos();


include_once __DIR__.('\templates\vinculo_temp.php');
?>