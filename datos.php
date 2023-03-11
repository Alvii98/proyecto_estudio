<?php
require_once 'clases/consultas.php';

if(!isset($_POST['id'])) header('Location: index.php');

$alumno = datos::alumno_id($_POST['id'])[0];


$apellido = $alumno['apellido'];
$nombre = $alumno['nombre'];
$documento = $alumno['documento'];
$fecha_nac = $alumno['fecha_nac'];
$edad = datos::obtener_edad($alumno['fecha_nac']);
$domicilio = $alumno['domicilio'];
$localidad = $alumno['localidad'];
$tel_fijo = $alumno['tel_fijo'];
$tel_movil = $alumno['tel_movil'];
$mail = $alumno['mail'];
$actividad = $alumno['actividad'];
$observaciones = $alumno['observaciones'];

$familiar = datos::familiar($_POST['id'])[0];

$vinculo = $familiar['vinculo'];
$nom_ape = $familiar['nombre_apellido'];
$telefono = $familiar['telefono'];
$observacion = $familiar['observacion'];

//print'<pre>';print_r($familiar);exit;

include __DIR__.('\templates\partials\header.php');
include __DIR__.('\templates\datos.php');
?>