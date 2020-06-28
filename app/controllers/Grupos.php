<?php

class  Grupos extends Controller{
    public function __construct(){
        $this->grupoModel=$this->model('Grupo');
        $this->materiaModel=$this->model('Materia');
        $this->profesorModel=$this->model('Personal');
    }
    public function index(){
        $Grupos=$this->grupoModel->obtenerGrupos();
        $datos = [
            'Grupos'=>$Grupos
        ];
        $this->view('pages/grupos/grupos',$datos);
    }
    public function horarios($id){
        $Horarios = $this ->grupoModel->obtenerHorariosGrupo($id);
        $datos = [
            'idGrupo'=>$id,
            'Horarios'=>$Horarios
        ];
        
        $this->view('pages/grupos/horarios',$datos);
    }

    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'idMateria' => trim($_POST['inputIdMateria']),
                'idProfesor' => trim($_POST['inputIdProfesor']),
                'grupo' => trim($_POST['inputGrupo']),
                'limite' => trim($_POST['inputLimite'])
            ];


            if($this->grupoModel->validarNombreMateriaGrupo($datos)){

                $datos = [
                    'idMateria' => '',
                    'idProfesor' => '',
                    'grupo' => '',
                    'limite' => ''
                ];
                $this->view('pages/grupos/agregar',$datos);          
                echo "<script>showErrorModal('Ya existe un grupo con esa materia y nombre') </script>  ";

            }else{
                print_r($datos);
                if($this->grupoModel->agregarGrupo($datos)){
                    redireccionar('/grupos');
                } else {
                 
                }
            }
        } 
        
        else {
            $datos = [
                'idMateria' => '',
                'idProfesor' => '',
                'grupo' => '',
                'limite' => ''
            ];
            $this->view('pages/grupos/agregar',$datos);
        }
    }

    public function agregarHorario($idGrupo){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => trim($_POST['inputID']),
                'idGrupo' => $idGrupo,
                'idAula' => trim($_POST['inputIdAula']),
                'diaSemana' => trim($_POST['selectDiaSemana']),
                'horaInicio' => trim($_POST['inputHoraInicio']),
                'horaFin' => trim($_POST['inputHoraFin'])
            ];
            if(empty($datos['id'])){
                if($this->grupoModel->validarHorarioAula($datos)){
                  $Horarios = $this ->grupoModel->obtenerHorariosGrupo($idGrupo);
                    $datos = [
                        'idGrupo'=>$idGrupo,
                        'Horarios'=>$Horarios
                    ];
                    
                      $this->view('pages/grupos/horarios',$datos);
            echo "<script>showErrorModal('el aula esta ocupada en esa hora y dia') </script>  ";
                    
                }else if($this->grupoModel->validarHorarioProfe($datos)){
                    //el profesor ya tiene una clase registrada a esa hora
                    $Horarios = $this ->grupoModel->obtenerHorariosGrupo($idGrupo);
                    $datos = [
                        'idGrupo'=>$idGrupo,
                        'Horarios'=>$Horarios
                    ];
                    
                      $this->view('pages/grupos/horarios',$datos);
                        echo "<script>showErrorModal('el profesor ya tiene una clase registrada a esa hora y dia') </script>  ";
                    
                }else{
                    if($this->grupoModel->agregarHorario($datos)){
                        redireccionar('/grupos/horarios/'.$idGrupo);
                    }
                }
            }else{

            }
        }
    }
    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'idMateria' => trim($_POST['idMateria']),
                'idProfesor' => trim($_POST['idProfesor']),
                'grupo' => trim($_POST['grupo']),
                'limite' => trim($_POST['limite'])
            ];
            if($this->grupoModel->actualizarGrupo($datos)){
                redireccionar('/grupos');
            } else {
               
            }

        } else {
            $grupo=$this->grupoModel->obtenerGrupoId($id);
            $datos = [
                'id' => $grupo['id'],
                'idMateria' => $grupo['idMateria'],
                'idProfesor' => $grupo['idProfesor'],
                'grupo' => $grupo['grupo'],
                'limite' => $grupo['limite']
            ];
            $this->view('pages/grupos/editar',$datos);

        }

    }

    public function borrar($id){
        $grupo=$this->grupoModel->obtenerGrupoId($id);
        $datos = [
            'id' => $id,
            'idMateria' => $grupo['idMateria'],
            'idProfesor' => $grupo['idProfesor'],
            'grupo' => $grupo['grupo'],
            'limite' => $grupo['limite']
        ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->grupoModel->borrarGrupo($id)){
                    redireccionar('/grupos');
                } else {
            
                }
            }
            $this->view('pages/grupos/borrar',$datos);
    }
    
    public function borrarHorario($id){
        if($this->grupoModel->borrarHorario($id)){

        }

    }
    public function obtenerGruposMateria(){
        $idMateria = $_GET['idMateria'];
        $grupos = $this->grupoModel->obtenerGruposMateria($idMateria);
        $datos = array();
        foreach($grupos as $grupo){
            array_push($datos,$grupo);
        }
        echo json_encode($datos);
    }
}
?>