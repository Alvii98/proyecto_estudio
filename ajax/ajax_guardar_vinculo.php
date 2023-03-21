<?php
require_once '../clases/consultas.php';
$json = new StdClass();

$datos = json_decode(file_get_contents('php://input'));

$id1 = $datos->alumnos->id_alumno_1;
$id2 = $datos->alumnos->id_alumno_2;
$vinculo = $datos->alumnos->vinculo;

$json->respVinculo = datos::insert_vinculo($id1,$id2,$vinculo);

print json_encode($json);

?>