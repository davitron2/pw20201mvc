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
<script>
    (function() {
        $("#inputBuscadorMateria" ).keyup(function() {
            obtenerMaterias($('#inputBuscadorMateria').val());
        });
        $('#modalSeleccionarMateria').on('show.bs.modal',(e)=>{
            obtenerMaterias('');
        });
    })();
        

    function obtenerMaterias(name){
        var ruta = "<?php echo RUTA_URL;?>/materias/obtenermateriaslike";
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
        loadlistenersMateria();
    }

    function loadlistenersMateria(){
        $('.btnMateria').click(function() { 
            var id = $(this).attr('id');
            var tdMat = '#mat'+id
            var materia = $(tdMat).text();
            $('#modalSeleccionarMateria').modal('hide');
            $('#inputIdMateria').val(id);
            $('#inputNombreMateria').val(materia);
            return false; 
        }); 
    }
</script>