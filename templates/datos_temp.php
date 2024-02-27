<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del alumno/a</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
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
    <script src="js/foto_perfil.js?<?php print time();?>"></script>
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/camara.css?<?php print time();?>">
    <link rel="stylesheet" href="css/estilo.css?<?php print time();?>">
</head>
<body>
    <?php include('partials\header_temp.php'); ?>
    <?php include('partials\camara_temp.php'); ?>
    
    <?php if($valor == '0,00' || $efectivo == '0,00'){?>
        <script>
             alertify.alert('Datos del alumno/a','No se pudo cargar el monto a pagar, revice el nombre de las actividades o los valores por favor.')
        </script>    
    <?php } ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Datos del alumno/a</h3>
            </div>
        </div>
    </div>
    <div class="container border border-color rounded mb-4">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="form-group float-left">
                    <a class="btn btn-dark btn-lg rounded-pill" href="index.php">Volver</a>
                </div>
                <?php if(empty($vinculo)){ ?>
                <div class="form-group float-right">
                    <a class="btn btn-dark btn-lg rounded-pill" id="copiar_texto">Detalle de cuota</a>
                </div>
                <?php } ?>
                <div class="form-group float-right mr-3">
                    <div class="form-check">
                        <input <?php print $alumno['baja'] == 0 ? '' : 'checked'?> class="form-check-input" role="button" type="checkbox" name="baja_alumno" id="baja_alumno">
                        <label class="form-check-label">Baja del alumno/a</label>
                    </div>
                </div>
                <?php if(empty($vinculo)){ ?>
                    <div class="form-group float-right mr-3">
                        <div class="form-check">
                            <input <?php print $alumno['debemes'] == 0 ? '' : 'checked'?> class="form-check-input" role="button" type="checkbox" name="debe_mes" id="debe_mes">
                            <label class="form-check-label">Adeuda</label>
                            <input type="text" class="form-control col-8" value="<?php print$alumno['info_deuda'];?>" id="adeuda" style="<?php print $alumno['debemes'] == 0 ? 'display:none;' : ''?>">
                        </div>
                    </div>
                    <div class="form-group col-md-12 d-flex justify-content-center">
                        <div class="float-left">
                            <label for="exampleFormControlInput1">A pagar</label>
                            <input type="text" id="valor" readonly="true" name="alumno" class="form-control col-md-6 text-center" value="$<?php print$valor;?>">
                        </div>
                        <div class="ml-3 float-left">
                            <label for="exampleFormControlInput1">En efectivo</label>
                            <input type="text" id="efectivo" readonly="true" class="form-control col-md-6 text-center" value="$<?php print$efectivo;?>">
                        </div>
                        <div class="ml-3 float-left">
                            <label for="exampleFormControlInput1">Combo</label>
                            <input type="text" id="combo" readonly="true" class="form-control col-md-6 text-center" value="$<?php print$combo;?>">
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="form-group float-left ml-3">
                        <a href="datos.php?vinculo=<?php print $vinculo[0]['vinculo'];?>" class="btn btn-dark btn-lg rounded-pill ">Ir a grupo familiar</a>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-2 float-right">
                    <div class="perfil-img d-flex justify-content-center">
                        <a id="tomar_foto" class="tomar_foto">Tomar foto</a>
                        <img role="button" src="<?php print !file_exists($alumno['foto_perfil']) ? 'img/icono.jpg' :$alumno['foto_perfil'];?>?<?php print time();?>" id="id_perfil" class="rounded-circle" height="130" width="130"/>
                        <input type="hidden" id="foto_base64" value="">
                        <div class="file">
                            Cambiar foto
                            <input type="file" capture="camera" name="fotoPerfil" id="fotoPerfil" readonly/>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 float-left mt-datos">
                    <label for="exampleFormControlInput1">Apellido</label>
                    <input type="hidden" id="id_alumno" value="<?php print$alumno['id'];?>">
                    <input type="text" id="apellido" class="form-control" value="<?php print$alumno['apellido'];?>">
                </div>
                <div class="form-group col-md-3 float-left mt-datos">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" id="nombre" class="form-control" value="<?php print$alumno['nombre'];?>">
                </div>
                <div class="form-group col-md-2 float-left mt-datos">
                    <label for="exampleFormControlInput1">Edad</label>
                    <input type="text" id="edad" class="form-control" value="<?php print datos::obtener_edad($alumno['fecha_nac']);?>">
                </div>
                <div class="form-group col-md-2 float-left mt-datos">
                    <label for="exampleFormControlInput1">Fecha de nac.</label>
                    <input type="date" id="fecha_nac" class="form-control" value="<?php print$alumno['fecha_nac'];?>">
                </div>
            </div>
            <?php if(empty(trim($alumno['actividad'])) || trim($alumno['actividad']) == '|'){?>
                <div class="col-md-12">
                    <div class="form-group col-md-12 float-left">
                        <label>Actividad 1</label>
                        <i class="bi bi-plus-circle-dotted agregar_actividad" title="Agregar actividad" id="agregar_actividad"></i>
                        <input list="actividades" class="form-control" id="actividad">        
                        <datalist id="actividades">
                            <?php foreach ($combo_actividades as $value) {?>
                                <option value="<?php print$value['actividad'];?>">
                            <?php } ?>
                        </datalist>
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
                        <input list="actividades" class="form-control" id="actividad" value="<?php print trim($value);?>" >        
                        <datalist id="actividades">
                            <?php foreach ($combo_actividades as $value) {?>
                                <option value="<?php print$value['actividad'];?>">
                            <?php } ?>
                        </datalist>
                    </div>
                </div> 
            <?php } ?>
            <div id="nueva_actividad" class="col-md-12"></div>
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>Notas del estudio</label>
                    <textarea class="form-control" id="notas"><?php print$alumno['notas'];?></textarea>        
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>Observacion</label>
                    <textarea class="form-control" id="observacion_alumno"><?php print$alumno['observaciones'];?></textarea>        
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Documento</label>
                    <input type="text" id="documento" class="form-control" value="<?php print$alumno['documento'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Correo</label>
                    <input type="text" id="correo" class="form-control" value="<?php print$alumno['mail'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Tel. movil</label>
                    <input type="text" id="tel_alumno" class="form-control" value="<?php print$alumno['tel_movil'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Autorizado</label>
                    <input type="text" id="tel_fijo" class="form-control" value="<?php print$alumno['tel_fijo'];?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Nacionalidad</label>
                    <input type="text" id="nacionalidad" class="form-control" value="<?php print$alumno['nacionalidad'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Localidad</label>
                    <input type="text" id="localidad" class="form-control" value="<?php print$alumno['localidad'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Domicilio</label>
                    <input type="text" id="domicilio" class="form-control" value="<?php print$alumno['domicilio'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Salud</label>
                    <input type="text" id="salud" class="form-control" value="<?php print$alumno['salud'];?>">
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
                        <i class="bi bi-dash-circle-dotted eliminar_actividad" title="Eliminar familiar" id="eliminar_familiar"></i>
                        <input type="hidden" id="id_familiar" value="<?php print$value['id'];?>">
                        <input type="text" id="nom_ape" class="form-control" value="<?php print$value['nombre_apellido'];?>">
                    </div>
                    <div class="form-group col-md-4 float-left">
                        <label for="exampleFormControlInput1">Vinculo</label>
                        <input type="text" id="vinculo" class="form-control" value="<?php print$value['vinculo'];?>">
                    </div>
                    <div class="form-group col-md-4 float-left">
                        <label for="exampleFormControlInput1">Telefono</label>
                        <input type="text" id="tel_familiar" class="form-control" value="<?php print$value['telefono'];?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12 float-left">
                        <label>Observacion</label>
                        <textarea class="form-control" id="observacion_familiar"><?php print$value['observacion'];?></textarea>        
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12 mb-4 mt-3">
                <div class="form-group col-md-12">
                    <button id="editar_datos" class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mt-2">Guardar datos</button>
                    <button id="eliminar_alumno" class="btn btn-dark btn-lg rounded-pill float-right col-md-2  mt-2">Eliminar alumno</button>
                    <button id="agregar_familiar" onclick="location.href='familiares.php?id=<?php print$_GET['id'] ?>'" class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mt-2">Agregar familiar</button>
                </div>
            </div>
        </div>
    </div>
    <?php include('partials\footer_temp.php');?>
</body>
</html>