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
            <a href="<?php echo RUTA_URL; ?>/aulas" class="text-secondary"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
            <a href="<?php echo RUTA_URL;?>/aulas/HorarioAulasPdf"  target="_blank"   id="pdf" name="pdf"   class="text-secondary ml-3">Imprimir <i class="fas fa-print"></i></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h5>Horarios de uso de aulas</h5>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-11">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Aula</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Docente</th>
                        <th scope="col">Materia</th>
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
                        <td><?php echo $horario['aula']; ?></td>
                        <td><?php echo $horario['grupo']; ?></td>
                        <td><?php echo $horario['profesor']; ?></td>
                        <td><?php echo $horario['materia']; ?></td>
                        <td><?php echo $horario['lunes']; ?></td>
                        <td><?php echo $horario['martes']; ?></td>
                        <td><?php echo $horario['miercoles']; ?></td>
                        <td><?php echo $horario['jueves']; ?></td>
                        <td><?php echo $horario['viernes']; ?></td>
                        <td><?php echo $horario['sabado']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>

<script>
$(function  (){

$('#pdf').on('click',function(){

$.ajax({
    type:'GET',
    url:"<?php echo RUTA_URL;?>/horarios/HorarioAulasPdf",
    dataType:'json',
    success: function(respuesta){
        if(respuesta.hecho){
            alert('archivo creado con exito');
        }
    },
    error: function(e){
        console.log(e.responseText);
    }

});


});



});

</script>
