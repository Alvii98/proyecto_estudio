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
    <script src="js/vinculos.js?<?php print time();?>"></script>
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/estilo.css?<?php print time();?>">
</head>
<body>
    <?php include('partials\header_temp.php'); ?>
    <?php include('partials\camara_temp.php'); ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Cargar vinculo</h3>
            </div>
        </div>
    </div>
    <div class="container border border-color rounded mb-4">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="form-group float-left">
                    <a class="btn btn-dark btn-lg rounded-pill" href="index.php">Volver</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6 float-left">
                    <label class="ml-2">Alumno/a (*)</label>
                    <select class="form-control ml-2" id="id_alumno_1">
                        <option selected value="0">-- Seleccione un alumno/a --</option>
                        <?php foreach ($alumnos as $value) {?>
                            <option value="<?php print$value['id'];?>">
                                <?php print$value['apellido'].' '.$value['nombre'];?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6 float-left">
                    <label class="ml-2">Alumno/a (*)</label>
                    <select class="form-control ml-2" id="id_alumno_2">
                        <option selected value="0">-- Seleccione un alumno/a --</option>
                        <?php foreach ($alumnos as $value) {?>
                            <option value="<?php print$value['id'];?>">
                                <?php print$value['apellido'].' '.$value['nombre'];?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="form-group col-md-6">
                    <label class="ml-2">Vinculo (*)</label>
                    <select class="form-control ml-2" id="vinculo">
                        <option selected value="0">-- Seleccione un vinculo --</option>
                        <option value="Padre">Padre</option>
                        <option value="Madre">Madre</option>
                        <option value="Hermano/a">Hermano/a</option>
                        <option value="Primo/a">Primo/a</option>
                        <option value="Primo/a"></option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="form-group col-md-12">
                    <button id="guardar_vinculo" class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mr-3">Guardar datos</button>
                </div>
            </div>
        </div>
    </div>
    <?php include('partials\footer_temp.php');?>
</body>
</html>