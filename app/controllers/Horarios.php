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
        $this->view('pages/horarios/horarios',$datos);
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




  


}
?>