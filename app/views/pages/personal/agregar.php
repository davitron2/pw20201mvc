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
            <a href="<?php echo RUTA_URL; ?>/personales" class="text-secondary"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <h4>Agregar personal</h4>
            <form action="<?php echo RUTA_URL;?>/personales/agregar"  method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                        <input id="inputID" type="text" class="form-control" required disabled>
                        <label for="inputID" class="floating-label">ID</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input id="inputNombre"   name="inputNombre" type="text" class="form-control" required>
                        <label for="inputNombre" class="floating-label">Nombre</label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <select id="selectTipoUsuario"   name="selectTipoUsuario"   class="form-control" required>
                        <option value="" selected disabled hidden></option>
                            <option value="1">Administrativo</option>
                            <option value="2">Docente</option>
                        </select> 
                        <label for="selectTipoUsuario" class="floating-label">Tipo usuario</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input    name="inputApellidoPaterno" id="inputApellidoPaterno" type="text" class="form-control" required>
                        <label for="inputApellidoPaterno" class="floating-label">Apellido paterno</label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <input    name="inputApellidoMaterno" id="inputApellidoMaterno" type="text" class="form-control" required>
                        <label for="inputApellidoMaterno" class="floating-label">Apellido materno</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input   name="inputNombreUsuario" id="inputNombreUsuario" type="text" class="form-control" autocomplete="off" required>
                        <label for="inputNombreUsuario" class="floating-label">Nombre de usuario</label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <input   name="inputContrasena" id="inputContrasena" type="password" class="form-control" autocomplete="off" required> 
                        <label for="inputContrasena" class="floating-label">Contraseña</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">

                        <button type="submit" class="btn btn-success">Guardar <i class="fas fa-save text-white"></i></button>


                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>