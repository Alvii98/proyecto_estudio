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
    <script src="js/vinculos_actividades.js?<?php print time();?>"></script>
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
                <label>(Seleccione alumno y seleccione el vinculo familiar o en caso de que no est&eacute;, escriba el nuevo vinculo familiar.)</label>
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
                    <label class="ml-2">Vinculo familiar (*)</label>
                    <select class="form-control ml-2" id="nom_vinculo">
                        <option selected value="0">-- Seleccione el vinculo --</option>
                        <?php foreach ($vinculos as $value) {?>
                            <option value="<?php print$value['vinculo'];?>">
                                <?php print$value['vinculo'];?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6 float-left">
                    <label class="ml-2">Alumno/a (*)</label>
                    <select class="form-control ml-2" id="id_alumno">
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
                    <label class="ml-2">Nuevo vinculo familiar (*)</label>
                    <input type="text" id="nom_vinculo_nuevo" placeholder="Apellidos de alumnos" class="form-control">
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