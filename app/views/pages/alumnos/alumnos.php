<?php
session_start();
include RUTA_APP . '/views/inc/header.inc.php';
?>
<div class="container">
    <?php if(!isset($_SESSION['usuario'])) {?>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="card bg-warning">
                    <div class="card-header">  Avisos  </div>
                    <div class="card-body">  No tiene acceso... vaya a login</div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    <?php } else { ?>

    <div class="controllers">
   
        <a href="<?php echo RUTA_URL; ?>/alumnos/agregar" id="agregar" class="btn btn-info btn-sm float-right"> <i class="fa fa-plus"></i> </a>
    </div>

    <table class="table">
        <thead>
           
            <tr>
                <th>NoControl</th>
                <th>Nombres</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Opciones</th>
                
            </tr>
        </thead>

        <tbody>
            <?php foreach($datos['Alumnos'] as $alumno): ?>
                <tr>
                    <td><?php echo $alumno['noControl']; ?></td>
                    <td><?php echo $alumno['nombres']; ?></td>
                    <td><?php echo $alumno['apellidoP']; ?></td>
                    <td><?php echo $alumno['apellidoM']; ?></td>
                 
                   
                    <td><a class="btn btn-sm btn-success" href="<?php echo RUTA_URL;?>/alumnos/editar/<?php echo $alumno['noControl']; ?>"><i class="fa fa-edit"></i></a>
                        &nbsp;
                        <a class="btn btn-sm btn-danger" href="<?php echo RUTA_URL;?>/alumnos/borrar/<?php echo $alumno['noControl']; ?>"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            <?php }?>
</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>

