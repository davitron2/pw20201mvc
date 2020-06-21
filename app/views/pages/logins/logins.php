<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--ZONA FA-->
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/solid.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/fontawesome.css">
<!--ZONA BS-->
<link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/logins.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/estilos.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/navbars.css">
<!--**************************************************************-->
    <title><?php echo NOMBRE_SITIO;?></title>
</head>
<body>
    <div class="container-main-header">Instituto Tecnol&oacute;gico de Delicias</div>
    <div class="container container-main-cards-login">    
        <div class="card-deck container-cards-login ">
            <div class="card card-wrapper">
                <img src="<?php echo RUTA_URL ?>/img/maestro.png" class="card-img-top img-login">
                <div class="card-body">
                    <h5 class="card-title">Personal del Instituto</h5>
                </div>
                <div class="card-footer">
                    <button class="btn-login">Iniciar sesi&oacute;n</button>
                </div>
            </div>
            <div class="card card-wrapper">
                <img src="<?php echo RUTA_URL ?>/img/alumno.png" class="card-img-top img-login" alt="">
                <div class="card-body">
                    <h5 class="card-title">Alumnos</h5>
                </div>
                <div class="card-footer">
                    <button class="btn-login">Iniciar sesi&oacute;n</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>