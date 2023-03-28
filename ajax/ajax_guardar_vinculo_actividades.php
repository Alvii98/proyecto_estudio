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
    $id_alumno = $datos->alumnos->id_alumno;
    $nom_vinculo = $datos->alumnos->nom_vinculo;

    if($nom_vinculo == '0') $nom_vinculo = $datos->alumnos->nom_vinculo_nuevo;
    
    if(isset($datos->alumnos->desvincular)){
        $json->respVinculo = datos::delete_vinculo($id_alumno,$nom_vinculo);
    }else{
        $json->respVinculo = datos::insert_vinculo($id_alumno,$nom_vinculo);
    }
}

print json_encode($json);

?>