<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php';

if(isset($_SESSION['usuario'])) { 
    if($_SESSION['usuario']['tipoUsuario']==1){
      
        }else{
            $url= ''.RUTA_URL.'/logins/logins';
            header("Location:      $url"); 
        }
        
}else{

    $url= ''.RUTA_URL.'/logins/logins';
    header("Location:      $url"); 
}

?>

<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col">
        <a href="<?php echo RUTA_URL;?>/reticulamaterias/<?php echo $datos['reticula']; ?>" class="text-secondary"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h5>Añadir materia a retícula</h5>
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
                        <option>Creditos</option>
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
                        <th scope="col">Creditos</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datos['materias'] as $personal): ?>
                            <tr>
                            <td><?php echo $personal['id']; ?></td>
                            <td><?php echo $personal['nombre']; ?></td>
                            <td><?php echo $personal['creditos']; ?></td>
                            <td><?php echo $personal['unidades']; ?></td>
                                <td>
                                    <form action="<?php echo RUTA_URL;?>/reticulamaterias/agregar/<?php echo $datos['reticula']; ?>"  method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="idMateria" value="<?php echo $personal['id']; ?>">
                                        <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Añadir materia"><i class="text-white fas fa-book"></i></button>
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
