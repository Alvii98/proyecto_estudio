<?php

class valores{
    static public function precio_por_alumno($actividades){
        $actividad = array();
        $actividad_valores = array();
        foreach ($actividades as $value) {
            if($value == '') continue;
            $valor_actividad = datos::actividad_valores($value);
            $actividad_valores[] = $valor_actividad[0];
            $actividad[] = $valor_actividad[0]['actividad'];
        }
        sort($actividad_valores); 
        $valor = 0;
        $efectivo = 0;
        $temporal = '';
        foreach ($actividad_valores as $value) {
            # code...
            // print array_count_values($actividad)[$value['actividad']].'|<br>';
            if(array_count_values($actividad)[$value['actividad']] >= 2){
                if($temporal == $value['actividad']) continue;
    
                $temporal = $value['actividad'];
                $valor = $valor + $value['dos_veces'];
                $efectivo = $efectivo + $value['dos_veces_efec'];
            }else{
                $valor = $valor + $value['una_vez'];
                $efectivo = $efectivo + $value['una_vez_efec'];
            } 
        }
        // 10% de descuento por hacer mas de 1 actividad
        if(count(array_count_values($actividad)) >= 2){
    
            $porcentaje = intval($valor) * 10 / 100;
            $valor = intval($valor) - $porcentaje;
            
            $porcentaje = intval($efectivo) * 10 / 100;
            $efectivo = intval($efectivo) - $porcentaje;
        }

        return ['valor' => $valor,'efectivo' => $efectivo];
    }

    static public function precio_por_familia($alumnos){
        $valor = 0;
        $efectivo = 0;
        
        foreach ($alumnos as $value) {
            $valores = valores::precio_por_alumno($value['actividad']);

            $valor = $valor + intval($valores['valor']);
            $efectivo = $efectivo + intval($valores['efectivo']);
        }
        // 10% de descuento por ser familiares
        $porcentaje = $valor * 10 / 100;
        $valor = $valor - $porcentaje;
        
        $porcentaje = $efectivo * 10 / 100;
        $efectivo = $efectivo - $porcentaje;

        return ['valor' => $valor,'efectivo' => $efectivo];
    }
}

?>