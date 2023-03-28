<?php
require_once '../clases/consultas.php';

$json = new StdClass();
$datos = datos::busqueda(trim($_POST['apellido']),trim($_POST['nombre']),trim($_POST['edad']),trim($_POST['actividad']));

$alumnos = array();
foreach ($datos as $value) {
    if($value['edad'] != datos::obtener_edad($value['fecha_nac'])){
        datos::update_acomodar_edad($value['id'],datos::obtener_edad($value['fecha_nac']));
    }
    $alumnos[] = ['id' => $value['id'],
                'apellido' => $value['apellido'],
                'nombre' => $value['nombre'],
                'vinculo' =>'Sin vinculo',
                'edad' => datos::obtener_edad($value['fecha_nac']),
                'actividad' => str_replace("|", "<br>", $value['actividad'])];
}
if(!empty(trim($_POST['apellido']))){

    $datos2 = datos::busqueda_familiar(trim($_POST['apellido']));
    $vinculo = '';
    foreach ($datos2 as $value) {
        if($vinculo == $value['vinculo']) continue;
        $vinculo = $value['vinculo'];
        
        $alumnos[] = ['id' => '0',
        'apellido' => $value['vinculo'],
        'nombre' => '',
        'vinculo' => 'Familia',
        'edad' => '',
        'actividad' => ''];
        
    }
}
$json->datos = $alumnos ;

print json_encode($json);

?>