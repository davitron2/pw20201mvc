<?php 

include RUTA_APP . '/views/inc/header.inc.php';

if(isset($_SESSION['usuario'])) { 
    if($_SESSION['usuario']['tipoUsuario']==2){
      
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
            <a href="<?php echo RUTA_URL; ?>/grupos/docente" class="text-secondary"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <h5 class="titulo-pagina">Calificaciones</h5>
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered table-sm tabla-parciales">
                    <thead>
                        <th scope="col">No. Control</th>
                        <th scope="col">Nombre del Alumno</th>
                    </thead>
                    <tbody>
                        <td><?php echo $datos['alumno']['noControl']?></td> <!-- Numero de control -->
                        <td><?php echo $datos['alumno']['Alumno']?></td>
                    </tbody>
                </table>
                <form action="<?php echo RUTA_URL; ?>/alumnos/calificar/<?php echo $datos['alumno']['id']; ?>" method="POST">
                    <table class="table table-striped table-sm table-bordered tabla-parciales">
                        <thead>
                            <tr>
                                <th scope="col" colspan="7">Unidades</th>
                                <th scope="col" rowspan="2">Opciones</th>
                            </tr>
                            <tr>
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                                <th scope="col">5</th>
                                <th scope="col">6</th>
                                <th scope="col">7</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <td><input type="text" class="form-control" id="unidad1" name="unidad1" value="<?php echo $datos['alumno']['unidad1']; ?>" 
                                    <?php $unidades=$datos['alumno']['unidades']; if(1 <= $unidades) {echo '';} else {echo 'readonly';} ?> /></td> <!-- 1 -->
                                <td><input type="text" class="form-control" id="unidad2" name="unidad2" value="<?php echo $datos['alumno']['unidad2']; ?>" 
                                    <?php $unidades=$datos['alumno']['unidades']; if(2 <= $unidades) {echo '';} else {echo 'readonly';} ?> /></td> <!-- 2 -->
                                <td><input type="text" class="form-control" id="unidad3" name="unidad3" value="<?php echo $datos['alumno']['unidad3']; ?>" 
                                    <?php $unidades=$datos['alumno']['unidades']; if(3 <= $unidades) {echo '';} else {echo 'readonly';} ?> /></td> <!-- 3 -->
                                <td><input type="text" class="form-control" id="unidad4" name="unidad4" value="<?php echo $datos['alumno']['unidad4']; ?>" 
                                    <?php $unidades=$datos['alumno']['unidades']; if(4 <= $unidades) {echo '';} else {echo 'readonly';} ?> /></td> <!-- 4 -->
                                <td><input type="text" class="form-control" id="unidad5" name="unidad5" value="<?php echo $datos['alumno']['unidad5']; ?>" 
                                    <?php $unidades=$datos['alumno']['unidades']; if(5 <= $unidades) {echo '';} else {echo 'readonly';} ?> /></td> <!-- 5 -->
                                <td><input type="text" class="form-control" id="unidad6" name="unidad6" value="<?php echo $datos['alumno']['unidad6']; ?>" 
                                    <?php $unidades=$datos['alumno']['unidades']; if(6 <= $unidades) {echo '';} else {echo 'readonly';} ?> /></td> <!-- 6 -->
                                <td><input type="text" class="form-control" id="unidad7" name="unidad7" value="<?php echo $datos['alumno']['unidad7']; ?>" 
                                    <?php $unidades=$datos['alumno']['unidades']; if(7 <= $unidades) {echo '';} else {echo 'readonly';} ?> /></td> <!-- 7 -->
                                <td>
                                    <button type="submit" class="btn btn-success">Calificar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>