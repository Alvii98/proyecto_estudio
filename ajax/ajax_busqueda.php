<?php
require_once '../clases/consultas.php';

$json = new StdClass();

$json->datos = datos::busqueda($_POST['apellido'],$_POST['nombre'],$_POST['edad'],$_POST['actividad']);

print json_encode($json);

?>