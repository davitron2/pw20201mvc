<?php

class Boletas extends Controller{
    public function __construct(){
        $this->boletaModel=$this->model('Boleta');
      
    }
    public function index(){
        $Boletas=$this->boletaModel->obtenerBoletas();


        $datos = [
            
            'Boletas'=>$Boletas
        ];
        $this->view('pages/boletas/boletas',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'idGrupo' => trim($_POST['idGrupo']),
                'idAlumno' => trim($_POST['idAlumno']),
                'idCiclo' => trim($_POST['idCiclo']),
                'calificacion' => trim($_POST['calificacion']),
               
                
            ];
            if($this->boletaModel->agregarBoleta($datos)){
                redireccionar('/boletas');
            } else {
             
            }

        } else {
            $datos = [
                'idGrupo' => '',
                'idAlumno' => '',
                'idCiclo' => '',
                'calificacion' => '',
                
                
            ];
            $this->view('pages/boletas/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'idGrupo' => trim($_POST['idGrupo']),
                'idAlumno' => trim($_POST['idAlumno']),
                'idCiclo' => trim($_POST['idCiclo']),
                'calificacion' => trim($_POST['calificacion']),
               
                
              
                              
            ];
            if($this->boletaModel->actualizarBoleta($datos)){
                redireccionar('/boletas');
            } else {
               
            }

        } else {
            $boleta=$this->boletaModel->obtenerBoletaId($id);

            $datos = [
                'id' => $boleta['id'],
                'idGrupo' => $boleta['idGrupo'],
                'idAlumno' => $boleta['idAlumno'],
                'idCiclo' => $boleta['idCiclo'],
                'calificacion' => $boleta['calificacion'],
              
                
                
            ];
            $this->view('pages/boletas/editar',$datos);

        }

    }

    public function borrar($id){
        $boleta=$this->boletaModel->obtenerBoletaId($id);

        $datos = [
            'id' => $boleta['id'],
            'idGrupo' => $boleta['idGrupo'],
            'idAlumno' => $boleta['idAlumno'],
            'idCiclo' => $boleta['idCiclo'],
            'calificacion' => $boleta['calificacion'],
            
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->boletaModel->borrarBoleta($id)){
                    redireccionar('/boletas');
                } else {
            
                }
            }
            $this->view('pages/boletas/borrar',$datos);
    }




  


}
?>