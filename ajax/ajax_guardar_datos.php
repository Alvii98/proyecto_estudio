<?php
require_once '../clases/consultas.php';
$json = new StdClass();
$json->respAlumno = '';
$json->error = '';
$datos = json_decode(file_get_contents('php://input'));
$id = !empty(datos::alumnos()) ? max(datos::alumnos())['id']+1 : 1;
$file = '';
if(!empty($datos->alumno->foto_perfil)){
    $img = $datos->alumno->foto_perfil;
    if(strpos($img, 'data:image/png;base64,') !== FALSE){
        $img = str_replace('data:image/png;base64,', '', $img);
    }elseif (strpos($img, 'data:image/jpg;base64,') !== FALSE) {
        $img = str_replace('data:image/jpg;base64,', '', $img);
    }elseif (strpos($img, 'data:image/jpeg;base64,') !== FALSE) {
        $img = str_replace('data:image/jpeg;base64,', '', $img);
    }
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = 'img/perfil/foto_'.$id.'.png';
    $success = file_put_contents('../'.$file, $data);
}
$array_insert = ['apellido' => $datos->alumno->apellido,
                'nombre' => $datos->alumno->nombre,
                'foto_perfil' => $file,
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
                'observacion_alumno' => $datos->alumno->observacion_alumno];

if(!empty(trim($array_insert['fecha_nac']))){
    $json->respAlumno = datos::insert_datos($array_insert);
    // $json->respAlumno = $array_insert;
}else{
    $json->error = 'Complete los campos requeridos';
}

print json_encode($json);
?>