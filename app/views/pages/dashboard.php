<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--ZONA FA-->
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/solid.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/fontawesome.css">
<!--ZONA BS-->
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/estilos.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/navbars.css">
<!--**************************************************************-->
    <title><?php echo NOMBRE_SITIO;?></title>

    <style>
        .aqua{background-color: aqua;}
    </style>
</head>
<body>
<?php
//ini_set('error_reporting',0);
ini_set('display_errors',0);
session_start();
include RUTA_APP . '/views/inc/header.inc.php';
?>
<br>
    <div class="container">
        <?php if(!isset($_SESSION['usuario'])) { ?>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="card bg-warning">
                        <div class="card-header"> Avisos </div>
                        <div class="card-body"> No tiene permisos...vaya a login</div>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            
            </div>
                <?php
                    } else {
                ?>

<h3><?php echo "bienvenido: " . $_SESSION['usuario']['usuario'] ?></h3>
    
    <p>Programación Web</p>

                    <?php } ?>

    </div>
<?php
include RUTA_APP . '/views/inc/footer.inc.php'
?>