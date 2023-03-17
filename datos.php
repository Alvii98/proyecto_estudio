<?php
require_once 'clases/consultas.php';

if(!isset($_GET['id'])) header('Location: index.php');

$alumno = datos::alumno_id($_GET['id']);
if(empty($alumno)) header('Location: index.php');
$alumno = $alumno[0];
$actividades = explode('|',$alumno['actividad']);

// print'<pre>';print_r(count($alumno));exit;
$familiar = datos::familiar($_GET['id']);

include __DIR__.('\templates\partials\camara.php');
include __DIR__.('\templates\partials\header.php');
include __DIR__.('\templates\datos.php');
?>