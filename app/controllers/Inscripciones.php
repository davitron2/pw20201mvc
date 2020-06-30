<?php

class Inscripciones extends Controller{
    public function __construct(){
        $this->reticulaMateriasModel=$this->model('ReticulaMateria');
        $this->alumnoGrupoModel=$this->model('AlumnoGrupo');
        session_start();
    }
    public function index(){
        $Materias = $this->reticulaMateriasModel->obtenerReticulaMaterias($_SESSION['alumno']['idReticula']);
        $Horarios = $this->alumnoGrupoModel->obtenerHorarioAlumno($_SESSION['alumno']['noControl']);
        $datos = [
            'Materias' => $Materias,
            'Horarios' => $Horarios
        ];
        $this->view('pages/inscripciones/inscripciones',$datos);
    }
    public function desinscribirGrupo(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'idGrupo' => $_POST['idAlumoGrupo'],
                'idAlumno' => $_SESSION['alumno']['noControl']
            ];
            $this->alumnoGrupoModel->borrarAlumnoGrupo($datos);
            $this->alumnoGrupoModel->borrarAlumnoCalificacion($datos);
            redireccionar('/inscripciones');
        }
    }
    public function inscribirGrupo(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'idGrupo' => $_POST['idGrupo'],
                'idAlumno' => $_SESSION['alumno']['noControl'],
                'estado' => 1 
            ];
            if($this->alumnoGrupoModel->validarExiste($datos)==0){
                if($this->alumnoGrupoModel->validarLimiteGrupo($datos)){
                    if($this->alumnoGrupoModel->validarCreditos($datos)){
                        if($this->alumnoGrupoModel->validarEmpalmes($datos)==0){
                            if($this->alumnoGrupoModel->agregarAlumnoGrupo($datos)){
                                $this->alumnoGrupoModel->agregarAlumnoCalificacion($datos);
                                echo 'success';
                            }else{
                                echo "showErrorModal('Error al elegir grupo');";
                            }
                        }else{
                            echo "showErrorModal('Ya se tiene una clase registrada en ese horario');";
                        }
                    }else{
                        echo "showErrorModal('Máximo de créditos permitidos alcanzado');";
                    }
                }else{
                    echo "showErrorModal('Grupo lleno');";
                }
            }else{
                echo "showErrorModal('Materia previamente registrada');";
            }
        }
    }
  


}
?>