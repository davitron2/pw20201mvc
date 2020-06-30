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
            <h4>Editar grupo</h4>
            <form action="<?php echo RUTA_URL;?>/grupos/borrar/<?php echo $datos['id'] ?>"  method="post" enctype="multipart/form-data" onsubmit="return validateDisabledFields()">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                    <label for="inputID" class="label-for-disabled">ID</label>
                        <input id="inputID" type="text" class="form-control" value="<?php echo $datos['id'] ?>"   required disabled>
                       
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-lg-3 mb-2">
                        <label for="inputIdMateria" class="label-for-disabled">Id Materia</label>
                        <input id="inputIdMateria"   name="inputIdMateria" type="text"   value="<?php echo $datos['idMateria'] ?>"     class="form-control" required readonly>
                    </div>
                    <div class="col-9 col-lg-4 mb-2">
                        <label for="inputNombreMateria" class="label-for-disabled">Materia</label>
                        <input id="inputNombreMateria"  value="<?php echo $datos['materia'] ?>"         name="inputNombreMateria" type="text" class="form-control" required disabled>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalSeleccionarMateria" formnovalidate><i class="fas fa-search text-white"></i></button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-lg-3 mb-2">
                        <label for="inputIdProfesor" class="label-for-disabled">Id Docente</label>
                        <input id="inputIdProfesor"   name="inputIdProfesor" type="text"  value="<?php echo $datos['idProfesor'] ?>"      class="form-control" required readonly>
                    </div>
                    <div class="col-9 col-lg-4 mb-2">
                        <label for="inputNombreDocente" class="label-for-disabled">Docente</label>
                        <input id="inputNombreDocente"    value="<?php echo $datos['profesor'] ?>"  name="inputNombreDocente" type="text" class="form-control" required disabled>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#modalSeleccionarProfesor" formnovalidate><i class="fas fa-search text-white"></i></button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6 col-lg-3">
                    <label for="inputLimite"  class="label-for-disabled">Limite alumnos</label>
                        <input id="inputLimite" required disabled name="inputLimite" type="number" class="form-control" value="<?php echo $datos['limite'] ?>"  required>
                        
                    </div>
                    <div class="col-6 col-lg-4">
                    <label for="inputGrupo"  class="label-for-disabled">Nombre grupo</label>
                        <input id="inputGrupo" required disabled name="inputGrupo" type="text" maxlength="2" class="form-control" value="<?php echo $datos['grupo'] ?>"  required>
                       
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <button type="submit" class="btn btn-danger">Borrar <i class="text-white fas fa-trash"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
<script>
    function validateDisabledFields(){
        if(!$('#inputIdMateria').val() || !$('#inputIdProfesor').val()){
           showErrorModal('Seleccione una Materia y Profesor')
            return false;
        }
    }
</script>
<?php include RUTA_APP . '/views/inc/buscador_materia.php'; ?>
<?php include RUTA_APP . '/views/inc/buscador_profesor.php'; ?>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>