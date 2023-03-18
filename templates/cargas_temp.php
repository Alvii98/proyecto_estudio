<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargas</title>
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
    <!-- JS PARA guardar_datos -->
    <script src="js/ajax_guardar_datos.js?<?php print time();?>"></script>
    <script src="js/foto_perfil.js?<?php print time();?>"></script>
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/estilo.css?<?php print time();?>">
    <link rel="stylesheet" href="css/camara.css?<?php print time();?>">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Cargar datos</h3>
            </div>
        </div>
    </div>
    <div class="container border rounded mb-4">
    <div class="row">
            <div class="col-md-12 mt-3">
                <div class="form-group col-md-3 float-right d-flex justify-content-center">
                    <div class="perfil-img">
                        <a id="tomar_foto" class="tomar_foto">Tomar foto</a>
                        <img src="img/icono.jpg" id="id_perfil" class="rounded-circle" height="125" width="130"/>
                        <input type="hidden" id="foto_base64" value="">
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
                    <label for="exampleFormControlInput1">Apellido (*)</label>
                    <input type="text" id="apellido" class="form-control">
                </div>
                <div class="form-group col-md-3 float-left mt-datos">
                    <label for="exampleFormControlInput1">Nombre (*)</label>
                    <input type="text" id="nombre" class="form-control">
                </div>
                <div class="form-group col-md-1 float-left mt-datos">
                    <label for="exampleFormControlInput1">Edad (*)</label>
                    <input type="text" id="edad" class="form-control">
                </div>
                <div class="form-group col-md-2 float-left mt-datos">
                    <label for="exampleFormControlInput1">Fecha de nac. (*)</label>
                    <input type="date" id="fecha_nac" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Documento</label>
                    <input type="text" id="documento" class="form-control">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Correo</label>
                    <input type="text" id="correo" class="form-control">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Tel. movil</label>
                    <input type="text" id="tel_alumno" class="form-control">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Tel. fijo</label>
                    <input type="text" id="tel_fijo" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Nacionalidad</label>
                    <input type="text" id="nacionalidad" class="form-control">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Localidad</label>
                    <input type="text" id="localidad" class="form-control">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Domicilio</label>
                    <input type="text" id="domicilio" class="form-control">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Salud</label>
                    <input type="text" id="salud" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>Actividad</label>
                    <textarea class="form-control" id="actividad"></textarea>        
                </div>
            </div> 
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>Observacion</label>
                    <textarea class="form-control" id="observacion_alumno"></textarea>        
                </div>
            </div>
            <div class="col-md-12 mb-4 mt-3">
                <div class="form-group col-md-12">
                    <button class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mr-3" id="guardar_datos">Guardar datos</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>