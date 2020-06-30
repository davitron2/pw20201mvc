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
            <a href="<?php echo RUTA_URL; ?>/reticulas/agregar" class="text-secondary">Nuevo <i class="fas fa-file-alt"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <h5>Retículas</h5>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-10">

        <form action="<?php echo RUTA_URL;?>/reticulas/buscar"    method="get" enctype="multipart/form-data">
            <div class="row form-group">
                <div class="col-md-9 mb-2">
                    <input  name="inputBuscador"  required   id="inputBuscador" type="text" class="form-control" placeholder="Buscar...">
                </div>
                <div class="col-md-3">
                    <select class="form-control"    name="selectBuscador"  id="selectBuscador">
                        <option value='1'>ID</option>
                        <option value='2'>Carrera</option>
                        <option  value='3'>Creditos</option>
                        <option  value='4'>Año</option>
                        
                    </select>
                    
                </div>
                
            </div>
        </form>

            
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
        <?php if(isset($datos['tipoVista'])   ) { ///////////////////////////////?>
            <h4>Resultados de la busqueda</h4>
            <div class="col">
            <a href="<?php echo RUTA_URL; ?>/reticulas" class="text-secondary"><i class="fas fa-arrow-left"></i></i>  Regresar a ver todos</a>
        </div>

             <?php
                 } 
             ////////////////////////////////////////?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Créditos máximos por periodo</th>
                    <th scope="col">Año de registro</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['Reticulas'] as $personal): ?>
                        <tr>
                        <td><?php echo $personal['id']; ?></td>
                        <td><?php echo $personal['nombre']; ?></td>
                        <td><?php echo $personal['max_creditos']; ?></td>
                        <td><?php echo $personal['anio']; ?></td>
                            <td>
                                <a    href="<?php echo RUTA_URL;?>/reticulas/editar/<?php echo $personal['id']; ?>"   class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar retícula"><i class="text-white fas fa-edit"></i></a>
                                <a    href="<?php echo RUTA_URL;?>/reticulas/borrar/<?php echo $personal['id']; ?>"      class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar retícula"><i class="text-white fas fa-trash"></i></a>
                                <a    href="<?php echo RUTA_URL;?>/reticulamaterias/<?php echo $personal['id']; ?>"      class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Ver materias en retícula"><i class="text-white fas fa-book"></i></a>
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