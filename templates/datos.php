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
    <!-- {{-- <script src="js/funciones.js?{{rand()}}"></script> --}} -->
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/estilo.css?23321">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 text-light">
                <h3>Datos personales</h3>
            </div>
        </div>
    </div>
    <div class="container border rounded mb-4 text-light">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="form-group col-md-3 float-right d-flex justify-content-center">
                    <div class="perfil-img">
                        <button type="submit" name="eliminar_foto" class="eliminar_foto">Eliminar foto</button>
                        <img src="img/icono.jpg" class="rounded-circle" height="125" width="130"/>
                        <div class="file">
                            Cambiar foto
                            <input type="file" name="fotoPerfil" id="fotoPerfil"/>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 float-left mt-datos">
                    <label for="exampleFormControlInput1">Apellido</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['apellido'];?>">
                </div>
                <div class="form-group col-md-3 float-left mt-datos">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['nombre'];?>">
                </div>
                <div class="form-group col-md-1 float-left mt-datos">
                    <label for="exampleFormControlInput1">Edad</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$edad;?>">
                </div>
                <div class="form-group col-md-2 float-left mt-datos">
                    <label for="exampleFormControlInput1">Fecha de nac.</label>
                    <input type="date" readonly="true"class="form-control" value="<?php print$fecha_nac;?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Documento</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['documento'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Correo</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['mail'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Tel. alumno</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['tel_movil'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Tel. fijo</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['tel_fijo'];?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Nacionalidad</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['nacionalidad'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Localidad</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['localidad'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Domicilio</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['domicilio'];?>">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Salud</label>
                    <input type="text" readonly="true"class="form-control" value="<?php print$alumno['salud'];?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>Actividad</label>
                    <textarea class="form-control" readonly="tue"><?php print$alumno['actividad'];?></textarea>        
                </div>
            </div> 
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>Observacion</label>
                    <textarea class="form-control" readonly="tue"><?php print$alumno['observaciones'];?></textarea>        
                </div>
            </div>
            <div class="col-md-12">
                <h3 class="ml-3 mt-3">Familiares</h3>
            </div>
            <?php foreach ($familiar as $key) { 
                if(empty($key['nombre_apellido']) && empty($key['vinculo']) && empty($key['telefono'])) continue;
            ?>
                <div class="col-md-12">
                    <div class="form-group col-md-4 float-left">
                        <label for="exampleFormControlInput1">Nombre y apellido</label>
                        <input type="text" readonly="true"class="form-control" value="<?php print$key['nombre_apellido'];?>">
                    </div>
                    <div class="form-group col-md-4 float-left">
                        <label for="exampleFormControlInput1">Vinculo</label>
                        <input type="text" readonly="true"class="form-control" value="<?php print$key['vinculo'];?>">
                    </div>
                    <div class="form-group col-md-4 float-left">
                        <label for="exampleFormControlInput1">Telefono</label>
                        <input type="text" readonly="true"class="form-control" value="<?php print$key['telefono'];?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12 float-left">
                        <label>Observacion</label>
                        <textarea class="form-control" readonly="tue"><?php print$key['observacion'];?></textarea>        
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12 mb-4 mt-3">
                <div class="form-group col-md-12">
                    <button class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mr-3">Editar datos</button>
                    <!-- {{-- <button class="btn btn-success btn-lg float-right col-md-3">Cargar pago</button> --}} -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>