<?php
require_once 'clases/consultas.php';

if(!isset($_POST['id'])) header('Location: index.php');

$alumno = datos::alumno_id($_POST['id'])[0];

// if(!empty($alumno['fecha_nac'])){
//     $arr = explode('/', $alumno['fecha_nac']);
//     $fecha_nac = $arr[2].'-'.$arr[1].'-'.$arr[0];
//     $edad = datos::obtener_edad($alumno['fecha_nac']);
// }

$familiar = datos::familiar($_POST['id']);

//print'<pre>';print_r($familiar);exit;

include __DIR__.('\templates\partials\header.php');
include __DIR__.('\templates\datos.php');
?>