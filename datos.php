<?php
require_once __DIR__.'/clases/consultas.php';

if(!isset($_GET['id'])) header('Location: index.php');

$alumno = datos::alumno_id($_GET['id']);

$vinculo = datos::vinculos($_GET['id']);

if(empty($alumno)) header('Location: index.php');
$alumno = $alumno[0];
$actividades = explode('|',$alumno['actividad']);
$actividad = array();
foreach ($actividades as $value) {
    # code...
    if(strpos($value, '(')){
        $actividad[] = trim(explode('(',$value)[0]);
    }
    if(!strpos($value, '(') && strpos($value, '-')){
        $actividad[] = trim(explode('-',$value)[0]);
    }
}
$valores = array();
$valor = 0;
$efectivo = 0;
// array_count_values se fija si la actividad esta mas de una vez
foreach (array_count_values($actividad) as $activ => $value) {
    # code...
    // tiene un descuento si hace la actividad mas de una vez
    if($value >= 2){
        $valor_actividad = datos::actividad_valor_dos_vez($activ);
    }else {
        $valor_actividad = datos::actividad_valor_una_vez($activ);
    }
    if(empty($valor_actividad)) continue;

    $valor = $valor + $valor_actividad[0]['valor'];
    $efectivo = $efectivo + $valor_actividad[0]['efectivo'];
}

// 10% de descuento por familiares 
if(!empty($vinculo)){
    
    $porcentaje = intval($valor) * 10 / 100;
    $valor = intval($valor) - $porcentaje;

    $porcentaje = intval($efectivo) * 10 / 100;
    $efectivo = intval($efectivo) - $porcentaje;
}

$valor = number_format($valor, 2, ',', ' ');
$efectivo = number_format($efectivo, 2, ',', ' ');

$familiar = datos::familiar($_GET['id']);

include_once __DIR__.('\templates\datos_temp.php');
?>