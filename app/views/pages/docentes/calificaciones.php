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
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <h4>Calificaciones</h4>
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered tabla-horario">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2">No. Control</th>
                            <th scope="col" rowspan="2">Alumno</th>
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
                        <?php 
                        foreach($datos['alumnos'] as $alumno): ?>
                            <tr> 
                                <td><?php echo $alumno['noControl']; ?></td>
                                <td><?php echo $alumno['Alumno']; ?></td>
                                <td><?php echo $alumno['unidad1']; ?></td> <!-- 1 -->
                                <td><?php echo $alumno['unidad2']; ?></td> <!-- 2 -->
                                <td><?php echo $alumno['unidad3']; ?></td> <!-- 3 -->
                                <td><?php echo $alumno['unidad4']; ?></td> <!-- 4 -->
                                <td><?php echo $alumno['unidad5']; ?></td> <!-- 5 -->
                                <td><?php echo $alumno['unidad6']; ?></td> <!-- 6 -->
                                <td><?php echo $alumno['unidad7']; ?></td> <!-- 7 -->
                                <td>
                                    <a href="<?php echo RUTA_URL;?>/grupos/calificar/<?php echo $alumno['id']; ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Calificar">Calificar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>