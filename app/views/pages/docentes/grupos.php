<?php include RUTA_APP . '/views/inc/header.inc.php'; ?>
<h5 class="titulo-pagina">Grupos</h5>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-bordered tabla-horario">
            <thead>
                <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($datos['grupos'] as $grupo): ?>
                    <tr>
                        <td><?php echo $grupo['Materia']; ?></td>
                        <td><?php echo $grupo['Grupo']; ?></td>
                        <td>
                            <a href="<?php echo RUTA_URL;?>/grupos/lista/<?php echo $grupo['id']; ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Lista">Lista</a>
                            <a href="<?php echo RUTA_URL;?>/grupos/parcial/<?php echo $grupo['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Parcial">Parcial</a>
                            <a href="<?php echo RUTA_URL;?>/grupos/final/<?php echo $grupo['id']; ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Parcial">Final</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>