<?php
require_once '../clases/consultas.php';

$json = new StdClass();

$datos = datos::alumnos();

$json->resp = $datos;

print json_encode($json);

?>