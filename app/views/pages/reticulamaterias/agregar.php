<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>
<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/reticulamaterias" class="text-secondary"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <h4>Agregar materia a retícula</h4>
            <form action="<?php echo RUTA_URL;?>/reticulamaterias/agregar"  method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                        <input id="inputID" type="text" class="form-control" required disabled>
                        <label for="inputID" class="floating-label">ID</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <select name="selectCarrera" id="selectCarrera" class="form-control" required>
                            <?php foreach($datos['Carreras'] as $carreras): ?>
                                <option value=<?php echo $carreras['id']; ?>>
                                    <?php echo $carreras['nombre']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="selectCarrera" class="floating-label">Carrera</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input name="inputMaxCreditos" id="inputMaxCreditos" type="number" class="form-control" required>
                        <label for="inputMaxCreditos" class="floating-label">Créditos máximos por periodo</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input name="inputAnio" id="inputAnio" type="number" class="form-control" required>
                        <label for="inputAnio" class="floating-label">Año de registro</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Guardar <i class="text-white fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>