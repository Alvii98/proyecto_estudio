<?php require_once 'datos.php'?>
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
    <link rel="stylesheet" href="css/estilo.css?{{rand()}}">
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
        <div class="row d-flex justify-content-center">

            <div class="col-md-12 d-flex justify-content-center mt-3">

                <div class="form-group">
                    <div class="perfil-img">
                        <button type="submit" name="eliminar_foto" class="eliminar_foto">Eliminar foto</button>
                        <img src="img/icono.jpg" class="rounded-circle" height="150" width="150"/>
                        <div class="file">
                            Cambiar foto
                            <input type="file" name="fotoPerfil" id="fotoPerfil"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Apellido</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Apellido">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" readonly="true"class="form-control" value="<?php $nombre ?>" placeholder="Nombre">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Edad</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Edad">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Documento</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Documento">
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Domicilio</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Domicilio">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Localidad</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Localidad">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Tel. alumno</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Tel. alumno">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Tel. fijo</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Tel. fijo">
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Contacto de emergencia</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Contacto de emergencia">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Condiciones clinicas</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Condiciones clinicas">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Cuota</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Cuota">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Descuento</label>
                    <input type="text" readonly="true"class="form-control" placeholder="Descuento">
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="form-group col-md-4">
                    <label>Actividad 1</label>
                    <textarea class="form-control" readonly="tue" placeholder="Actividad 1" required></textarea>        
                </div>
                <div class="form-group col-md-4">
                    <label>Actividad 2</label>
                    <textarea class="form-control" readonly="tue" placeholder="Actividad 2" required></textarea>        
                </div>
                <div class="form-group col-md-4">
                    <label>Actividad 3</label>
                    <textarea class="form-control" readonly="tue" placeholder="Actividad 3" required></textarea>        
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="form-group col-md-12">
                    <label>Observacion de estudios</label>
                    <textarea class="form-control" readonly="tue" placeholder="Observacion de estudios" required></textarea>        
                </div>
            </div>
            <div class="col-md-12 mb-4 mt-3">
                <div class="form-group">
                    <button class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mr-3">Editar datos</button>
                    <!-- {{-- <button class="btn btn-success btn-lg float-right col-md-3">Cargar pago</button> --}} -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>