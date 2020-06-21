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