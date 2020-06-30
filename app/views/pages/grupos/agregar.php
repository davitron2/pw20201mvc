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
            <h4>Agregar grupo</h4>
            <form action="<?php echo RUTA_URL;?>/grupos/agregar"  method="post" enctype="multipart/form-data" onsubmit="return validateDisabledFields()">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                        <input id="inputID" type="text" class="form-control" required disabled>
                        <label for="inputID" class="floating-label">ID</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-lg-3 mb-2">
                        <label for="inputIdMateria" class="label-for-disabled">Id Materia</label>
                        <input id="inputIdMateria"   name="inputIdMateria" type="text" class="form-control" required readonly>
                    </div>
                    <div class="col-9 col-lg-4 mb-2">
                        <label for="inputNombreMateria" class="label-for-disabled">Materia</label>
                        <input id="inputNombreMateria"   name="inputNombreMateria" type="text" class="form-control" required disabled>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalSeleccionarMateria" formnovalidate><i class="fas fa-search text-white"></i></button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-lg-3 mb-2">
                        <label for="inputIdProfesor" class="label-for-disabled">Id Docente</label>
                        <input id="inputIdProfesor"   name="inputIdProfesor" type="text" class="form-control" required readonly>
                    </div>
                    <div class="col-9 col-lg-4 mb-2">
                        <label for="inputNombreDocente" class="label-for-disabled">Docente</label>
                        <input id="inputNombreDocente"   name="inputNombreDocente" type="text" class="form-control" required disabled>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#modalSeleccionarProfesor" formnovalidate><i class="fas fa-search text-white"></i></button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6 col-lg-3">
                        <input id="inputLimite" name="inputLimite" type="number" class="form-control" required>
                        <label for="inputLimite" class="floating-label">Limite alumnos</label>
                    </div>
                    <div class="col-6 col-lg-4">
                        <input id="inputGrupo" name="inputGrupo" type="text" maxlength="2" class="form-control" required>
                        <label for="inputGrupo" class="floating-label">Nombre grupo</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Guardar <i class="fas fa-save text-white"></i></button>
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