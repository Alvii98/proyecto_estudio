<?php
require_once '../clases/consultas.php';
$json = new StdClass();
if(isset($_POST['baja'])){
    $json->respAlumno = datos::baja_alumno($_POST['id_alumno'],$_POST['baja']);
}else{

    $datos = json_decode(file_get_contents('php://input'));
    $array_update = ['id_alumno' => $datos->alumno->id_alumno,
    'apellido' => $datos->alumno->apellido,
    'nombre' => $datos->alumno->nombre,
    'foto_perfil' => $datos->alumno->foto_perfil,
    'fecha_nac' => $datos->alumno->fecha_nac,
    'edad' => $datos->alumno->edad,
    'nacionalidad' => $datos->alumno->nacionalidad,
    'documento' => $datos->alumno->documento,
    'domicilio' => $datos->alumno->domicilio,
    'localidad' => $datos->alumno->localidad,
    'tel_fijo' => $datos->alumno->tel_fijo,
    'tel_alumno' => $datos->alumno->tel_alumno,
    'correo' => $datos->alumno->correo,
    'actividad' => $datos->alumno->actividad,
    'salud' => $datos->alumno->salud,
    'notas' => $datos->alumno->notas,
    'observacion_alumno' => $datos->alumno->observacion_alumno];
    
    $json->respAlumno = datos::update_alumnos($array_update);
    
    foreach ($datos->familiares as $key) {
        $json->respFamiliar = datos::update_familiares($key->id_familiar,$key->nom_ape,$key->vinculo,$key->tel_familiar,$key->observacion_familiar);
    }
}
    
print json_encode($json);
?>