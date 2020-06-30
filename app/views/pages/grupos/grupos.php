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
            <a href="<?php echo RUTA_URL; ?>/grupos/agregar" class="text-secondary">Nuevo <i class="fas fa-file-alt"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h5>Grupos</h5>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-10">

            
        <form action="<?php echo RUTA_URL;?>/grupos/buscar"    method="get" enctype="multipart/form-data">
            <div class="row form-group">
                <div class="col-md-9 mb-2">
                    <input  name="inputBuscador"  required   id="inputBuscador" type="text" class="form-control" placeholder="Buscar...">
                </div>
                <div class="col-md-3">
                    <select class="form-control"    name="selectBuscador"  id="selectBuscador">
                        <option value='1'>ID</option>
                        <option value='2'>Materia</option>
                        <option value='3'>Docente</option>
                        <option  value='4'>Nombre</option>    
                        <option  value='5'>Limite</option>           
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
            <a href="<?php echo RUTA_URL; ?>/grupos" class="text-secondary"><i class="fas fa-arrow-left"></i></i>  Regresar a ver todos</a>
        </div>

             <?php
                 } 
             ////////////////////////////////////////?>

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
                        <td><?php echo $grupo['id']; ?></td>
                        <td><?php echo $grupo['materia']; ?></td>
                        <td><?php echo $grupo['profesor'] . " " . $grupo['apellidoP'] . " " . $grupo['apellidoM']; ?></td>
                        <td><?php echo $grupo['grupo']; ?></td>
                        <td><?php echo $grupo['limite']; ?></td>
                            <td>
                                <a    href="<?php echo RUTA_URL;?>/grupos/editar/<?php echo $grupo['id']; ?>"   class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar grupo"><i class="text-white fas fa-edit"></i></a>
                                <a    href="<?php echo RUTA_URL;?>/grupos/borrar/<?php echo $grupo['id']; ?>"      class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar grupo"><i class="text-white fas fa-trash"></i></a>
                                <a    href="<?php echo RUTA_URL;?>/grupos/horarios/<?php echo $grupo['id']; ?>"      class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Ver horario"><i class="text-white fas fa-calendar-week"></i></a>
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