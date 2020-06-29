<?php

class Reticulas extends Controller{
    public function __construct(){
        $this->reticulaModel=$this->model('Reticula');
        $this->carreraModel=$this->model('Carrera');
      
    }
    public function index(){
        $Reticulas=$this->reticulaModel->obtenerReticulas();
        $datos = [
            'Reticulas'=>$Reticulas
        ];
        $this->view('pages/reticulas/reticulas',$datos);
    }


    public function buscar(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $datos = [
                'buscado' => trim($_GET['inputBuscador']),
                'opcion' => trim($_GET['selectBuscador']),
            ];
            $Reticulas=$this->reticulaModel->buscarReticula($datos);
            $datos = [
                'Reticulas'=>$Reticulas,
                 'tipoVista'=>1
            ];
            $this->view('pages/reticulas/reticulas',$datos);
        } 
    }


    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'idCarrera' => trim($_POST['selectCarrera']),
                'anio' => trim($_POST['inputAnio']),
                'max_creditos' => trim($_POST['inputMaxCreditos'])
            ];
            if($this->reticulaModel->agregarReticula($datos)){
                redireccionar('/reticulas');
            } else {
             
            }

        } else {
            $Carreras=$this->carreraModel->obtenerCarreras();
            $datos = [
                'carrera' => '',
                'anio' => '',
                'Carreras'=>$Carreras
            ];
            $this->view('pages/reticulas/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'idCarrera' => trim($_POST['selectCarrera']),
                'anio' => trim($_POST['inputAnio']),
                'max_creditos' => trim($_POST['inputMaxCreditos'])
            ];
            if($this->reticulaModel->actualizarReticula($datos)){
                redireccionar('/reticulas');
            } else {
               
            }

        } else {
            $reticula=$this->reticulaModel->obtenerReticulaId($id);
            $Carreras=$this->carreraModel->obtenerCarreras();
            $datos = [
                'id' => $reticula['id'],
                'idCarrera' => $reticula['idCarrera'],
                'anio' => $reticula['anio'],
                'max_creditos'=> $reticula['max_creditos'],
                'Carreras' => $Carreras
            ];
            $this->view('pages/reticulas/editar',$datos);

        }

    }

    public function borrar($id){
        $reticula=$this->reticulaModel->obtenerReticulaId($id);
       
        $datos = [
            'id' => $reticula['id'],
            'idCarrera' => $reticula['idCarrera'],
            'anio' => $reticula['anio'],
            'max_creditos'=> $reticula['max_creditos'],
            'nombreCarrera'=> $reticula['nombre'],
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->reticulaModel->borrarReticula($id)){
                    redireccionar('/reticulas');
                } else {
            
                }
            }
            $this->view('pages/reticulas/borrar',$datos);
    }




  


}
?>