<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>

<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/reticulamaterias/agregar/<?php echo $datos['id']; ?>" class="text-secondary">Agregar materia <i class="fas fa-file-alt"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h5>Materias en Retícula</h5>
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
                            <th scope="col">ID Materia</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Créditos</th>
                            <th scope="col">Unidades</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datos['materias'] as $materia): ?>
                            <tr>
                            <td><?php echo $materia['id']; ?></td>
                            <td><?php echo $materia['idMateria']; ?></td>
                            <td><?php echo $materia['nombre']; ?></td>
                            <td><?php echo $materia['creditos']; ?></td>
                            <td><?php echo $materia['unidades']; ?></td>
                                <td>
                                    <form action="<?php echo RUTA_URL;?>/reticulamaterias/borrar/<?php echo $materia['id']; ?>"  method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar materia de retícula"><i class="text-white fas fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    
</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>