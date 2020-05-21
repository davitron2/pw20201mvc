<?php

//PARA REDIRECCIONAR PAGINAS
function redireccionar($page){
    header('Location: ' . RUTA_URL . $page);
}
?>