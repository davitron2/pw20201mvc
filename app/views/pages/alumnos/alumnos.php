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
            <a href="<?php echo RUTA_URL; ?>/alumnos/agregar" class="text-secondary">Nuevo <i class="fas fa-file-alt"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h5>Alumnos</h5>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-10">
        <form action="<?php echo RUTA_URL;?>/alumnos/buscar"    method="get" enctype="multipart/form-data">
            <div class="row form-group">
                <div class="col-md-9 mb-2">
                    <input  name="inputBuscador"  required   id="inputBuscador" type="text" class="form-control" placeholder="Buscar...">
                </div>
                <div class="col-md-3">
                    <select class="form-control"    name="selectBuscador"  id="selectBuscador">
                        <option value='1'>noControl</option>
                        <option value='2'>Nombre</option>
                        <option value='3'>Apellido Paterno</option>
                        <option  value='4'>Apellido Materno</option>
                        <option  value='5'>Semestre</option>
                        <option  value='6'>Carrera</option>
                        <option  value='7'>idReticula</option>
                     
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
            <a href="<?php echo RUTA_URL; ?>/alumnos" class="text-secondary"><i class="fas fa-arrow-left"></i></i>  Regresar a ver todos</a>
        </div>

             <?php
                 } 
             ////////////////////////////////////////?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">noControl</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">idReticula</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($datos['Alumnos'] as $alumnos): ?>
                    <tr>
                    <td><?php echo $alumnos['noControl']; ?></td>
                    <td><?php echo $alumnos['nombres']; ?></td>
                    <td><?php echo $alumnos['apellidoP']; ?></td>
                    <td><?php echo $alumnos['apellidoM']; ?></td>
                    <td><?php echo $alumnos['semestre']; ?></td>
                    <td><?php echo $alumnos['nombre']; ?></td>
                    <td><?php echo $alumnos['idReticula']; ?></td>
                 
            
                        <td>
                            <a    href="<?php echo RUTA_URL;?>/alumnos/editar/<?php echo $alumnos['noControl']; ?>"   class="btn btn-sm btn-warning"><i class="text-white fas fa-edit"></i></a>
                            <a    href="<?php echo RUTA_URL;?>/alumnos/borrar/<?php echo $alumnos['noControl']; ?>"      class="btn btn-sm btn-danger"><i class="text-white fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>