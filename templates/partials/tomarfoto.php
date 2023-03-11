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
    <!-- JS PARA LOGIN -->
    <script src="../../js/funciones.js?123"></script>
    <!-- {{-- <script src="js/login.js?{{rand()}}"></script> --}} -->
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/estilo.css?{{rand()}}">
</head>
<body>
    <!-- Aquí el video embebido de la webcam  -->
    <div class="video-wrap">
        <video id="video" playsinline autoplay></video>
    </div>
    <!-- El elemento canvas -->
    <div class="controller">
        <button id="boton">Capture</button>
    </div>
    <!-- Botón de captura -->
    <canvas id="canvas" width="640" height="480" style="display: none;"></canvas> 
    <p id="estado"></p>
</body>
</html>