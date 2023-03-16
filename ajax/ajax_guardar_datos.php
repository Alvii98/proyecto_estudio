<?php
require_once '../clases/consultas.php';
$json = new StdClass();
$datos = json_decode(file_get_contents('php://input'));

$array_insert = ['apellido' => $datos->alumno->apellido,
                'nombre' => $datos->alumno->nombre,
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

$json->respAlumno = datos::insert_datos($array_insert);


print json_encode($json);
?>