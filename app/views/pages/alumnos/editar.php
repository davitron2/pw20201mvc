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
            <h4>Editar Alumno</h4>
            <form action="<?php echo RUTA_URL;?>/alumnos/editar/<?php echo $datos['noControl']; ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                    <label for="inputNombre" class="label-for-disabled">noControl</label>
                        <input id="inputID"  name="inputID" type="text" class="form-control"   value="<?php echo $datos['noControl']; ?>" required disabled>
                    
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input id="inputNombres"   name="inputNombres" type="text" class="form-control" value="<?php echo $datos['nombres']; ?>" required>
                        <label for="inputNombre" class="floating-label">Nombre</label>
                    </div>
                  
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input    name="inputApellidoPaterno" id="inputApellidoPaterno" type="text"  value="<?php echo $datos['apellidoP']; ?>"   class="form-control" required>
                        <label for="inputApellidoPaterno" class="floating-label">Apellido paterno</label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <input    name="inputApellidoMaterno" id="inputApellidoMaterno" type="text"    value="<?php echo $datos['apellidoM']; ?>" class="form-control" required>
                        <label for="inputApellidoMaterno" class="floating-label">Apellido materno</label>
                    </div>
                </div>
                <div class="row form-group">
                 
                    <div class="col-lg-6 mb-2">
                    <label for="inputNIP" class="label-for-disabled">NIP</label>
                        <input   name="inputNIP" id="inputNIP" type="password" class="form-control" autocomplete="off" required> 
                       
                    </div>
                    <div class="col-lg-6 mb-2">
                        <select id="selectReticula"   name="selectReticula"   class="form-control" required>
                        <option value="" selected disabled hidden></option>
                        <?php foreach($datos['Reticulas'] as $reticulas): ?>
                                <option value=<?php echo $reticulas['id']; ?>>
                                    <?php echo $reticulas['nombre']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select> 
                        <label for="selectReticula" class="floating-label">Reticula y Carrera</label>
                    </div>
                </div>
                <div class="row form-group">
                 
                    <div class="col-lg-6 mb-2">
                        <select id="selectSemestre"   name="selectSemestre"   class="form-control" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        </select> 
                        <label for="selectTipoUsuario" class="floating-label">Semestre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                    <button type="submit" class="btn btn-success">Guardar <i class="text-white fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>