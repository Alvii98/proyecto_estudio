<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos personales</title>
    <!-- BOOTSTRAP 4.6 -->
    <link rel="stylesheet" href="libs/bootstrap-4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/bootstrap-icons/font/bootstrap-icons.css">
    <!-- JQUERY -->
    <script src="libs/jquery-3.5.1.min.js"></script>
    <!-- ALERTIFY -->
	<link rel="stylesheet" href="libs/alertifyjs/css/alertify.min.css" />
	<link rel="stylesheet" href="libs/alertifyjs/css/themes/default.min.css" />
	<script src="libs/alertifyjs/alertify.min.js"></script>
	<script src="libs/alertifyjs/settings.js"></script>
    <!-- JS PARA LOGIN -->
    <script src="js/ajax_editar_datos.js?<?php print time();?>"></script>
    <script src="js/funciones.js?<?php print time();?>"></script>
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/estilo.css?<?php print time();?>">
    <link rel="stylesheet" href="css/camara.css?<?php print time();?>">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Datos personales</h3>
            </div>
        </div>
    </div>
    <div class="container border rounded mb-4">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="form-group col-md-3 float-right d-flex justify-content-center">
                    <div class="perfil-img">
                        <a id="tomar_foto" class="tomar_foto">Tomar foto</a>
                        <img src="img/icono.jpg" class="rounded-circle" height="125" width="130"/>
                        <div class="file">
                            Cambiar foto
                            <input type="file" name="fotoPerfil" id="fotoPerfil"/>
                        </div>
                    </div>
                </div>
                <div class="form-group float-left">
                    <!-- border-radius: 50rem!important;position: absolute;bottom: 72%;left: 1%; -->
                    <a class="btn btn-dark btn-lg rounded-pill" href="index.php" style="position: absolute;">Volver</a>
                </div>
                <div class="form-group col-md-3 float-left mt-datos">
                    <label for="exampleFormControlInput1">Apellido</label>
                    <input type="hidden" id="id_alumno" value="<?php print$alumno['id'];?>">
                    <input type="text" readonly="true" id="apellido" class="form-control" value="<?php print$alumno['apellido'];?>">
                </div>
                <div class="form-group col-md-3 float-left mt-datos">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" readonly="true" id="nombre" class="form-control" value="<?php print$alumno['nombre'];?>">
                </div>
                <div class="form-group col-md-1 float-left mt-datos">
                    <label for="exampleFormControlInput1">Edad</label>
                    <input type="text" readonly="true" id="edad" class="form-control" value="<?php print datos::obtener_edad($alumno['fecha_nac']);?>">
                </div>
                <div class="form-group col-md-2 float-left mt-datos">
                    <label for="exampleFormControlInput1">Fecha de nac.</label>
                    <input type="date" readonly="true" id="fecha_nac" class="form-control" value="<?php print$alumno['fecha_nac'];?>">
                </div>
            </div>
            <?php if(empty($alumno['actividad'])){?>
                <div class="col-md-12">
                    <div class="form-group col-md-12 float-left">
                        <label>Actividad 1</label>
                        <i class="bi bi-plus-circle-dotted agregar_actividad" title="Agregar actividad" id="agregar_actividad"></i>
                        <textarea class="form-control" readonly="tue" id="actividad"></textarea>        
                    </div>
                </div>
            <?php } ?>
            <?php foreach ($actividades as $key => $value) { if(empty(trim($value))) continue;?>
                <div class="col-md-12">
                    <div class="form-group col-md-12 float-left">
                        <label>Actividad <?php print$key+1;?> </label>
                        <?php if($key == 0) { ?>
                            <i class="bi bi-plus-circle-dotted agregar_actividad" title="Agregar actividad" id="agregar_actividad"></i>
                        <?php }else{ ?>
                            <i class="bi bi-dash-circle-dotted eliminar_actividad" title="Eliminar actividad" id="eliminar_actividad"></i>
                        <?php } ?>
                        <textarea class="form-control" readonly="tue" id="actividad"><?php print trim($value);?></textarea>        
                    </div>
                </div> 
            <?php } ?>
            <div id="nueva_actividad" class="col-md-12"></div>
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>Observacion</label>
                    <textarea class="form-control" readonly="tue" id="observacion_alumno"><?php print$alumno['observaciones'];?></textarea>        
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Documento</label>
                    <input type="text" readonly="true" id="documento" class="form-control" value="<?php print$alumno['documento'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Correo</label>
                    <input type="text" readonly="true" id="correo" class="form-control" value="<?php print$alumno['mail'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Tel. movil</label>
                    <input type="text" readonly="true" id="tel_alumno" class="form-control" value="<?php print$alumno['tel_movil'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Tel. fijo</label>
                    <input type="text" readonly="true" id="tel_fijo" class="form-control" value="<?php print$alumno['tel_fijo'];?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Nacionalidad</label>
                    <input type="text" readonly="true" id="nacionalidad" class="form-control" value="<?php print$alumno['nacionalidad'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Localidad</label>
                    <input type="text" readonly="true" id="localidad" class="form-control" value="<?php print$alumno['localidad'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Domicilio</label>
                    <input type="text" readonly="true" id="domicilio" class="form-control" value="<?php print$alumno['domicilio'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Salud</label>
                    <input type="text" readonly="true" id="salud" class="form-control" value="<?php print$alumno['salud'];?>">
                </div>
            </div>
            <?php if(!empty($familiar)){ ?>
                <div class="col-md-12">
                    <h3 class="ml-3 mt-3">Familiares</h3>
                </div>
            <?php } ?>
            <?php 
                foreach ($familiar as $value) { 
                if(empty($value['nombre_apellido']) && empty($value['vinculo']) && empty($value['telefono'])) continue;
            ?>
                <div class="col-md-12">
                    <div class="form-group col-md-4 float-left">
                        <label for="exampleFormControlInput1">Nombre y apellido</label>
                        <input type="hidden" id="id_familiar" value="<?php print$value['id'];?>">
                        <input type="text" readonly="true" id="nom_ape" class="form-control" value="<?php print$value['nombre_apellido'];?>">
                    </div>
                    <div class="form-group col-md-4 float-left">
                        <label for="exampleFormControlInput1">Vinculo</label>
                        <input type="text" readonly="true" id="vinculo" class="form-control" value="<?php print$value['vinculo'];?>">
                    </div>
                    <div class="form-group col-md-4 float-left">
                        <label for="exampleFormControlInput1">Telefono</label>
                        <input type="text" readonly="true" id="tel_familiar" class="form-control" value="<?php print$value['telefono'];?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12 float-left">
                        <label>Observacion</label>
                        <textarea class="form-control" readonly="tue" id="observacion_familiar"><?php print$value['observacion'];?></textarea>        
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12 mb-4 mt-3">
                <div class="form-group col-md-12">
                    <button id="editar_datos" class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mr-3">Editar datos</button>
                    <button id="eliminar_alumno" class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mr-3">Eliminar alumno</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>