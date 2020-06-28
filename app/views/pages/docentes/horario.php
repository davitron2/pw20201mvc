<?php
    include RUTA_APP . '/views/inc/header.inc.php'; ?>
<h5 class="titulo-pagina">Horario</h5>
<div class="container">
    <table class="table table-striped table-bordered tabla-horario">
        <thead>
            <tr>
                <th scope="col">Materia</th>
                <th scope="col">Grupo</th>
                <th scope="col">Lunes</th>
                <th scope="col">Martes</th>
                <th scope="col">Mi&eacute;rcoles</th>
                <th scope="col">Jueves</th>
                <th scope="col">Viernes</th>
                <th scope="col">S&aacute;bado</th>
            </tr>
        </thead>
        <tbody>
            <?php 
             foreach($datos['horario'] as $horario): ?>
                <tr>
                    <td><?php echo $horario['Materia']; ?></td>
                    <td><?php echo $horario['Grupo']; ?></td>
                    <td><?php echo $horario['Lunes']; ?></td>
                    <td><?php echo $horario['Martes']; ?></td>
                    <td><?php echo $horario['Miercoles']; ?></td>
                    <td><?php echo $horario['Jueves']; ?></td>
                    <td><?php echo $horario['Viernes']; ?></td>
                    <td><?php echo $horario['Sabado']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>