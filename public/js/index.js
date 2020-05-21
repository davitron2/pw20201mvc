$(document).ready(function (){
    
    var  btn_agregar;
    
   
    btn_agregar = $('#btnAgregar');
    
    btn_agregar.on('click', CapturaDatos);
    
    function CapturaDatos(){        
        
        var c_clave, c_descripcion, c_cantidad, c_precio, mensaje, producto, productos;
        
        productos = [];
        
        c_clave = $('#clave').val();
        c_descripcion = $('#descripcion').val();
        c_cantidad = $('#cantidad').val();
        c_precio = $('#precio').val();
        
        mensaje = $('#mensaje');
        
        if(c_clave === '' || c_descripcion === '' || c_cantidad === '' || c_precio === ''){
            mensaje.empty();
            mensaje.append('<p class="red-text">Debe llenar todos los campos</p>');
        }else{
            
            producto = {
                clave: c_clave,
                descripcion: c_descripcion,
                cantidad: c_cantidad,
                precio: c_precio
            };
            
            //console.log(usuario);
            productos.push(producto);
            registro.setUser(productos);
            LimpiarCampos();
            mensaje.empty();
            mensaje.append('<p class="green-text">Producto guardado</p>');
 
            
        }
        
        
    };
    
    function LimpiarCampos(){
        
        $('#clave').val('');
        $('#descripcion').val('');
        $('#cantidad').val('');
        $('#precio').val('');
        
    };
    
    
    
    function LoadRegistros(){
        
        var component = 'registros.html';
        
        $.ajax({
            mimeType: 'text/html; charset=utf-8', 
            url: component,
            type: 'GET',
            dataType: "html",
            async: true,
            success: function(data) {
                $('#contenedor').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });        
    };
    
});