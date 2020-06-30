<?php 

include RUTA_APP . '/views/inc/header.inc.php';
if(isset($_SESSION['alumno'])) { 
    
    
}else{

    $url= ''.RUTA_URL.'/logins/logins';
    header("Location:      $url"); 
}

?>

<div class="container-fluid">
<div class="col">
          
            <a href="<?php echo RUTA_URL;?>/alumnos/HorarioPdf"  target="_blank"   id="pdf" name="pdf"   class="text-secondary ml-3">Imprimir Horario <i class="fas fa-print"></i></i></a>
        </div>
    <h5 class="titulo-pagina">Horario</h5>
    <div class="table-responsive">
        <table class="table table-bordered table-sm tabla-info-alumno">
            <thead>
                <th scope="col">No. Control</th>
                <th scope="col">Nombre del Alumno</th>
                <th scope="col">Semestre</th>
            </thead>
            <tbody>
                <td><?php echo $datos['alumno']['noControl'] ?></td>
                <td><?php echo $datos['alumno']['nombres'] . ' ' . $datos['alumno']['apellidoP'] . ' ' . $datos['alumno']['apellidoM'] ?></td>
                <td><?php echo $datos['alumno']['semestre'] ?></td>
            </tbody>
        </table>
        <table class="table table-bordered table-sm tabla-info-alumno">
            <thead>
                <th scope="col">Carrera</th>
            </thead>
            <tbody>
            <td><?php echo $datos['carrera']['nombre']; ?></td>
            </tbody>
        </table>
        <table class="table table-bordered table-striped tabla-horario">
            <thead>
                <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Gpo</th>
                    <th scope="col">Cr</th>
                    <th scope="col">Lunes</th>
                    <th scope="col">Martes</th>
                    <th scope="col">Miércoles</th>
                    <th scope="col">Jueves</th>
                    <th scope="col">Viernes</th>
                    <th scope="col">Sábado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos['horarios'] as $horario): ?>
                        <tr>
                            <td><?php echo $horario['materia'];?></td>
                            <td><?php echo $horario['grupo'];?></td>
                            <td><?php echo $horario['creditos'];?></td>
                            <td><?php echo $horario['Lunes'];?></td>
                            <td><?php echo $horario['Martes'];?></td>
                            <td><?php echo $horario['Miercoles'];?></td>
                            <td><?php echo $horario['Jueves'];?></td>
                            <td><?php echo $horario['Viernes'];?></td>
                            <td><?php echo $horario['Sabado'];?></td>
                            
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>