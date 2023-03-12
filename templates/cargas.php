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
    <!-- {{-- <script src="js/login.js?{{rand()}}"></script> --}} -->
    <!-- ESTILOS PARA LOGIN -->
    <link rel="stylesheet" href="css/estilo.css?{{rand()}}">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 text-light">
                <h3>Cargar datos</h3>
            </div>
        </div>
    </div>
    <div class="container border rounded mb-4 text-light">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="form-group col-md-3 float-right d-flex justify-content-center">
                    <div class="perfil-img">
                        <img src="img/icono.jpg" class="rounded-circle" height="125" width="130"/>
                        <div class="file">
                            Cambiar foto
                            <input type="file" name="fotoPerfil" id="fotoPerfil"/>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 float-left mt-datos">
                    <label for="exampleFormControlInput1">Apellido</label>
                    <input type="text" class="form-control" placeholder="Apellido">
                </div>
                <div class="form-group col-md-3 float-left mt-datos">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre">
                </div>
                <div class="form-group col-md-1 float-left mt-datos">
                    <label for="exampleFormControlInput1">Edad</label>
                    <input type="text"  class="form-control" placeholder="Edad">
                </div>
                <div class="form-group col-md-2 float-left mt-datos">
                    <label for="exampleFormControlInput1">Fecha de nac.</label>
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Documento</label>
                    <input type="text" class="form-control" placeholder="Documento">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Correo</label>
                    <input type="text" class="form-control" placeholder="Correo">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Tel. alumno</label>
                    <input type="text" class="form-control" placeholder="Tel. alumno">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Tel. fijo</label>
                    <input type="text" class="form-control" placeholder="Tel. fijo">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Nacionalidad</label>
                    <input type="text" class="form-control" placeholder="Nacionalidad">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Localidad</label>
                    <input type="text" class="form-control" placeholder="Localidad">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Domicilio</label>
                    <input type="text" class="form-control" placeholder="Domicilio">
                </div>
                <div class="form-group col-md-3 float-left">
                    <label for="exampleFormControlInput1">Salud</label>
                    <input type="text" class="form-control" placeholder="Salud">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>Actividad</label>
                    <textarea class="form-control" placeholder="Actividad" readonly="tue"></textarea>        
                </div>
            </div> 
            <div class="col-md-12">
                <div class="form-group col-md-12 float-left">
                    <label>Observacion</label>
                    <textarea class="form-control" placeholder="Observacion" readonly="tue"></textarea>        
                </div>
            </div>
            <div class="col-md-12 mb-4 mt-3">
                <div class="form-group col-md-12">
                    <button class="btn btn-dark btn-lg rounded-pill float-right col-md-2 mr-3">Guardar datos</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>