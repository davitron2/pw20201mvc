<div id="modalSeleccionarProfesor" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Seleccionar profesor</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <input id="inputBuscadorProfesor" type="text" class="form-control" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaProfesores">
                                    
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
        $("#inputBuscadorProfesor" ).keyup(function() {
            obtenerProfesores($('#inputBuscadorProfesor').val());
        });
        $('#modalSeleccionarProfesor').on('show.bs.modal',(e)=>{
            obtenerProfesores('');
        });
    })();
    function obtenerProfesores(name){
        var ruta = "<?php echo RUTA_URL;?>/personales/obtenerprofesoreslike";
        $.get(
            ruta,
            {query:name},
            datos => {
                var profesores = JSON.parse(datos);
                $('#tablaProfesores').empty();
                profesores.forEach(p=>{
                    addProfesor(p);
                })
            }
        );
    }

    function addProfesor(profesor){
        var idPrf ='"'+profesor.id+'"';
        var row = "<tr> <td>"+profesor.id+"</td> " +
                "<td id='prf"+profesor.id+"'>"+profesor.nombre+" "+profesor.apellidoP+" "+profesor.apellidoM+"</td>" +
                '<td><button id='+idPrf+' class="btn btnProfesor btn-sm btn-primary font-weight-bold">Seleccionar</button></td>' +
        "</tr>";
        $('#tablaProfesores').append(row);
        loadlistenersProfesor();
    }

    function loadlistenersProfesor(){
        $('.btnProfesor').click(function() { 
            var id = $(this).attr('id');
            var tdPrf = '#prf'+id
            var profesor = $(tdPrf).text();
            $('#modalSeleccionarProfesor').modal('hide');
            $('#inputIdProfesor').val(id);
            $('#inputNombreDocente').val(profesor);
            return false; 
        }); 
    }
</script>