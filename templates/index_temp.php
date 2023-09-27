<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
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
    <!-- JS -->
   <script src="js/ajax_busqueda.js?<?php print time();?>"></script> 
   <script src="js/excel.js?<?php print time();?>"></script> 
   <script src="js/exportar_excel.js?<?php print time();?>"></script> 
    <!-- ESTILOS -->
    <link rel="stylesheet" href="css/estilo.css?<?php print time();?>">
</head>
<body>
    <?php include('partials\header_temp.php'); ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Buscar alumno/a</h3>
            </div>
        </div>
    </div>
    <div class="container border border-color rounded mb-4 text-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-3 boton-cargar" onclick="location.href='cargas.php'">Cargar alumno</div>
                <div class="col-md-3 boton-cargar" onclick="location.href='vinculo.php'">Vinculos familiares</div>
                <div class="col-md-3 boton-cargar" onclick="location.href='actividades.php'">Actividades</div>
            </div>
            <div class="col-md-10 d-flex justify-content-center mt-4">
                <input type="text" id="apellido" placeholder="Apellido" class="form-control col-md-3">
                <input type="text" id="nombre" placeholder="Nombre" class="form-control ml-2 col-md-3">
                <input type="text" id="edad" placeholder="Edad" class="form-control ml-2 col-md-3">
                <input list="actividades" id="actividad" placeholder="Actividad" class="form-control ml-2 col-md-3">
                <datalist id="actividades">
                    <?php foreach ($actividades as $value) {?>
                        <option value="<?php print$value['actividad'];?>">
                    <?php } ?>
                </datalist>
            </div>
            <div class="col-md-12 mt-2">
                <button class="btn btn-dark btn-lg rounded-pill float-right" onclick="exportarExcel('alumnos')" id="exportar_excel">Exportar a excel</button>
            </div>
            <div class="col-md-12 text-center">
                <label id="cant_res"></label>
                <?php include('partials\tabla_temp.php');?>
            </div>
        </div>
    </div>
    <?php include('partials\footer_temp.php');?>
</body>
</html>