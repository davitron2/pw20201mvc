<?php

class Ciclos extends Controller{
    public function __construct(){
        $this->cicloModel=$this->model('Ciclo');
      
    }
    public function index(){
        $Ciclo=$this->cicloModel->obtenerCiclos();


        $datos = [
            
            'Ciclos'=>$Ciclos
        ];
        $this->view('pages/ciclos/ciclos',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'idPeriodo' => trim($_POST['idPeriodo']),
                'año' => trim($_POST['año']),
                
            ];
            if($this->cicloModel->agregarCiclo($datos)){
                redireccionar('/ciclos');
            } else {
             
            }

        } else {
            $datos = [
                'idPeriodo' => '',
                'año' => '',
                
                
            ];
            $this->view('pages/ciclos/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'idPeriodo' => trim($_POST['idPeriodo']),
                'año' => trim($_POST['año']),
              
                              
            ];
            if($this->cicloModel->actualizarCiclo($datos)){
                redireccionar('/ciclos');
            } else {
               
            }

        } else {
            $ciclo=$this->cicloModel->obtenerCicloId($id);

            $datos = [
                'id' => $ciclo['id'],
                'idPeriodo' => $ciclo['idPeriodo'],
                'año' => $ciclo['año'],
               
             
                
                
            ];
            $this->view('pages/ciclos/editar',$datos);

        }

    }

    public function borrar($id){
        $ciclo=$this->ciclo->obtenerCicloId($id);

        $datos = [
            'id' => $ciclo['id'],
            'idPeriodo' => $ciclo['idPeriodo'],
            'año' => $ciclo['año'],
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->cicloModel->borrarCiclo($id)){
                    redireccionar('/ciclos');
                } else {
            
                }
            }
            $this->view('pages/ciclos/borrar',$datos);
    }




  


}
?>