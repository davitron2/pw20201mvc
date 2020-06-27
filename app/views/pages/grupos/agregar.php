<?php session_start();
include RUTA_APP . '/views/inc/header.inc.php'; ?>
<div class="container-fluid">
    <div class="row py-2 px-4">
        <div class="col">
            <a href="<?php echo RUTA_URL; ?>/grupos" class="text-secondary"><i class="fas fa-arrow-left"></i></i>   Regresar</a>
        </div>
    </div>
    <div class="row mt-1 justify-content-center">
        <div class="col-md-8">
            <h4>Agregar grupo</h4>
            <form action="<?php echo RUTA_URL;?>/grupos/agregar"  method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-6 col-lg-3  mt-3 mb-2">
                        <input id="inputID" type="text" class="form-control" required disabled>
                        <label for="inputID" class="floating-label">ID</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-lg-3 mb-2">
                        <label for="inputIdMateria" class="label-for-disabled">Id Materia</label>
                        <input id="inputIdMateria"   name="inputIdMateria" type="text" class="form-control" required disabled>
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
                        <input id="inputIdProfesor"   name="inputIdProfesor" type="text" class="form-control" required disabled>
                    </div>
                    <div class="col-9 col-lg-4 mb-2">
                        <label for="inputNombreDocente" class="label-for-disabled">Docente</label>
                        <input id="inputNombreDocente"   name="inputNombreDocente" type="text" class="form-control" required disabled>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-secondary" formnovalidate><i class="fas fa-search text-white"></i></button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6 col-lg-3">
                        <input id="inputLimite" name="inputLimite" type="number" class="form-control" required>
                        <label for="inputLimite" class="floating-label">Limite alumnos</label>
                    </div>
                    <div class="col-6 col-lg-4">
                        <input id="inputGrupo" name="inputGrupo" type="text" class="form-control" required>
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

    <div id="modalSeleccionarMateria" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Seleccionar materia</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <input id="inputBuscadorMateria" type="text" class="form-control" placeholder="Buscar...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Materia</th>
                                        <th scope="col">Unidades</th>
                                        <th scope="col">Creditos</th>
                                        <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablaMaterias">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    (function() {
        $("#inputBuscadorMateria" ).keyup(function() {
            obtenerMaterias($('#inputBuscadorMateria').val());
        });
        
    })();
        

    function obtenerMaterias(name){
        var ruta = "<?php echo RUTA_URL;?>/grupos/obtenermaterias";
        $.get(
            ruta,
            {query:name},
            datos => {
                var materias = JSON.parse(datos);
                $('#tablaMaterias').empty();
                materias.forEach(m=>{
                    addMateria(m)
                })
            }
        );
    }

    function addMateria(materia){
        var idMat ='"'+materia.id+'"';
        var row = "<tr> <td>"+materia.id+"</td> " +
                "<td id='mat"+materia.id+"'>"+materia.nombre+"</td>" +
                "<td>"+materia.unidades+"</td>" +
                "<td>"+materia.creditos+"</td>" +
                '<td><button id='+idMat+' class="btn btnMateria btn-sm btn-primary font-weight-bold">Seleccionar</button></td>' +
        "</tr>";
        $('#tablaMaterias').append(row);
        loadlisteners();
    }
    function loadlisteners(){
        $('.btnMateria').click(function() { 
            var id = $(this).attr('id');
            var tdMat = '#mat'+id
            var materia = $(tdMat).text();
            console.log(materia);
            $('#modalSeleccionarMateria').modal('hide');
            $('#inputIdMateria').val(id);
            $('#inputNombreMateria').val(materia);
            return false; 
        }); 
    }
</script>

<?php include RUTA_APP . '/views/inc/footer.inc.php'; ?>