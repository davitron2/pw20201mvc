<?php

class  Grupos extends Controller{
    public function __construct(){
        $this->grupoModel=$this->model('Grupo');
        $this->materiaModel=$this->model('Materia');
        $this->profesorModel=$this->model('Personal');
        $this->alumnosModel=$this->model('Alumno');
    }
    public function index(){
        $Grupos=$this->grupoModel->obtenerGrupos();
        $datos = [
            'Grupos'=>$Grupos
        ];
        $this->view('pages/grupos/grupos',$datos);
    }

    public function buscar(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $datos = [
                'buscado' => trim($_GET['inputBuscador']),
                'opcion' => trim($_GET['selectBuscador']),
            ];
            $Grupos=$this->grupoModel->buscarGrupo($datos);
            $datos = [
                'Grupos'=>$Grupos,
                 'tipoVista'=>1
            ];
            $this->view('pages/grupos/grupos',$datos);
        } 
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
                'idMateria' => trim($_POST['inputIdMateria']),
                'idProfesor' => trim($_POST['inputIdProfesor']),
                'grupo' => trim($_POST['inputGrupo']),
                'limite' => trim($_POST['inputLimite'])
            ];
            if($this->grupoModel->actualizarGrupo($datos)){
                redireccionar('/grupos');
            } else {
               
            }

        } else {
            $grupo=$this->grupoModel->obtenerGrupoId($id);
            $materia=$this->materiaModel->obtenerMateriaId($grupo['idMateria']);
            $profesor=$this->profesorModel->obtenerPersonalId( $grupo['idProfesor']);
            $datos = [
                'id' => $grupo['id'],
                'idMateria' => $grupo['idMateria'],
                'idProfesor' => $grupo['idProfesor'],
                'grupo' => $grupo['grupo'],
                'limite' => $grupo['limite'],
                'materia' => $materia['nombre'],
                'profesor' =>  ''. $profesor['nombre'] . ' ' . $profesor['apellidoP'] . ' ' .$profesor['apellidoM']

            ];
            $this->view('pages/grupos/editar',$datos);

        }

    }

    public function borrar($id){
        $grupo=$this->grupoModel->obtenerGrupoId($id);
        $materia=$this->materiaModel->obtenerMateriaId($grupo['idMateria']);
        $profesor=$this->profesorModel->obtenerPersonalId( $grupo['idProfesor']);
        $datos = [
            'id' => $grupo['id'],
            'idMateria' => $grupo['idMateria'],
            'idProfesor' => $grupo['idProfesor'],
            'grupo' => $grupo['grupo'],
            'limite' => $grupo['limite'],
            'materia' => $materia['nombre'],
            'profesor' =>  ''. $profesor['nombre'] . ' ' . $profesor['apellidoP'] . ' ' .$profesor['apellidoM']

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
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $idGrupo=trim($_POST['inputIdGrupo']);
        if($this->grupoModel->borrarHorario($id)){

              $Horarios = $this ->grupoModel->obtenerHorariosGrupo($idGrupo);
        $datos = [
            'idGrupo'=>$idGrupo,
            'Horarios'=>$Horarios
        ];
            $this->view('pages/grupos/horarios',$datos);
       
        }
    }
    }

    public function docente() {
        session_start();
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']['tipoUsuario'] == 2) {
            $grupos=$this->grupoModel->obtenerGruposDeDocente($_SESSION['usuario']['id']);

            $datos = [
                'grupos' => $grupos
            ];

            $this->view('pages/docentes/grupos', $datos);
        } else if($_SESSION['usuario']['tipoUsuario'] == 1) {
            $this->view('pages/dashboard', null);
            echo "<script type=".'text/javascript'.">showErrorModal('No tienes permisos para esa opción.');</script>";
        } else {
            session_unset();
            session_destroy();
            $this->view('pages/logins/logins', null);
            echo "<script type=".'text/javascript'.">showErrorModal('Su sesión a caducado.');</script>";
        }
    }

    public function lista($idGrupo) {
        session_start();
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']['tipoUsuario'] == 2) {
            $alumnos=$this->grupoModel->obtenerListaDeAlumnos($idGrupo);

            $datos = [
                'alumnos' => $alumnos
            ];

            $this->view('pages/docentes/grupo', $datos);
        } else if($_SESSION['usuario']['tipoUsuario'] == 1) {
            $this->view('pages/dashboard', null);
            echo "<script type=".'text/javascript'.">showErrorModal('No tienes permisos para esa opción.');</script>";
        } else {
            session_unset();
            session_destroy();
            $this->view('pages/logins/logins', null);
            echo "<script type=".'text/javascript'.">showErrorModal('Su sesión a caducado.');</script>";
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

    public function calificaciones($idGrupo) {
        session_start();
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']['tipoUsuario'] == 2) {
            $alumnos=$this->alumnosModel->obtenerAlumnosPorGrupo($idGrupo);
            $_SESSION['idGrupo'] = $idGrupo;
            $datos = [
                'alumnos' => $alumnos
            ];

            $this->view('pages/docentes/calificaciones', $datos);
        }  else if($_SESSION['usuario']['tipoUsuario'] == 1) {
            echo "<script type=".'text/javascript'.">showErrorModal('No tienes permisos para esta opción.');</script>";
        } else {
            session_unset();
            session_destroy();
            $this->view('pages/logins/logins', null);
            echo "<script type=".'text/javascript'.">showErrorModal('Su sesión a caducado.');</script>";
        }
    }

    public function calificar($idAlumno) {
        session_start();
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']['tipoUsuario'] == 2) {
            $alumno=$this->alumnosModel->obtenerCalificacionesAlumno($idAlumno);
            $datos = [
                'alumno' => $alumno
            ];

            $this->view('pages/docentes/calificar', $datos);
        } else if($_SESSION['usuario']['tipoUsuario'] == 1) {
            echo "<script type=".'text/javascript'.">showErrorModal('No tienes permisos para esta opción.');</script>";
        } else {
            session_unset();
            session_destroy();
            $this->view('pages/logins/logins', null);
            echo "<script type=".'text/javascript'.">showErrorModal('Su sesión a caducado.');</script>";
        }
    }
}
?>