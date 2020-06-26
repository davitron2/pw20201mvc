<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>



<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/grupos/agregar" class="text-secondary">Nuevo <i class="fas fa-file-alt"></i></a>
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
                    <th scope="col">Materia</th>
                    <th scope="col">Docente</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Límite</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['Grupos'] as $grupo): ?>
                        <tr>
                        <td><?php echo $grupo['grupo.id']; ?></td>
                        <td><?php echo $grupo['materia.nombre']; ?></td>
                        <td><?php echo $grupo['personal.nombre'] . " " . $grupo['personal.apellidoP']; ?></td>
                        <td><?php echo $grupo['grupo.grupo']; ?></td>
                        <td><?php echo $grupo['grupo.limite']; ?></td>
                            <td>
                                <a    href="<?php echo RUTA_URL;?>/reticulas/editar/<?php echo $personal['id']; ?>"   class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar grupo"><i class="text-white fas fa-edit"></i></a>
                                <a    href="<?php echo RUTA_URL;?>/reticulas/borrar/<?php echo $personal['id']; ?>"      class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar grupo"><i class="text-white fas fa-trash"></i></a>
                                <a    href="<?php echo RUTA_URL;?>/reticulamaterias/<?php echo $personal['id']; ?>"      class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Ver horario"><i class="text-white far fa-calendar-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>