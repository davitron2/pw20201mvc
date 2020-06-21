<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>
<div class="container-fluid">
    <div class="row bg-dark py-2 px-4">
        <div class="col">
            <a href ="#" class="text-white text-bold"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <h4>Agregar personal</h4>
            <form action="">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                        <input id="inputID" type="text" class="form-control" required disabled>
                        <label for="inputID" class="floating-label">ID</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input id="inputNombre" type="text" class="form-control" required>
                        <label for="inputNombre" class="floating-label">Nombre</label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <select id="selectTipoUsuario"class="form-control" required>
                            <option value="1">Administrativo</option>
                            <option value="2">Docente</option>
                        </select> 
                        <label for="selectTipoUsuario" class="floating-label">Tipo de Usuario</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input id="inputApellidoPaterno" type="text" class="form-control" required>
                        <label for="inputApellidoPaterno" class="floating-label">Apellido paterno</label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <input id="inputApellidoMaterno" type="text" class="form-control" required>
                        <label for="inputApellidoMaterno" class="floating-label">Apellido materno</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-2">
                        <input id="inputNombreUsuario" type="text" class="form-control" autocomplete="off" required>
                        <label for="inputNombreUsuario" class="floating-label">Nombre de usuario</label>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <input id="inputContrasena" type="password" class="form-control" autocomplete="off" required> 
                        <label for="inputContrasena" class="floating-label">Contraseña</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="button" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>