<?php
require_once '../clases/consultas.php';
$json = new StdClass();

$datos = json_decode(file_get_contents('php://input'));
if(isset($datos->id_actividad)){
    $id_actividad = $datos->id_actividad;

    $json->respActividad = datos::actividades($id_actividad);

}else if(isset($datos->guardar_actividad)){

    $id = $datos->guardar_actividad->id_guardar_id;
    $actividad = $datos->guardar_actividad->id_guardar_actividad;
    $una = $datos->guardar_actividad->id_guardar_una;
    $una_efectivo = $datos->guardar_actividad->id_guardar_una_efectivo;
    $dos = $datos->guardar_actividad->id_guardar_dos;
    $dos_efectivo = $datos->guardar_actividad->id_guardar_dos_efectivo;

    $json->respGuardarActividad = datos::update_actividades($id,$actividad,$una,$una_efectivo,$dos,$dos_efectivo);

}else{
    $id1 = $datos->alumnos->id_alumno_1;
    $id2 = $datos->alumnos->id_alumno_2;
    $vinculo = $datos->alumnos->vinculo;
    
    $json->respVinculo = datos::insert_vinculo($id1,$id2,$vinculo);
}

print json_encode($json);

?>