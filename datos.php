<?php
error_reporting(0);
require_once __DIR__.'/clases/consultas.php';
require_once __DIR__.'/clases/calcular_precio.php';

if(!isset($_GET['id']) && !isset($_GET['vinculo'])) header('Location: index.php');

$combo_actividades = datos::actividades();

if(isset($_GET['id'])){
    $alumno = datos::alumno_id($_GET['id']);
    
    $vinculo = datos::busqueda_familiar('',$_GET['id']);
    

    if(empty($alumno)) header('Location: index.php');

    $alumno = $alumno[0];
    $actividades = explode('|',$alumno['actividad']);

    $valores = valores::precio_por_alumno($actividades);

    $valor = number_format($valores['valor'], 2, ',', ' ');
    $efectivo = number_format($valores['efectivo'], 2, ',', ' ');
    $combo = number_format($valores['combo'], 2, ',', ' ');

    $familiar = datos::familiar($_GET['id']);

    include_once __DIR__.('\templates\datos_temp.php');


}elseif(isset($_GET['vinculo'])){

    $vinculos = datos::busqueda_familiar_datos($_GET['vinculo']);
    $alumnos = array();
    foreach ($vinculos as $value) {
        # code...
        $nombre_vinculo = $value['debemes'];
        $debe_info = $value['info_deuda'];
        $alumno = datos::alumno_id($value['id_alumno']);

        $alumnos[] = array('id' => $alumno[0]['id'],
                    'apellido' => $alumno[0]['apellido'],
                    'nombre' => $alumno[0]['nombre'],
                    'actividad' => explode('|',$alumno[0]['actividad']));
    }
    // print'<pre>';print_r($alumnos);exit;
    
    $valores = valores::precio_por_familia($alumnos);
    
    $valor = number_format($valores['valor'], 2, ',', ' ');
    $efectivo = number_format($valores['efectivo'], 2, ',', ' ');
    $combo = number_format($valores['combo'], 2, ',', ' ');

    include_once __DIR__.('\templates\datos_vinculo_temp.php');

}
?>