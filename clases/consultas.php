<?php
require_once __DIR__ . '/SingletonConexion.php';
class datos{
    static public function respuestaQuery($query){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $datos_usuarios = mysqli_query($conn, $query);

        return $datos_usuarios->fetch_all(MYSQLI_ASSOC); 
    }
    static public function alumnos(){

        $query = "SELECT * FROM alumnos";    

        return datos::respuestaQuery($query);
    }
    static public function alumno_id($id){

        $query = "SELECT * FROM alumnos WHERE id =".$id." LIMIT 1";    

        return datos::respuestaQuery($query);
    }
    static public function familiar($id){

        $query = "SELECT * FROM familiar WHERE id_alumno = ".$id;    

        return datos::respuestaQuery($query);
    }    
    static public function update($id,$count){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $query = "UPDATE familiar SET id_alumno = ".$count." WHERE id = ".$id;

        $datos_usuarios = mysqli_query($conn, $query);

        return $datos_usuarios;
    }
    static public function obtener_edad($fecha_nac){
        
        $arr = explode('/', $fecha_nac);
        $fecha_nac = $arr[2].'-'.$arr[1].'-'.$arr[0];
        
        $nacimiento = new DateTime($fecha_nac);
        $actual = new DateTime(date("Y-m-d"));

        $diferencia = $actual->diff($nacimiento);

        return $diferencia->format("%y");
    }
}


// print'<pre>';print_r(datos::alumnos());exit;