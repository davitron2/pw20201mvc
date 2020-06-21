<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>
<div class="container-fluid">
    <div class="row bg-dark py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/personales/agregar" class="text-white">Nuevo <i class="fas fa-file-alt"></i></a>
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
                        <option>Apellido Paterno</option>
                        <option>Apellido Materno</option>
                        <option>Nombre de usuario</option>
                        <option>Tipo de usuario</option>
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
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Nombre de usuario</th>
                    <th scope="col">Tipo de usuario</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($datos['Personal'] as $personal): ?>
                    <tr>
                    <td><?php echo $personal['id']; ?></td>
                    <td><?php echo $personal['nombre']; ?></td>
                    <td><?php echo $personal['apellidoP']; ?></td>
                    <td><?php echo $personal['apellidoM']; ?></td>
                    <td><?php echo $personal['usuario']; ?></td>
                    <td><?php echo $personal['tipoUsuario']; ?></td>
                 
            
                        <td>
                            <a    href="<?php echo RUTA_URL;?>/personales/editar/<?php echo $personal['id']; ?>"   class="btn btn-sm btn-warning"><i class="text-white fas fa-edit"></i></a>
                            <a    href="<?php echo RUTA_URL;?>/personales/borrar/<?php echo $personal['id']; ?>"      class="btn btn-sm btn-danger"><i class="text-white fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>