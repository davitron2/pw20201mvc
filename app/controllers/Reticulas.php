<?php

class Reticulas extends Controller{
    public function __construct(){
        $this->reticulaModel=$this->model('Reticula');
      
    }
    public function index(){
        $Reticula=$this->reticulaModel->obtenerReticulas();


        $datos = [
            
            'Reticulas'=>$Reticulas
        ];
        $this->view('pages/reticulas/reticulas',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'carrera' => trim($_POST['carrera']),
                'año' => trim($_POST['año']),
                
            ];
            if($this->reticulaModel->agregarReticula($datos)){
                redireccionar('/reticulas');
            } else {
             
            }

        } else {
            $datos = [
                'carrera' => '',
                'año' => '',
                
                
            ];
            $this->view('pages/reticulas/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'carrera' => trim($_POST['carrera']),
                'año' => trim($_POST['año']),
              
                              
            ];
            if($this->reticulaModel->actualizarReticula($datos)){
                redireccionar('/reticulas');
            } else {
               
            }

        } else {
            $reticula=$this->reticulaModel->obtenerReticulaId($id);

            $datos = [
                'id' => $reticula['id'],
                'carrera' => $reticula['carrera'],
                'año' => $reticula['año'],
               
             
                
                
            ];
            $this->view('pages/reticulas/editar',$datos);

        }

    }

    public function borrar($id){
        $reticula=$this->reticula->obtenerReticulaId($id);

        $datos = [
            'id' => $reticula['id'],
            'carrera' => $reticula['carrera'],
            'año' => $reticula['año'],
           
         
            
            
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