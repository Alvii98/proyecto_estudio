<?php
require_once __DIR__ . '/SingletonConexion.php';
class datos{
    static public function respuestaQuery($query){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $datos_usuarios = mysqli_query($conn, $query);

        return $datos_usuarios->fetch_all(MYSQLI_ASSOC); 
    }
    static public function busqueda($ape,$nom,$edad,$activ){

        if(empty($edad)){
            $query = "SELECT id,apellido,nombre,edad,fecha_nac,actividad FROM alumnos 
            WHERE apellido LIKE '%".$ape."%' AND nombre LIKE '%".$nom."%'
            AND actividad LIKE '%".$activ."%' ORDER BY apellido ASC";
        }else{
            $query = "SELECT id,apellido,nombre,edad,fecha_nac,actividad FROM alumnos 
            WHERE edad = ".$edad." ORDER BY apellido ASC";
        }

        return datos::respuestaQuery($query);
    }

    static public function alumnos(){

        $query = "SELECT * FROM alumnos ORDER BY apellido ASC";    

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

    static public function insert_datos($array){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "INSERT INTO alumnos(apellido, nombre, foto_perfil, fecha_nac, edad, nacionalidad, documento,
        domicilio, localidad, tel_fijo, tel_movil, mail, actividad, salud, observaciones) VALUES 
        ('".$array['apellido']."','".$array['nombre']."','".$array['foto_perfil']."','".$array['fecha_nac']."','".$array['edad']."','".$array['nacionalidad']."',
        '".$array['documento']."','".$array['domicilio']."','".$array['localidad']."','".$array['tel_fijo']."','".$array['tel_alumno']."',
        '".$array['correo']."','".$array['actividad']."','".$array['salud']."','".$array['observacion_alumno']."')";
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }

    static public function insert_familiar($array){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "INSERT INTO familiar(id_alumno, nombre_apellido, telefono, vinculo, observacion)
        VALUES ('".$array['id_alumno']."','".$array['nom_ape']."','".$array['tel_familiar']."','".$array['vinculo']."','".$array['observacion_familiar']."')";
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }
    static public function update_alumnos($array){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $query = "UPDATE alumnos SET apellido = '".$array['apellido']."', nombre = '".$array['nombre']."', foto_perfil = '".$array['foto_perfil']."',
        fecha_nac = '".$array['fecha_nac']."', edad = '".$array['edad']."', nacionalidad = '".$array['nacionalidad']."',
        documento = '".$array['documento']."',domicilio = '".$array['domicilio']."',localidad = '".$array['localidad']."',
        tel_fijo = '".$array['tel_fijo']."', tel_movil = '".$array['tel_alumno']."', mail = '".$array['correo']."',
        actividad = '".$array['actividad']."', salud = '".$array['salud']."',
        observaciones = '".$array['observacion_alumno']."' WHERE id = ".$array['id_alumno'];
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }

    static public function update_familiares($id,$nom_ape,$vinculo,$tel,$observacion){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $query = "UPDATE familiar SET nombre_apellido = '".$nom_ape."',telefono = '".$tel."',
        vinculo = '".$vinculo."', observacion = '".$observacion."' WHERE id = ".$id;
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }
    static public function update_acomodar_edad($id,$edad){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $query = "UPDATE alumnos SET edad = '".$edad."' WHERE id = ".$id;
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }
    static public function update_actividad($id,$actividad){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $query = "UPDATE alumnos SET actividad = '".$actividad."' WHERE id = ".$id;
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }
    static public function delete_alumno($id){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $query = "DELETE FROM alumnos WHERE id = ".$id;
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }
    static public function delete_familiar($id){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $query = "DELETE FROM familiar WHERE id = ".$id;
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }

    static public function obtener_edad($fecha_nac){
        
        // $arr = explode('/', $fecha_nac);
        // $fecha_nac = $arr[2].'-'.$arr[1].'-'.$arr[0];
        
        $nacimiento = new DateTime($fecha_nac);
        $actual = new DateTime(date("Y-m-d"));

        $diferencia = $actual->diff($nacimiento);

        return $diferencia->format("%y");
    }
}

// foreach (datos::alumnos() as $key) {
//     # code...
//     $arr = explode('|', $key['actividad']);
//     $dato = '';
//     foreach ($arr as $key2) {
//         # code...
//         $dato .= $key2;
//         // echo $key2.'|';
//     }
//     echo $dato.'|';
//     echo $key['id'].'<br>';
//     // datos::update_actividad($key['id'],$dato);
// }
// exit;
// print'<pre>';print_r(datos::alumnos());exit;