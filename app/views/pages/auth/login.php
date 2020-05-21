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
                        <form action="<?php echo RUTA_URL; ?>/auths/login" method="POST">
                            <div class="form-group">
                                <label for="correo">Dirección de correo</label>
                                <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" require placeholder="Email">
                                <small id="emailHelp" class="form-text text-muted">Nunca comparta su contraseña con nadie.</small>
                            </div>
                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" require placeholder="Password">
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