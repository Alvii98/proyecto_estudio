<?php
require_once __DIR__.'/clases/consultas.php';

$alumnos = datos::alumnos();

$vinculos = datos::vinculos();

include_once __DIR__.('\templates\vinculo_temp.php');
?>