<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>

<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/aulas/agregar" class="text-secondary">Nuevo <i class="fas fa-file-alt"></i></a>
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
                        <option>Nombre</option>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($datos['aulas'] as $aulas): ?>
                    <tr>
                    <td><?php echo $aulas['id']; ?></td>
                    <td><?php echo $aulas['nombre']; ?></td>
                        <td>
                            <a    href="<?php echo RUTA_URL;?>/aulas/editar/<?php echo $aulas['id']; ?>"   class="btn btn-sm btn-warning"><i class="text-white fas fa-edit"></i></a>
                            <a    href="<?php echo RUTA_URL;?>/aulas/borrar/<?php echo $aulas['id']; ?>"      class="btn btn-sm btn-danger"><i class="text-white fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>