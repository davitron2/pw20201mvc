<?php

class Alumnos extends Controller{
    public function __construct(){
        $this->alumnoModel=$this->model('Alumno');
        $this->reticulaModel=$this->model('Reticula');
        $this->alumnoGrupoModel=$this->model('AlumnoGrupo');
      
    }
    public function index(){
        $Alumnos=$this->alumnoModel->obtenerAlumnos();


        $datos = [
            
            'Alumnos'=>$Alumnos
        ];
        $this->view('pages/alumnos/alumnos',$datos);
    }


    public function buscar(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $datos = [
                'buscado' => trim($_GET['inputBuscador']),
                'opcion' => trim($_GET['selectBuscador']),
            ];
            $Alumnos=$this->alumnoModel->buscarAlumno($datos);
            $datos = [
                'Alumnos'=>$Alumnos,
                 'tipoVista'=>1
            ];
            $this->view('pages/alumnos/alumnos',$datos);
        } 
    }


    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'nombres' => trim($_POST['inputNombres']),
                'apellidoP' => trim($_POST['inputApellidoPaterno']),
                'apellidoM' => trim($_POST['inputApellidoMaterno']),
                'NIP' => trim($_POST['inputNIP']),
                'idReticula'=> trim($_POST['selectReticula']),
                'semestre'=> trim($_POST['selectSemestre']),
                
            ];
            if($this->alumnoModel->agregarAlumno($datos)){

                $datos = [
                    'noControl' => ''

                ];
                $alumno=$this->alumnoModel->obtenerUltimoAlumno($datos);               
                $datos = [
                    'id' => $alumno['id'],

                ];
                if($this->alumnoModel->actualizarNoControl($datos)){
                    redireccionar('/alumnos');
                } else { 
                }

            } else {
            }
        } else {
            $Reticulas=$this->reticulaModel->obtenerReticulasNombre();
            $datos = [
                'nombres' => '',
                'apellidoP' => '',
                'apellidoM' => '',
                'NIP' => '',
                'Reticulas'=>$Reticulas
                   
            ];
            $this->view('pages/alumnos/agregar',$datos);
        }
    }

    public function editar($noControl){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'noControl' => $noControl,
                'nombres' => trim($_POST['inputNombres']),
                'apellidoP' => trim($_POST['inputApellidoPaterno']),
                'apellidoM' => trim($_POST['inputApellidoMaterno']),
                'idReticula' => trim($_POST['selectReticula']),
                'semestre' => trim($_POST['selectSemestre']),
                'NIP' => trim($_POST['inputNIP']),
                
              
                              
            ];
            if($this->alumnoModel->actualizarAlumno($datos)){
                redireccionar('/alumnos');
            } else {
               
            }

        } else {
            $alumno=$this->alumnoModel->obtenerAlumnoNoControl($noControl);
            $Reticulas=$this->reticulaModel->obtenerReticulasNombre();

            $datos = [
                'noControl' => $alumno['noControl'],
                'nombres' => $alumno['nombres'],
                'apellidoP' => $alumno['apellidoP'],
                'apellidoM' => $alumno['apellidoM'],
                'semestre' => $alumno['semestre'],
                'idReticula' => $alumno['idReticula'],
                'semestre' => $alumno['semestre'],
                'Reticulas'=>$Reticulas
             
                
                
            ];
            $this->view('pages/alumnos/editar',$datos);

        }

    }

    public function borrar($noControl){
        $alumno=$this->alumnoModel->obtenerAlumnoNoControl($noControl);
        $Reticulas=$this->reticulaModel->obtenerReticulaIdNombre($alumno['idReticula']);
                          
        $datos = [
            'noControl' => $alumno['noControl'],
            'nombres' => $alumno['nombres'],
            'apellidoP' => $alumno['apellidoP'],
            'apellidoM' => $alumno['apellidoM'],
            'semestre' => $alumno['semestre'],
            'idReticula' => $alumno['idReticula'],
            'nombreReticula' => $Reticulas['nombre'],
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->alumnoModel->borrarAlumno($noControl)){
                    redireccionar('/alumnos');
                } else {
            
                }
            }
            $this->view('pages/alumnos/borrar',$datos);
    }

    public function calificar($idAlumno) {
        session_start();
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'unidad1' => (int)trim($_POST['unidad1']),
                'unidad2' => (int)trim($_POST['unidad2']),
                'unidad3' => (int)trim($_POST['unidad3']),
                'unidad4' => (int)trim($_POST['unidad4']),
                'unidad5' => (int)trim($_POST['unidad5']),
                'unidad6' => (int)trim($_POST['unidad6']),
                'unidad7' => (int)trim($_POST['unidad7']),
                'id' => $idAlumno
            ];
            if($this->alumnoModel->calificarAlumno($datos)){
                if(isset($_SESSION['idGrupo'])){
                    $idGrupo = $_SESSION['idGrupo'];
                    redireccionar('/grupos/calificaciones/' . $idGrupo);
                }else{
                    redireccionar('/grupos/docente/' . $idGrupo);
                }
                
            } else {
               
            }

        }
    }

    public function horario(){
        session_start();
        $idAlumno = $_SESSION['alumno']['noControl'];
        $horarios=$this->alumnoGrupoModel->obtenerHorarioAlumno($idAlumno);
        $datos = [
            'horarios'=>$horarios
        ];
        $this->view('pages/alumnos/horario',$datos);
    }
}
?>