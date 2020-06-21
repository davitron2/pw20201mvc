<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>
<div class="container-fluid">
    <div class="row bg-dark py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/personales" class="text-white text-bold"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <h4>Agregar personal</h4>
            <form  action="<?php echo RUTA_URL;?>/personales/borrar/<?php echo $datos['id']; ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                        <input id="inputID"  name="inputID" type="text" class="form-control"   value="<?php echo $datos['id']; ?>" required disabled>
                        <label for="inputID" class="floating-label"></label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input id="inputNombre"   name="inputNombre" type="text" class="form-control" value="<?php echo $datos['nombre']; ?>"  disabled required>
                        <label for="inputNombre" class="floating-label"></label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <select id="selectTipoUsuario"   name="selectTipoUsuario"  value="<?php echo $datos['tipoUsuario']; ?>"  class="form-control"  disabled required>
                            <option value="1">Administrativo</option>
                            <option value="2">Docente</option>
                        </select> 
                        <label for="selectTipoUsuario" class="floating-label"></label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input    name="inputApellidoPaterno" id="inputApellidoPaterno" type="text"   disabled value="<?php echo $datos['apellidoP']; ?>"   class="form-control" required>
                        <label for="inputApellidoPaterno" class="floating-label"></label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <input    name="inputApellidoMaterno" id="inputApellidoMaterno" type="text"  disabled   value="<?php echo $datos['apellidoM']; ?>" class="form-control" required>
                        <label for="inputApellidoMaterno" class="floating-label"></label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input   name="inputNombreUsuario" id="inputNombreUsuario" type="text" class="form-control"  disabled  value="<?php echo $datos['usuario']; ?>" autocomplete="off" required>
                        <label for="inputNombreUsuario" class="floating-label"></label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success">Borrar <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>