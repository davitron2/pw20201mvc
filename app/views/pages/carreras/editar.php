<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>
<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/carreras" class="text-secondary"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <h4>Editar Carrera</h4>
            <form action="<?php echo RUTA_URL;?>/carreras/editar/<?php echo $datos['id']; ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                        <input id="inputID"  name="inputID" type="text" class="form-control"   value="<?php echo $datos['id']; ?>" required disabled>
                        <label for="inputID" class="floating-label"></label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input id="inputNombre"   name="inputNombre" type="text" class="form-control" value="<?php echo $datos['nombre']; ?>" required>
                        <label for="inputNombre" class="floating-label">Nombre</label>
                    </div>
                   
                </div>
               
               
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>