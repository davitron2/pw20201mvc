<?php

class Alumnos extends Controller{
    public function __construct(){
        $this->alumnoModel=$this->model('Alumno');
      
    }
    public function index(){
        $Alumnos=$this->alumnoModel->obtenerAlumnos();


        $datos = [
            
            'Alumnos'=>$Alumnos
        ];
        $this->view('pages/alumnos/alumnos',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'nombres' => trim($_POST['nombres']),
                'apellidoP' => trim($_POST['apellidoP']),
                'apellidoM' => trim($_POST['apellidoM']),
                'NIP' => trim($_POST['NIP']),
                
            ];
            if($this->alumnoModel->agregarAlumno($datos)){
                redireccionar('/alumnos');
            } else {
             
            }

        } else {
            $datos = [
                'nombres' => '',
                'apellidoP' => '',
                'apellidoM' => '',
                'NIP' => '',
                
                
            ];
            $this->view('pages/alumnos/agregar',$datos);
        }
    }

    public function editar($noControl){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'noControl' => $noControl,
                'nombres' => trim($_POST['nombres']),
                'apellidoP' => trim($_POST['apellidoP']),
                'apellidoM' => trim($_POST['apellidoM']),
                'NIP' => trim($_POST['NIP']),
                
              
                              
            ];
            if($this->alumnoModel->actualizarAlumno($datos)){
                redireccionar('/alumnos');
            } else {
               
            }

        } else {
            $alumno=$this->alumnoModel->obtenerAlumnoNoControl($noControl);

            $datos = [
                'noControl' => $alumno['noControl'],
                'nombres' => $alumno['nombres'],
                'apellidoP' => $alumno['apellidoP'],
                'apellidoM' => $alumno['apellidoM'],
               
             
                
                
            ];
            $this->view('pages/alumnos/editar',$datos);

        }

    }

    public function borrar($noControl){
        $alumno=$this->alumnoModel->obtenerAlumnoNoControl($noControl);

        $datos = [
            'noControl' => $alumno['noControl'],
            'nombres' => $alumno['nombres'],
            'apellidoP' => $alumno['apellidoP'],
            'apellidoM' => $alumno['apellidoM'],
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->alumnoModel->borrarAlumno($noControl)){
                    redireccionar('/alumnos');
                } else {
            
                }
            }
            $this->view('pages/alumnos/borrar',$datos);
    }




  


}
?>