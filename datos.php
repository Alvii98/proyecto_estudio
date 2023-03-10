<?php
require_once 'clases/consultas.php';
$alumno = datos::alumno_id($_POST['id'])[0];
$nombre = $alumno['nombre'];
// print'<pre>';print_r(datos::alumno_id($_POST['id'])[0]['nombre']);exit;

include __DIR__.('\templates\partials\header.php');
include __DIR__.('\templates\datos.php');
?>