<?php
require_once '../clases/consultas.php';

$json = new StdClass();
$datos = datos::busqueda(trim($_POST['apellido']),trim($_POST['nombre']),trim($_POST['edad']),trim($_POST['actividad']));
$alumnos = array();
foreach ($datos as $key) {
    if($key['edad'] != datos::obtener_edad($key['fecha_nac'])){
        datos::update_acomodar_edad($key['id'],datos::obtener_edad($key['fecha_nac']));
    }
    # code...
    $alumnos[] = ['id' => $key['id'],
                'apellido' => $key['apellido'],
                'nombre' => $key['nombre'],
                'vinculo' => $key['vinculo'] == null ? 'Sin vinculo' : $key['vinculo'],
                'edad' => datos::obtener_edad($key['fecha_nac']),
                'actividad' => str_replace("|", "<br>", $key['actividad'])];
}

$json->datos = $alumnos ;

print json_encode($json);

?>