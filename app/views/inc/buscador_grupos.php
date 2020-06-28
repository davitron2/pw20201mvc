<div id="modalSeleccionarGrupo" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Seleccionar grupo</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <p><span class="font-weight-bold">Materia: </span><span id="spanNombreMateria"></span></p>
                            <input type="hidden" id="hiddenIdMateria">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Docente</th>
                                    <th scope="col">Lunes</th>
                                    <th scope="col">Martes</th>
                                    <th scope="col">Miércoles</th>
                                    <th scope="col">Jueves</th>
                                    <th scope="col">Viernes</th>
                                    <th scope="col">Sábado</th>
                                    <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaGrupos">

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
        $('#modalSeleccionarGrupo').on('show.bs.modal',(e)=>{
            obtenerGrupos();
        });
    })();
        

    function obtenerGrupos(){
        var idMateria = $('#hiddenIdMateria').val();
        var ruta = "<?php echo RUTA_URL;?>/grupos/obtenerGruposMateria";
        $.get(
            ruta,
            {idMateria:idMateria},
            datos => {
                var grupos = JSON.parse(datos);
                $('#tablaGrupos').empty();
                grupos.forEach(g=>addGrupo(g));
                loadlistenersGrupos();
            }
        );
    }

    function addGrupo(grupo){
        var idG ='"'+grupo.id+'"';
        var row = "<tr> <td>"+grupo.grupo+"</td> " +
                "<td>"+grupo.nombre+" "+grupo.apellidoP+" "+grupo.apellidoM+"</td> " +
                "<td>"+grupo.Lunes+"</td> " +
                "<td>"+grupo.Martes+"</td> " +
                "<td>"+grupo.Miercoles+"</td> " +
                "<td>"+grupo.Jueves+"</td> " +
                "<td>"+grupo.Viernes+"</td> " +
                "<td>"+grupo.Sabado+"</td> " +
                '<td><button id='+idG+' class="btn btnGrupo btn-sm btn-primary font-weight-bold">Seleccionar</button></td>' +
        "</tr>";
        $('#tablaGrupos').append(row);
        
    }

    function loadlistenersGrupos(){
        $('.btnGrupo').click(function(evt) { 
            console.log('click');
            var id = $(this).attr('id');
            var ruta = '<?php echo RUTA_URL;?>/Inscripciones/inscribirGrupo';
            
            $('#modalSeleccionarGrupo').modal('hide');
            $.post(
                ruta,
                {idGrupo:id},
                res=>{
                    console.log(res);
                    if(res.trim()==='success'){
                        location.reload();
                    }else{
                        eval(res);
                    }
                }
            );
           
        }); 
    }
</script>