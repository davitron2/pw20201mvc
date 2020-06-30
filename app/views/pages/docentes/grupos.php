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
<h5 class="titulo-pagina">Grupos</h5>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-bordered tabla-horario">
            <thead>
                <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($datos['grupos'] as $grupo): ?>
                    <tr>
                        <td><?php echo $grupo['Materia']; ?></td>
                        <td><?php echo $grupo['Grupo']; ?></td>
                        <td>
                            <a href="<?php echo RUTA_URL;?>/grupos/lista/<?php echo $grupo['id']; ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Alumnos">Alumnos</a>
                            <a href="<?php echo RUTA_URL;?>/grupos/calificaciones/<?php echo $grupo['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Calificar">Calificar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>