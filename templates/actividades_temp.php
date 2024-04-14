<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
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
    <!-- JS PARA guardar_datos -->
    <script src="js/ajax_guardar_datos.js?<?php print time();?>"></script>
    <script src="js/ajax_editar_datos.js?<?php print time();?>"></script>
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/estilo.css?<?php print time();?>">
</head>
<body>
    <?php include('partials\header_temp.php'); ?>
    <?php include('partials\camara_temp.php'); ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Actividades</h3>
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
            <!-- <div class="col-md-12 d-flex justify-content-center">
                <div class="form-group">
                    <label>Descuento por actividades</label>
                    <input type="number" class="form-control col-10" id="descuento_actividad" value="<?php print$descuento_actividad;?>">
                </div>
                <div class="form-group">
                    <label>Descuento por familiar</label>
                    <input type="number" class="form-control col-10" id="descuento_familiar" value="<?php print$descuento_familiar;?>">
                </div>
            </div> -->
            <div class="col-md-12 d-flex justify-content-center">
                <div class="form-group col-md-6">
                    <select class="form-control ml-2" id="id_actividad">
                        <option selected value="0">-- Seleccione una actividad --</option>
                        <?php foreach ($actividades as $value) {?>
                            <option value="<?php print$value['id'];?>">
                                <?php print$value['actividad'];?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mt-2 ml-3">
                    <div class="form-check">
                        <input class="form-check-input" role="button" type="checkbox" name="agregar_nueva_actividad" id="agregar_nueva_actividad">
                        <label class="form-check-label">Agragar actividad</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3 mt-3" id="cargar_actividad">

            </div>
            <div class="col-md-12 d-flex justify-content-center mt-3">
                <div class="form-group col-md-12">
                    <button id="guardar_actividad" class="btn btn-dark btn-lg rounded-pill float-right col-md-2">Editar actividad</button>
                    <button id="nueva_actividad" class="btn btn-dark btn-lg rounded-pill float-right col-md-3"disabled>Guardar nueva actividad</button>
                </div>
            </div>
        </div>
    </div>
    <?php include('partials\footer_temp.php');?>
</body>
</html>