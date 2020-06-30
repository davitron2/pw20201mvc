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
<h5 class="titulo-pagina">Lista de alumnos</h5>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered tabla-horario">
            <thead>
                <tr>
                    <th scope="col">N&uacute;mero de Control</th>
                    <th scope="col">Alumno</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($datos['alumnos'] as $alumno): ?>
                    <tr>
                        <td><?php echo $alumno['noControl']; ?></td>
                        <td><?php echo $alumno['Alumno']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>