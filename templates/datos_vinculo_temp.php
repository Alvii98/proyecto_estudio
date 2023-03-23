<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del alumno/a</title>
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
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Vinculo familiar</h3>
            </div>
        </div>
    </div>
    <div class="container border border-color rounded mb-4">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="form-group float-left col-md-3">
                    <a class="btn btn-dark btn-lg rounded-pill" href="index.php">Volver</a>
                </div>
                <div class="form-group float-left col-md-3">
                    <label for="exampleFormControlInput1">A pagar</label>
                    <input type="text" readonly="true" id="valor" class="form-control col-md-6 text-center" value="$<?php print'';?>">
                </div>
                <div class="form-group float-left col-md-3">
                    <label for="exampleFormControlInput1">En efectivo</label>
                    <input type="text" readonly="true" id="efectivo" class="form-control col-md-6 text-center" value="$<?php print'';?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6 float-left mt-datos">
                    <label for="exampleFormControlInput1">Apellido</label>
                    <input type="hidden" id="id_alumno" value="<?php print'';?>">
                    <input type="text" readonly="true" id="apellido" class="form-control" value="<?php print'';?>">
                </div>
                <div class="form-group col-md-6 float-left mt-datos">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" readonly="true" id="nombre" class="form-control" value="<?php print'';?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>actividades</label>
                    <textarea class="form-control" readonly="true" id="actividad"></textarea>        
                </div>
            </div>
        </div>
    </div>
    <?php include('partials\footer_temp.php');?>
</body>
</html>