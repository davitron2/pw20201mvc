<?php
#Clase controlador principal para cargar modelos y vistas
    class Controller{

        public function model($model){
            //'carga modelo';
            include_once '../app/models/'.$model.'.php';
            #instanciar modelo
            return new $model();
        }

        public function view($view,$datos=[]){
            if(file_exists('../app/views/'.$view.'.php')){
                include_once '../app/views/'.$view.'.php';
            } else {
                die('La vista no existe');
            }
        }
    }

?>