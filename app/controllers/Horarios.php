<?php

class Horarios extends Controller{
    public function __construct(){
        $this->horarioModel=$this->model('Horario');
      
    }
    public function index(){
        $Horarios=$this->horarioModel->obtenerHorarios();


        $datos = [
            
            'Horarios'=>$Horarios
        ];
        $this->view('pages/docentes/horario',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'diaSemana' => trim($_POST['diaSemana']),
                'horaInicio' => trim($_POST['horaInicio']),
                'horaFin' => trim($_POST['horaFin']),
                'idAula' => trim($_POST['idAula']),
                
            ];
            if($this->horarioModel->agregarHorario($datos)){
                redireccionar('/horarios');
            } else {
             
            }

        } else {
            $datos = [
                'diaSemana' => '',
                'horaInicio' => '',
                'horaFin' => '',
                'idAula' => '',
                
                
            ];
            $this->view('pages/horarios/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'diaSemana' => trim($_POST['diaSemana']),
                'horaInicio' => trim($_POST['horaInicio']),
                'horaFin' => trim($_POST['horaFin']),
                'idAula' => trim($_POST['idAula']),
                
              
                              
            ];
            if($this->horarioModel->actualizarHorario($datos)){
                redireccionar('/horarios');
            } else {
               
            }

        } else {
            $horario=$this->horarioModel->obtenerHorarioId($id);

            $datos = [
                'id' => $horario['id'],
                'diaSemana' => $horario['diaSemana'],
                'horaInicio' => $horario['horaInicio'],
                'horaFin' => $horario['horaFin'],
                'idAula' => $horario['idAula'],
             
                
                
            ];
            $this->view('pages/horarios/editar',$datos);

        }

    }

    public function borrar($id){
        $horario=$this->horarioModel->obtenerHorarioId($id);

        $datos = [
            'id' => $horario['id'],
            'diaSemana' => $horario['diaSemana'],
            'horaInicio' => $horario['horaInicio'],
            'horaFin' => $horario['horaFin'],
            'idAula' => $horario['idAula'],
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->horarioModel->borrarHorario($id)){
                    redireccionar('/horarios');
                } else {
            
                }
            }
            $this->view('pages/horarios/borrar',$datos);
    }

    public function alumno() {

    }

    public function docente() {
        session_start();
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']['tipoUsuario'] == 2) {
            $horario=$this->horarioModel->obtenerHorarioDeDocente($_SESSION['usuario']['id']);
            
            $datos = [
                'horario' => $horario
            ];

            $this->view('pages/docentes/horario', $datos);
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

    public function HorarioDocentePdf(){
        session_start();
        $horarios=$this->horarioModel->obtenerHorarioDeDocente($_SESSION['usuario']['id']);
        foreach($horarios as $key=>$horario){
            $registros[]= [
                                  
                        'Materia'=> $horario['Materia'] ,
                        'Lunes'=> $horario['Lunes'] ,
                        'Martes'=> $horario['Martes'] ,
                        'Miercoles'=> $horario['Miercoles'],
                        'Jueves'=> $horario['Jueves'],
                        'Viernes'=> $horario['Viernes'],
                        'Sabado'=> $horario['Sabado']
                      
            ];
                                        
    }
    $datos=['Horarios'=>$registros, 'Docente'=>"Docente: " . $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidoP'] . ' ' . $_SESSION['usuario']['apellidoM']  ];
      $this->view('pages/docentes/HorarioImpresion',$datos);
    }



}
?>