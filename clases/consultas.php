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
            $query = "SELECT a.id,a.apellido,a.nombre,a.edad,a.fecha_nac,a.actividad FROM alumnos a
            WHERE a.apellido LIKE '%".$ape."%' AND a.nombre LIKE '%".$nom."%'
            AND a.actividad LIKE '%".$activ."%' ORDER BY a.apellido ASC;";
        }else{
            $query = "SELECT a.id,a.apellido,a.nombre,a.edad,a.fecha_nac,a.actividad FROM alumnos a
            WHERE a.edad = ".$edad." ORDER BY a.apellido ASC";
        }

        return datos::respuestaQuery($query);
    }
    static public function busqueda_familiar($vinculo,$id = ''){

        $query = "SELECT DISTINCT id_alumno,vinculo FROM vinculos WHERE id_alumno = ".$id;  
        
        if(empty($id)){
            $query = "SELECT DISTINCT id_alumno,vinculo FROM vinculos WHERE vinculo LIKE '%".$vinculo."%'";  
        }

        return datos::respuestaQuery($query);
    }
    static public function vinculos(){

        $query = "SELECT * FROM vinculos ORDER BY vinculo ASC";    

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

    static public function actividades($id_actividad = ''){

        $query = "SELECT * FROM actividades_valores WHERE id =".$id_actividad;

        if (empty($id_actividad)) {
            $query = "SELECT * FROM actividades_valores order by actividad ASC";    
        }

        return datos::respuestaQuery($query);
    }

    static public function actividad_valores($actividad){

        $query = "SELECT actividad,una_vez,una_vez_efec,dos_veces,dos_veces_efec FROM actividades_valores 
        WHERE '".$actividad."' LIKE CONCAT('%',actividad,'%')";
        return datos::respuestaQuery($query);
    }
    static public function vinculo_existe($id_alumno,$nom_vinculo){

        $query = "SELECT * FROM vinculos WHERE id_alumno = ".$id_alumno." AND vinculo = '".$nom_vinculo."'";

        return datos::respuestaQuery($query);
    }

    static public function insert_datos($array){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "INSERT INTO alumnos(apellido, nombre, foto_perfil, fecha_nac, edad, nacionalidad, documento,
        domicilio, localidad, tel_fijo, tel_movil, mail, actividad, salud, observaciones) VALUES 
        ('".$array['apellido']."','".$array['nombre']."','".$array['foto_perfil']."','".$array['fecha_nac']."',".$array['edad'].",'".$array['nacionalidad']."',
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
        VALUES (".$array['id_alumno'].",'".$array['nom_ape']."','".$array['tel_familiar']."','".$array['vinculo']."','".$array['observacion_familiar']."')";
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }

    static public function insert_vinculo($id_alumno,$nom_vinculo){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $vinculo_existe = datos::vinculo_existe($id_alumno,$nom_vinculo);        
        if(!empty($vinculo_existe)){
            return $vinculo_existe;
        }
        $query = "INSERT INTO vinculos(id_alumno, vinculo)
        VALUES (".$id_alumno.",'".$nom_vinculo."')";
        
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
        actividad = '".$array['actividad']."', notas = '".$array['notas']."', salud = '".$array['salud']."',
        observaciones = '".$array['observacion_alumno']."' WHERE id = ".$array['id_alumno'];
        
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        return true;
    }
    static public function update_actividades($id,$actividad,$una,$una_efectivo,$dos,$dos_efectivo){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();    

        $query = "UPDATE actividades_valores SET actividad = '".$actividad."',una_vez = ".$una.",
        una_vez_efec= ".$una_efectivo.",dos_veces = ".$dos.",dos_veces_efec = ".$dos_efectivo." WHERE id = ".$id;
        
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
        
        $query = "DELETE FROM familiar WHERE id_alumno = ".$id;
        if (!mysqli_query($conn, $query)) {
            return mysqli_error($conn);
        }
        
        $query = "DELETE FROM vinculos WHERE id_alumno = ".$id;
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
    static public function delete_vinculo($id_alumno,$nom_vinculo){
        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection(); 

        $vinculo_existe = datos::vinculo_existe($id_alumno,$nom_vinculo);        
        if(empty($vinculo_existe)){
            return $vinculo_existe;
        }
        $query = "DELETE FROM vinculos WHERE id_alumno = ".$id_alumno." AND vinculo = '".$nom_vinculo."'";
        
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