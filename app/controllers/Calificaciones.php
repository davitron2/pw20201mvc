<?php

class Calificaciones extends Controller{
    public function __construct(){
        $this->calificacionModel=$this->model('Calificacion');
      
    }
    public function index(){
        $Calificaciones=$this->calificacionModel->obtenerCalificaciones();


        $datos = [
            
            'Calificaciones'=>$Calificaciones
        ];
        $this->view('pages/calificaciones/calificaciones',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'idGrupo' => trim($_POST['idGrupo']),
                'idAlumno' => trim($_POST['idAlumno']),
                'unidad' => trim($_POST['unidad']),
                'calificacion' => trim($_POST['calificacion']),
                'idCiclo' => trim($_POST['idCiclo']),
                
            ];
            if($this->calificacionModel->agregarCalificacion($datos)){
                redireccionar('/calificaciones');
            } else {
             
            }

        } else {
            $datos = [
                'idGrupo' => '',
                'idAlumno' => '',
                'unidad' => '',
                'calificacion' => '',
                'idCiclo' => '',
                
            ];
            $this->view('pages/calificaciones/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'idGrupo' => trim($_POST['idGrupo']),
                'idAlumno' => trim($_POST['idAlumno']),
                'unidad' => trim($_POST['unidad']),
                'calificacion' => trim($_POST['calificacion']),
                'idCiclo' => trim($_POST['idCiclo']),
                
              
                              
            ];
            if($this->calificacionModel->actualizarCalificacion($datos)){
                redireccionar('/calificaciones');
            } else {
               
            }

        } else {
            $calificacion=$this->calificacionModel->obtenerCalificacionId($id);

            $datos = [
                'id' => $calificacion['id'],
                'idGrupo' => $calificacion['idGrupo'],
                'idAlumno' => $calificacion['idAlumno'],
                'unidad' => $calificacion['unidad'],
                'calificacion' => $calificacion['calificacion'],
                'idCiclo' => $calificacion['idCiclo'],
                
                
            ];
            $this->view('pages/calificaciones/editar',$datos);

        }

    }

    public function borrar($id){
        $calificacion=$this->calificacionModel->obtenerCalificacionId($id);

        $datos = [
            'id' => $calificacion['id'],
            'idGrupo' => $calificacion['idGrupo'],
            'idAlumno' => $calificacion['idAlumno'],
            'unidad' => $calificacion['unidad'],
            'calificacion' => $calificacion['calificacion'],
            'idCiclo' => $calificacion['idCiclo'],
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->calificacionModel->borrarCalificacion($id)){
                    redireccionar('/calificaciones');
                } else {
            
                }
            }
            $this->view('pages/calificaciones/borrar',$datos);
    }




  


}
?>