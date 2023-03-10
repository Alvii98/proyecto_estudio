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
    static public function update($id,$count){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $query = "UPDATE familiar SET id_alumno = ".$count." WHERE id = ".$id;

        $datos_usuarios = mysqli_query($conn, $query);

        return $datos_usuarios;
    }
}


// print'<pre>';print_r(datos::alumnos());exit;