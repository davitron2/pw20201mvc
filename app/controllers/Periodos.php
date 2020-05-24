<?php

class Periodos extends Controller{
    public function __construct(){
        $this->periodoModel=$this->model('Periodo');
      
    }
    public function index(){
        $Periodo=$this->periodoModel->obtenerPeriodos();


        $datos = [
            
            'Periodos'=>$Periodos
        ];
        $this->view('pages/periodos/periodos',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'descripcion' => trim($_POST['descripcion']),
           
                
            ];
            if($this->periodoModel->agregarPeriodo($datos)){
                redireccionar('/periodos');
            } else {
             
            }

        } else {
            $datos = [
                'descripcion' => '',
              
                
                
            ];
            $this->view('pages/periodos/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'descripcion' => trim($_POST['descripcion']),
             
              
                              
            ];
            if($this->periodoModel->actualizarPeriodo($datos)){
                redireccionar('/periodos');
            } else {
               
            }

        } else {
            $periodo=$this->periodoModel->obtenerPeriodoId($id);

            $datos = [
                'id' => $periodo['id'],
                'descripcion' => $periodo['descripcion'],
              
               
             
                
                
            ];
            $this->view('pages/periodos/editar',$datos);

        }

    }

    public function borrar($id){
        $periodo=$this->periodo->obtenerPeriodoId($id);

        $datos = [
            'id' => $periodo['id'],
            'descripcion' => $periodo['descripcion'],
           
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->periodoModel->borrarPeriodo($id)){
                    redireccionar('/periodos');
                } else {
            
                }
            }
            $this->view('pages/periodos/borrar',$datos);
    }




  


}
?>