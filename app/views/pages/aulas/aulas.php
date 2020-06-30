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
            <a href="<?php echo RUTA_URL; ?>/aulas/agregar" class="text-secondary">Nuevo <i class="fas fa-file-alt"></i></a>
            <a href="<?php echo RUTA_URL; ?>/aulas/horarios" class="text-secondary ml-3">Horarios de uso <i class="fas fa-clock"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h5>Aulas</h5>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-10">

           <form action="<?php echo RUTA_URL;?>/aulas/buscar"    method="get" enctype="multipart/form-data">
            <div class="row form-group">
                <div class="col-md-9 mb-2">
                    <input  name="inputBuscador"  required   id="inputBuscador" type="text" class="form-control" placeholder="Buscar...">
                </div>
                <div class="col-md-3">
                    <select class="form-control"    name="selectBuscador"  id="selectBuscador">
                        <option value='1'>ID</option>
                        <option value='2'>Nombre</option>
                        
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
            <a href="<?php echo RUTA_URL; ?>/aulas" class="text-secondary"><i class="fas fa-arrow-left"></i></i>  Regresar a ver todos</a>
        </div>

             <?php
                 } 
             ////////////////////////////////////////?>
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