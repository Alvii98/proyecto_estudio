<?php
require_once '../clases/consultas.php';
// $_POST['alumno']	
$array_insert = array();
$array_insert = ['apellido' => $_POST['apellido'],
                'nombre' => $_POST['nombre'],
                'fecha_nac' => $_POST['fecha_nac'],
                'edad' => $_POST['edad'],
                'nacionalidad' => $_POST['nacionalidad'],
                'documento' => $_POST['documento'],
                'domicilio' => $_POST['domicilio'],
                'localidad' => $_POST['localidad'],
                'tel_fijo' => $_POST['tel_fijo'],
                'tel_movil' => $_POST['tel_movil'],
                'mail' => $_POST['mail'],
                'actividad' => $_POST['actividad'],
                'salud' => $_POST['salud'],
                'observaciones' => $_POST['observaciones']];

print'<pre>';print_r(datos::insert_datos($array_insert));exit;