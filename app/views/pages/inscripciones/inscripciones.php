<?php 

include RUTA_APP . '/views/inc/header.inc.php';
if(isset($_SESSION['alumno'])) { 
    
    
}else{

    $url= ''.RUTA_URL.'/logins/logins';
    header("Location:      $url"); 
}

?>

<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col text-center">
            <h4>Inscripciones</h4>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Creditos</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['Materias'] as $materia): ?>
                        <tr>
                        <td id="nombreMateria<?php echo $materia['idMateria'];?>"><?php echo $materia['nombre']; ?></td>
                        <td><?php echo $materia['creditos']; ?></td>
                            <td>
                                <button id="<?php echo $materia['idMateria'];?>" class="btn btnMateria btn-primary text-white" data-toggle="modal" data-target="#modalSeleccionarGrupo">Ver grupos disponibles</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row py-2 px-4 mt-5">
        <div class="col text-center">
            <h5>Clases registradas</h5>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Grupo</th>
                        <th scope="col">Docente</th>
                        <th scope="col">Lunes</th>
                        <th scope="col">Martes</th>
                        <th scope="col">Miércoles</th>
                        <th scope="col">Jueves</th>
                        <th scope="col">Viernes</th>
                        <th scope="col">Sábado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['Horarios'] as $horario): ?>
                        <tr>
                            <td><?php echo $horario['grupo'];?></td>
                            <td><?php echo $horario['nombre'] . ' ' . $horario['apellidoP'] . ' ' . $horario['apellidoM'] ; ?></td>
                            <td><?php echo $horario['Lunes'];?></td>
                            <td><?php echo $horario['Martes'];?></td>
                            <td><?php echo $horario['Miercoles'];?></td>
                            <td><?php echo $horario['Jueves'];?></td>
                            <td><?php echo $horario['Viernes'];?></td>
                            <td><?php echo $horario['Sabado'];?></td>
                            <td><button id="<?php echo $horario['id'];?>" class ="btn btnClase btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="text-white fas fa-trash"></i></button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    (function() {
        $('.btnMateria').click(function() { 
            var id = $(this).attr('id');
            var td = '#nombreMateria'+id
            var materia = $(td).text();
            $('#spanNombreMateria').text(materia);
            $('#hiddenIdMateria').val(id);
        });
        $('.btnClase').click(function() { 
            var id = $(this).attr('id');
            var ruta = '<?php echo RUTA_URL;?>/Inscripciones/desinscribirGrupo';
            console.log('click');
            $.post(
                ruta,
                {idAlumoGrupo:id},
                res=>{
                    location.reload(); 
                }
            );
        });

    })();
</script>
<?php include RUTA_APP . '/views/inc/buscador_grupos.php'; ?>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>