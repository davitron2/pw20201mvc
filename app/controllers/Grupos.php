<?php

class  Grupos extends Controller{
    public function __construct(){
        $this->grupoModel=$this->model('Grupo');
      
    }
    public function index(){
        $Grupos=$this->grupoModel->obtenerGrupos();


        $datos = [
            
            'Grupos'=>$Grupos
        ];
        $this->view('pages/grupos/grupos',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                
                'idMateria' => trim($_POST['idMateria']),
                'idProfesor' => trim($_POST['idProfesor']),
                'idHorario' => trim($_POST['idHorario']),
                'grupo' => trim($_POST['grupo']),
                'limite' => trim($_POST['limite']),
                
            ];
            if($this->grupoModel->agregarGrupo($datos)){
                redireccionar('/grupos');
            } else {
             
            }

        } else {
            $datos = [
                'idMateria' => '',
                'idProfesor' => '',
                'idHorario' => '',
                'grupo' => '',
                'limite' => ''
                
                
            ];
            $this->view('pages/grupos/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'idMateria' => trim($_POST['idMateria']),
                'idProfesor' => trim($_POST['idProfesor']),
                'idHorario' => trim($_POST['idHorario']),
                'grupo' => trim($_POST['grupo']),
                'limite' => trim($_POST['limite']),
              
                              
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
                'idHorario' => $grupo['idHorario'],
                'grupo' => $grupo['grupo'],
                'limite' => $grupo['limite'],
               
             
                
                
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
            'idHorario' => $grupo['idHorario'],
            'grupo' => $grupo['grupo'],
            'limite' => $grupo['limite'],
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->grupoModel->borrarGrupo($id)){
                    redireccionar('/grupos');
                } else {
            
                }
            }
            $this->view('pages/grupos/borrar',$datos);
    }




  


}
?>