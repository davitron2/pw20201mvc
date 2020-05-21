<?php
    /*
    Mapear la url ingresada:
    1) controlador
    2) metodo (funcion)
    3) parametro

    Ejemplo:    /usuarios/actualizar/4
    */

    class Ruta{

        protected $controladorActual = 'paginas';
        protected $metodoActual = 'index';
        protected $parametros = [];

        public function __construct(){
            //print_r($this->getUrl());
            #buscar si existe controlador
            $url=$this->getUrl();
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                # si existe controlador
                $this->controladorActual=ucwords($url[0]);
                #unset indice
                unset($url[0]);
            }

            #requerir el $controladorActual
            include_once '../app/controllers/'.$this->controladorActual.'.php';
            $this->controladorActual=new $this->controladorActual;

            #verificar el segundo argumento de la url
            if(isset($url[1])){

                if(method_exists($this->controladorActual,$url[1])){
                    # si se cargo, verificar el $metodoActual
                    $this->metodoActual=$url[1];
                    unset($url[1]);
                }
            }
            // echo $this->metodoActual; para probar

            #traer los parametros (operador ternario)
            $this->parametros=$url ? array_values($url):[];
            #llamar callback con parametros array
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }

        public function getUrl(){
            //echo $_GET['url'];
            if(isset($_GET['url'])){
                $url=rtrim($_GET['url'],'/');
                $url=filter_var($url, FILTER_SANITIZE_URL); //elimina todos los caracteres de la cadena URL ilegales
                $url=explode('/',$url);
                return $url;
            }
        }

    }//fin de la clase
?>