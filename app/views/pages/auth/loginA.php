<?php include RUTA_APP . '/views/inc/header.inc.php'; ?>
<div class="container">
    <br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h4>
                <?php if(isset($datos))
                echo $datos['titulo']; ?>
                </h4>
                <div class="card aqua">
                    <div class="card-header">
                    Login <i class="fa fa-key text-warning float-right"></i>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo RUTA_URL; ?>/auths/loginA" method="POST">
                            <div class="form-group">
                                <label for="correo">Numero de control</label>
                                <input type="text" class="form-control" id="noControl" name="noControl" aria-describedby="emailHelp" require placeholder="noControl">
                                <small id="emailHelp" class="form-text text-muted">Nunca comparta su contrasena con nadie.</small>
                            </div>
                            <div class="form-group">
                            <label for="password">NIP</label>
                            <input type="password" class="form-control" id="NIP" name="NIP" require placeholder="NIP">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php';?>