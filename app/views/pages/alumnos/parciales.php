<?php 

include RUTA_APP . '/views/inc/header.inc.php';
if(isset($_SESSION['alumno'])) { 
    
    
}else{

    $url= ''.RUTA_URL.'/logins/logins';
    header("Location:      $url"); 
}

?>

<div class="col">
          
          <a href="<?php echo RUTA_URL;?>/alumnos/calificacionPdf"  target="_blank"   id="pdf" name="pdf"   class="text-secondary ml-3">Imprimir Calificaciones<i class="fas fa-print"></i></i></a>
      </div>
<h5 class="titulo-pagina">Calificaciones</h5>
<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered table-sm tabla-info-alumno">
            <thead>
                <th scope="col">No. Control</th>
                <th scope="col">Nombre del Alumno</th>
            </thead>
            <tbody>
                <td><?php echo $datos['alumno']['noControl'] ?></td> <!-- Numero de control -->
                <td><?php echo $datos['alumno']['apellidoP'] . ' ' . $datos['alumno']['apellidoM'] . ' ' .$datos['alumno']['nombres'] ?></td> <!-- Nombre -->
            </tbody>
        </table>
        <table class="table table-bordered table-sm tabla-parciales">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">Materia</th>
                    <th scope="col" rowspan="2">Grupo</th>
                    <th scope="col" colspan="7">Unidades</th>    
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
                <?php foreach($datos['materias'] as $materia): ?>
                    <tr> 
                        <td><?php echo $materia['Materia'] ?></td> <!-- Materia  -->
                        <td><?php echo $materia['Grupo'] ?></td> <!-- Grupo -->
                        <td><?php echo $materia['unidad1'] ?></td> <!-- 1 -->
                        <td><?php echo $materia['unidad2'] ?></td> <!-- 2 -->
                        <td><?php echo $materia['unidad3'] ?></td> <!-- 3 -->
                        <td><?php echo $materia['unidad4'] ?></td> <!-- 4 -->
                        <td><?php echo $materia['unidad5'] ?></td> <!-- 5 -->
                        <td><?php echo $materia['unidad6'] ?></td> <!-- 6 -->
                        <td><?php echo $materia['unidad7'] ?></td> <!-- 7 -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>