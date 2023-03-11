<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
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
   <script src="js/buscador.js?12331"></script> 

   <!-- <script src="js/login.js?{{rand()}}"></script>  -->
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/estilo.css?313">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 text-light">
                <h3>Buscar personas</h3>
            </div>
        </div>
    </div>
    <div class="container border rounded mb-4 text-light">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 d-flex justify-content-center mt-4">
                <input type="text" name="" id="apellido" placeholder="Apellido" class="form-control col-md-3">
                <input type="text" name="" id="nombre" placeholder="Nombre" class="form-control ml-2 col-md-3">
                <input type="text" name="" id="edad" placeholder="Edad" class="form-control ml-2 col-md-3">
                <input type="text" name="" id="actividad" placeholder="Actividad" class="form-control ml-2 col-md-3">
            </div>
            <div class="col-md-10 d-flex justify-content-center mt-3">
                <button class="btn btn-dark btn-lg rounded-pill col-md-3" id="buscar">Buscar</button>
            </div>
            <div class="col-md-12 mt-4">
                <?php
                include('partials\tabla.php');
                ?>
            </div>
        </div>
    </div>
</body>
</html>