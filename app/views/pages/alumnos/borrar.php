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
                <div class="card bg-warning">
                    <div class="card-header">
                     Confirmación de borrar <i class="fas fa-minus-square text-danger float-right"></i>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo RUTA_URL;?>/alumnos/borrar/<?php echo $datos['noControl']; ?>" method="post">
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Marca">no control</label>
                                        <input type="text" class="form-control" id="marca" name="marca" aria-describedby="cantidadAyuda" value="<?php echo $datos['noControl']; ?>" readonly>
                                    </div>
                                </div>
                                
                            </div>
                        <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" aria-describedby="claveAyuda" value="<?php echo $datos['nombres']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="descripcion">apellido paterno</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="descripcionAyuda" value="<?php echo $datos['apellidoP']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Marca">apellido materno</label>
                                        <input type="text" class="form-control" id="marca" name="marca" aria-describedby="cantidadAyuda" value="<?php echo $datos['apellidoM']; ?>" readonly>
                                    </div>
                                </div>
                                
                            </div>
                           
                            
                            <div class="row">
                                <div class="col-sm-4"></div>
                                
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-danger btn-block">Borrar <i class="fa fa-times"></i></button>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>