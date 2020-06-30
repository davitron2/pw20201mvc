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
        <a href="<?php echo RUTA_URL; ?>/grupos" class="text-secondary"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <h4>Horario</h4>
            <form action="<?php echo RUTA_URL;?>/grupos/agregarhorario/<?php echo $datos['idGrupo'];?>" method="post" enctype="multipart/form-data" onsubmit="return validateFields();">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                        <label for="inputID" class="label-for-disabled">ID</label>
                        <input id="inputID" name="inputID" type="text" class="form-control" required readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-lg-3 mb-2">
                        <label for="inputIdAula" class="label-for-disabled">ID Aula</label>
                        <input id="inputIdAula"   name="inputIdAula" type="text" class="form-control" required readonly>
                    </div>
                    <div class="col-9 col-lg-3 mb-2">
                        <label for="inputNombreAula" class="label-for-disabled">Aula</label>
                        <input id="inputNombreAula"   name="inputNombreAula" type="text" class="form-control" required disabled>
                    </div>
                    <div class="col-2 mb-2">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalSeleccionarAula" formnovalidate><i class="fas fa-search text-white"></i></button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <select id="selectDiaSemana" name="selectDiaSemana" class="form-control" required>
                            <option value="1" selected>Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miércoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                            <option value="6">Sábado</option>
                        <select>
                        <label for="inputID" class="floating-label">Día de la semana</label>
                    </div>
                </div>

                <div class="row form-group" >
                    <div class="col-lg-3">
                        <label for="inputHoraInicio" class="label-for-disabled">Hora inicio</label>
                        <input id="inputHoraInicio" name="inputHoraInicio" class="form-control" type="time" required >
                    </div>
                    <div class="col-lg-3">
                        <label for="inputHoraFin" class="label-for-disabled">Hora fin</label>
                        <input id="inputHoraFin" name="inputHoraFin" class="form-control" type="time" required >
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <button type="submit" class="btn btn-success">Guardar <i class="fas fa-save text-white"></i></button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Día de la semana</th>
                    <th scope="col">Hora inicio</th>
                    <th scope="col">Hora fin</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['Horarios'] as $horario): ?>
                        <tr>
                        <td><?php
                                switch($horario['diaSemana']){
                                    case 1:echo 'Lunes';break;
                                    case 2:echo 'Martes';break;
                                    case 3:echo 'Miércoles';break;
                                    case 4:echo 'Jueves';break;
                                    case 5:echo 'Viernes';break;
                                    case 6:echo 'Sábado';break;
                                } 
                         ?></td>
                        <td><?php echo $horario['horaInicio']; ?></td>
                        <td><?php echo $horario['horaFin']; ?></td>
                        <td><?php echo $horario['nombre']; ?></td>
                            <td>
                            <form action="<?php echo RUTA_URL;?>/grupos/borrarhorario/<?php echo $horario['id']; ?>  "    method="post" enctype="multipart/form-data">
                            <input id="inputIdGrupo" value="<?php echo $datos['idGrupo']  ?>"  name="inputIdGrupo" type="text" class="form-control" hidden readonly>      
                    <button  type="submit"  data-toggle="tooltip" data-placement="top" title="Eliminar Horario"  class="btn btn-sm btn-danger"><i class="text-white fas fa-trash"></i></button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    function validateFields(){
        var horaInicio = $('#inputHoraInicio').val();
        var horaFin = $('#inputHoraFin').val();
        var formato = "hh:mm";
        var momentoInicio = moment(horaInicio,formato);
        var momentoFin = moment(horaFin,formato);
        if(!momentoInicio.isBefore(momentoFin)){
            showErrorModal('La hora de inicio debe ser anterior a la hora de fin');
            return false
        }
        if(!$('#inputIdAula').val()){
            showErrorModal('Seleccione un Aula');
            return false
        }
    }
</script>


<?php include RUTA_APP . '/views/inc/buscador_aula.php'; ?>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>
