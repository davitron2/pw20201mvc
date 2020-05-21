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

<h3><?php echo $datos['titulo'] . $_SESSION['usuario']['nombre_usuario'] ?></h3>
    
    <p>Programación Web</p>

                    <?php } ?>

    </div>
<?php
include RUTA_APP . '/views/inc/footer.inc.php'
?>