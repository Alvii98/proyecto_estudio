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
    <script src="js/familiares.js?<?php print time();?>"></script>
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/estilo.css?<?php print time();?>">
</head>
<body>
    <?php include('partials\header_temp.php'); ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Cargar familiar</h3>
            </div>
        </div>
    </div>
    <div class="container border rounded mb-4">
        <div class="row">
            <div class="col-md-12 mt-3">
                    <div class="form-group float-left">
                        <a class="btn btn-dark btn-lg rounded-pill" href="datos.php?id=<?php print$_GET['id']?>" style="position: absolute;">Volver</a>
                    </div>
                    <div class="form-group col-md-4 float-left mt-datos">
                        <label for="exampleFormControlInput1">Nombre y apellido (*)</label>
                        <input type="hidden" id="id_alumno" value="<?php print$_GET['id'] ?>">
                        <input type="text" id="nom_ape" class="form-control">
                    </div>
                    <div class="form-group col-md-4 float-left mt-datos">
                        <label for="exampleFormControlInput1">Vinculo (*)</label>
                        <input type="text" id="vinculo" class="form-control">
                    </div>
                    <div class="form-group col-md-4 float-left mt-datos">
                        <label for="exampleFormControlInput1">Telefono (*)</label>
                        <input type="text" id="tel_familiar" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12 float-left">
                        <label>Observacion</label>
                        <textarea class="form-control" id="observacion_familiar"></textarea>        
                    </div>
                </div>
            <div class="col-md-12 mb-4 mt-3">
                <div class="form-group col-md-12">
                    <button id="guardar_familiar" class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mr-3">Guardar familiar</button>
                </div>
            </div>
        </div>
    </div>
    <?php include('partials\footer_temp.php');?>
</body>
</html>