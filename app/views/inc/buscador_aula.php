<div id="modalSeleccionarAula" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Seleccionar aula</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <input id="inputBuscadorAula" type="text" class="form-control" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Aula</th>
                                    <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaAulas">
                                    
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
        $("#inputBuscadorAula" ).keyup(function() {
            obtenerAulas($('#inputBuscadorAula').val());
        });
        $('#modalSeleccionarAula').on('show.bs.modal',(e)=>{
            obtenerAulas('');
        });
    })();
        

    function obtenerAulas(name){
        var ruta = "<?php echo RUTA_URL;?>/aulas/obtenerAulasLike";
        $.get(
            ruta,
            {query:name},
            datos => {
                var aulas = JSON.parse(datos);
                $('#tablaAulas').empty();
                aulas.forEach(a=>{
                    addAula(a);
                })
            }
        );
    }

    function addAula(aula){
        var idAu ='"'+aula.id+'"';
        var row = "<tr> <td>"+aula.id+"</td> " +
                "<td id='au"+aula.id+"'>"+aula.nombre+"</td>" +
                '<td><button id='+idAu+' class="btn btnAula btn-sm btn-primary font-weight-bold">Seleccionar</button></td>' +
        "</tr>";
        $('#tablaAulas').append(row);
        loadlistenersAula();
    }

    function loadlistenersAula(){
        $('.btnAula').click(function() { 
            var id = $(this).attr('id');
            var td = '#au'+id
            var aula = $(td).text();
            $('#modalSeleccionarAula').modal('hide');
            $('#inputIdAula').val(id);
            $('#inputNombreAula').val(aula);
            return false; 
        }); 
    }
</script>