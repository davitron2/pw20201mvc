<?php
//ini_set('error_reporting',0);
ini_set('display_errors',0);
session_start();
include RUTA_APP . '/views/inc/header.inc.php';
?>
    <div class="container container-main-cards-login">    
        <div class="card-deck container-cards-login ">
            <div class="card card-wrapper">
                <img src="<?php echo RUTA_URL ?>/img/maestro.png" class="card-img-top img-login">
                <div class="card-body">
                    <h5 class="card-title">Personal del Instituto</h5>
                </div>
                <div class="card-footer">



                <form action="<?php echo RUTA_URL;?>/auths/1">
                    <button  type="submit"   class="btn-login">Iniciar sesi&oacute;n</button>
                                </form>
               
                </div>
            </div>
            <div class="card card-wrapper">
                <img src="<?php echo RUTA_URL ?>/img/alumno.png" class="card-img-top img-login" alt="">
                <div class="card-body">
                    <h5 class="card-title">Alumnos</h5>
                </div>
                <div class="card-footer">



                <form action="<?php echo RUTA_URL;?>/auths/2">
                    <button  type="submit"   class="btn-login">Iniciar sesi&oacute;n</button>
                                </form>





                </div>
            </div>
        </div>
    </div>
<?php
include RUTA_APP . '/views/inc/footer.inc.php'
?>
