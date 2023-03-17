<?php
require_once '../clases/consultas.php';

$json = new StdClass();

$eliminar = datos::eliminar_alumno(trim($_POST['id']));

$json->resp = $eliminar ;

print json_encode($json);

?>