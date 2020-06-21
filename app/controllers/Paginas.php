<?php

class Paginas extends Controller{
    public function __construct(){

    }
    #Metodo
    public function index(){
        #integrar $parametros
        $datos = [
            'titulo'=>'Bienvenido: '
        ];
        $this->view('pages/logins/logins', $datos);
    }
}

?>