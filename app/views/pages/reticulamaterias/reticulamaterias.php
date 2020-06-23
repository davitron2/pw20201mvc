<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>




<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/reticulas/agregar" class="text-secondary">Nuevo <i class="fas fa-file-alt"></i></a>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-10">
            <div class="row form-group">
                <div class="col-md-9 mb-2">
                    <input id="inputBuscador" type="text" class="form-control" placeholder="Buscar...">
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="selectBuscador">
                        <option>ID</option>
                        <option>Carrera</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Carrera Retícula</th>
                        <th scope="col">Año Retícula</th>
                        <th scope="col">Materia</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>