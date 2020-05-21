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
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/custom.css">
<!--**************************************************************-->
    <title><?php echo NOMBRE_SITIO;?></title>

    <style>
        .aqua{background-color: aqua;}
    </style>
</head>

<body>
     <div class="container bg-default"> 
        <div class="row"> 
            <div class="col-xs-12 col-sm-12 col md-12 col-lg-12">
                <h1>Empresas Tecnológicas S.A de C.V</h1>
            </div> 
        </div>
       
<!--*********************************TOMADO DE BS******************************************-->
<nav class="navbar navbar-expand-lg navbar-light aqua">
    <a class="navbar-brand" href="<?php echo RUTA_URL;?>"><i class="fas fa-home" style="color: #ff0000;"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTA_URL;?>/usuarios">Usuarios</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reportes
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo RUTA_URL;?>/productos">Ventas</a>
            <a class="dropdown-item" href="#">Empleados</a>
            <div class="dropdown-divider"></div> <!--LINEA DIVISORA como el hr-->
            <a class="dropdown-item" href="#">Otros</a>
          </div>
        </li>
      </ul>
      
      <ul class="navbar-nav ml-auto">


      <?php if(!isset($_SESSION['usuario'])){ ?>
                  
                  <?php }else{?>
                  <div> 
                  <img src="data:image/png;base64, <?php echo $_SESSION['foto'] ; ?>" width="50">
                  </div>
                  <?php } ?>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"  href="#" aria-haspopup="true" aria-expanded="false">Acceso</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo RUTA_URL;?>/auths">Log In</a>
              <a class="dropdown-item" href="<?php echo RUTA_URL;?>/auths/logout">Log Out</a>
            </div>  
          </li>
         
      </ul>
    </div>
  </nav>
</div> 

   

