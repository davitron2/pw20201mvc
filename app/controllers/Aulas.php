<?php

class Aulas extends Controller{
    public function __construct(){
        $this->aulaModel=$this->model('Aula');
      
    }
    public function index(){
        $Aula=$this->aulaModel->obtenerAulas();


        $datos = [
            
            'Aulas'=>$Aulas
        ];
        $this->view('pages/aulas/aulas',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'nombre' => trim($_POST['nombre']),
           
                
            ];
            if($this->aulaModel->agregarAula($datos)){
                redireccionar('/aulas');
            } else {
             
            }

        } else {
            $datos = [
                'nombre' => '',
              
                
                
            ];
            $this->view('pages/aulas/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'nombre' => trim($_POST['nombre']),
             
              
                              
            ];
            if($this->aulaModel->actualizarAula($datos)){
                redireccionar('/aulas');
            } else {
               
            }

        } else {
            $aula=$this->aulaModel->obtenerAulaId($id);

            $datos = [
                'id' => $aula['id'],
                'nombre' => $aula['nombre'],
              
               
             
                
                
            ];
            $this->view('pages/aulas/editar',$datos);

        }

    }

    public function borrar($id){
        $aula=$this->aula->obtenerAulaId($id);

        $datos = [
            'id' => $aula['id'],
            'nombre' => $aula['nombre'],
           
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->aulaModel->borrarAula($id)){
                    redireccionar('/aulas');
                } else {
            
                }
            }
            $this->view('pages/aulas/borrar',$datos);
    }




  


}
?>