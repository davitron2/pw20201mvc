<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php';

if(isset($_SESSION['usuario'])) { 
    if($_SESSION['usuario']['tipoUsuario']==1){
      
        }else{
            $url= ''.RUTA_URL.'/logins/logins';
            header("Location:      $url"); 
        }
        
}else{

    $url= ''.RUTA_URL.'/logins/logins';
    header("Location:      $url"); 
}

?>
<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/alumnos" class="text-secondary"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <h4>Borrar Alumno</h4>
            <form  action="<?php echo RUTA_URL;?>/alumnos/borrar/<?php echo $datos['noControl']; ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                    <label for="inputContrasena" class="label-for-disabled">noControl</label>
                        <input id="inputID"  name="inputID" type="text" class="form-control"   value="<?php echo $datos['noControl']; ?>" required disabled>
                   
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                    <label for="inputContrasena" class="label-for-disabled">Nombres</label>
                        <input id="inputNombre"   name="inputNombre" type="text" class="form-control" value="<?php echo $datos['nombres']; ?>"  disabled required>
                 
                    </div>
                   
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                    <label for="inputContrasena" class="label-for-disabled">Apellido Paterno</label>
                        <input    name="inputApellidoPaterno" id="inputApellidoPaterno" type="text"   disabled value="<?php echo $datos['apellidoP']; ?>"   class="form-control" required>
                   
                    </div>
                    <div class="col-lg-6 mb-2">
                    <label for="inputContrasena" class="label-for-disabled">Apellido Materno</label>
                        <input    name="inputApellidoMaterno" id="inputApellidoMaterno" type="text"  disabled   value="<?php echo $datos['apellidoM']; ?>" class="form-control" required>
                        
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                    <label for="inputContrasena" class="label-for-disabled">Semestre</label>
                        <input   name="inputNombreUsuario" id="inputNombreUsuario" type="text" class="form-control"  disabled  value="<?php echo $datos['semestre']; ?>" autocomplete="off" required>
                       
                    </div>
                    <div class="col-lg-6 mb-2">
                    <label for="inputContrasena" class="label-for-disabled">Reticula y Carrera</label>
                        <input   name="inputNombreUsuario" id="inputNombreUsuario" type="text" class="form-control"  disabled  value="<?php echo $datos['nombreReticula']; ?>" autocomplete="off" required>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                    <button type="submit" class="btn btn-danger">Borrar <i class="text-white fas fa-trash"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>