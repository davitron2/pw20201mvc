<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/solid.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/logins.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/estilos.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/navbars.css">

    <script src="<?php echo RUTA_URL;?>/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<!--**************************************************************-->

    <title><?php echo NOMBRE_SITIO;?></title>
</head>
<body>
    <div class="container container-main-navbar col-sm-12 d-flex justify-content-center flex-column">
        <div class="container-main-navbar-info">
            Instituto Tecnol&oacute;gico de Delicias
        </div>
        <?php
        if(isset($_SESSION['usuario'])) { 
            if($_SESSION['usuario']['tipoUsuario']==1){
                include RUTA_APP . '/views/inc/header_admin.inc.php';
                }
                if($_SESSION['usuario']['tipoUsuario']==2){
                    include RUTA_APP . '/views/inc/header_docente.inc.php';       
                }
        }else{
            if(isset($_SESSION['alumno'])) {
                include RUTA_APP . '/views/inc/header_alumno.inc.php';
            }
        }

        
        ?>
    </div>
    <div id="errorModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content " >
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" style="color: white;">¡Error!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: white;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
            </div>
        </div>
    </div>