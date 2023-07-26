<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinculo familiar</title>
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
                <div class="form-group float-right">
                    <a class="btn btn-dark btn-lg rounded-pill" id="copiar_texto">Texto informativo</a>
                </div>
                <div class="form-group float-right mr-3">
                    <div class="form-check">
                        <input <?php print $nombre_vinculo == 0 ? '' : 'checked'?> class="form-check-input" role="button" type="checkbox" name="debe_mes_vinculo" id="debe_mes_vinculo">
                        <label class="form-check-label">Debe el mes pasado</label>
                    </div>
                </div>
                <input type="hidden" id="nombre_vinculo" value="<?php print$_GET['vinculo'];?>">
                <div class="form-group col-md-12 d-flex justify-content-center">
                    <div class="float-left">
                        <label for="exampleFormControlInput1">A pagar</label>
                        <input type="text" readonly="true" id="valor" class="form-control col-md-6 text-center" value="$<?php print$valor;?>">
                    </div>
                    <div class="ml-3 float-left">
                        <label for="exampleFormControlInput1">En efectivo</label>
                        <input type="text" readonly="true" id="efectivo" class="form-control col-md-6 text-center" value="$<?php print$efectivo;?>">
                    </div>
                    <div class="ml-3 float-left">
                        <label for="exampleFormControlInput1">Combo</label>
                        <input type="text" readonly="true" id="combo" class="form-control col-md-6 text-center" value="$<?php print$combo;?>">
                    </div>
                </div>
            </div>
            <?php foreach ($alumnos as $value) { ?>
                <div class="col-md-12">
                    <div class="form-group col-md-6 float-left">
                        <label for="exampleFormControlInput1">Apellido</label>
                        <input type="text" readonly="true" id="apellido" class="form-control" value="<?php print$value['apellido'];?>">
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input type="text" readonly="true" id="nombre" class="form-control" value="<?php print$value['nombre'];?>">
                    </div>
                </div>
                <?php foreach ($value['actividad'] as $key => $value) { if(empty(trim($value))) continue;?>
                    <div class="col-md-12">
                        <div class="form-group col-md-12 float-left">
                            <label>Actividad <?php print$key+1; ?></label>
                            <textarea class="form-control" readonly="true" id="actividad"><?php print$value;?></textarea>        
                        </div>
                    </div>
                <?php } ?>
                <div class="col-md-12">
                    <hr>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include('partials\footer_temp.php');?>
</body>
</html>