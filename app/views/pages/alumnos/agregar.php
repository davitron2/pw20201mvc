<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>


<div class="container">
    <br>
    <div class="controllers">
        <a href="<?php echo RUTA_URL; ?>/alumnos" id="volver" class="btn btn-info btn-sm float-right mt-3 mb-3" title="Volver"> <i class="fa fa fa-backward"></i></a>
    </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="card aqua">
                    <div class="card-header">
                     Agregar <i class="fas fa-cart-plus text-warning float-right"></i>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo RUTA_URL;?>/alumnos/agregar" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" aria-describedby="claveAyuda" required>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="apellidoP">apellido Paterno</label>
                                        <input type="text" class="form-control" id="apellidoP" name="apellidoP" aria-describedby="descripcionAyuda" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="apellidoM">apellido Materno</label>
                                        <input type="text" class="form-control" id="apellidoM" name="apellidoM" aria-describedby="cantidadAyuda" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="NIP">NIP</label>
                                        <input type="text" class="form-control" id="NIP" name="NIP"  required>
                                    </div>
                                </div>
                            </div>
                           
                            
                            
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <button type="reset" class="btn btn-warning btn-block">Limpiar <i class="fa fa-broom text-primary"></i></button>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success btn-block" >Guardar <i class="fa fa-save"></i></button>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>


