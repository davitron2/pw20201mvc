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

<div class="row py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL;?>/horarios/HorarioDocentePdf" target="_blank" class="text-secondary ml-3">Imprimir <i class="fas fa-print"></i></i></a>
        </div>
</div>

<h5 class="titulo-pagina">Horario</h5>
<div class="container">
    <table class="table table-striped table-bordered tabla-horario">
        <thead>
            <tr>
                <th scope="col">Materia</th>
                <th scope="col">Grupo</th>
                <th scope="col">Lunes</th>
                <th scope="col">Martes</th>
                <th scope="col">Mi&eacute;rcoles</th>
                <th scope="col">Jueves</th>
                <th scope="col">Viernes</th>
                <th scope="col">S&aacute;bado</th>
            </tr>
        </thead>
        <tbody>
            <?php 
             foreach($datos['horario'] as $horario): ?>
                <tr>
                    <td><?php echo $horario['Materia']; ?></td>
                    <td><?php echo $horario['Grupo']; ?></td>
                    <td><?php echo $horario['Lunes']; ?></td>
                    <td><?php echo $horario['Martes']; ?></td>
                    <td><?php echo $horario['Miercoles']; ?></td>
                    <td><?php echo $horario['Jueves']; ?></td>
                    <td><?php echo $horario['Viernes']; ?></td>
                    <td><?php echo $horario['Sabado']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>


<script>
$(function  (){

$('#pdf').on('click',function(){

$.ajax({
    type:'GET',
    url:"<?php echo RUTA_URL;?>/horarios/HorarioDocentePdf",
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