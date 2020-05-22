<?php

class Personal extends Controller{
    public function __construct(){
        $this->personalModel=$this->model('Personal');
      
    }
    public function index(){
        $Personal=$this->personalModel->obtenerPersonal();


        $datos = [
            
            'Personal'=>$Personal
        ];
        $this->view('pages/personal/personal',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'usuario' => trim($_POST['usuario']),
                'contraseña' => trim($_POST['contraseña']),
                'tipoUsuario' => trim($_POST['tipoUsuario']),
               
                
            ];
            if($this->personalModel->agregarPersonal($datos)){
                redireccionar('/personal');
            } else {
             
            }

        } else {
            $datos = [
                'usuario' => '',
                'contraseña' => '',
                'tipoUsuario' => '',
          
                
                
            ];
            $this->view('pages/personal/personal',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'usuario' => trim($_POST['usuario']),
                'contraseña' => trim($_POST['contraseña']),
                'tipoUsuario' => trim($_POST['tipoUsuario']),
           
                
              
                              
            ];
            if($this->personalModel->actualizarPersonal($datos)){
                redireccionar('/personal');
            } else {
               
            }

        } else {
            $personal=$this->personalModel->obtenerPersonalId($id);

            $datos = [
                'id' => $personal['id'],
                'usuario' => $personal['usuario'],
                'contraseña' => $personal['contraseña'],
                'tipoUsuario' => $personal['tipoUsuario'],
               
             
                
                
            ];
            $this->view('pages/personal/editar',$datos);

        }

    }

    public function borrar($id){
        $personal=$this->personalModel->obtenerPersonalId($id);

        $datos = [
            'id' => $personal['id'],
            'usuario' => $personal['usuario'],
            
            'tipoUsuario' => $personal['tipoUsuario'],
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->personalModel->borrarPersonal($id)){
                    redireccionar('/personal');
                } else {
            
                }
            }
            $this->view('pages/personal/borrar',$datos);
    }




  


}
?>