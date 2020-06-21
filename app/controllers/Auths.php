<?php

class Auths extends Controller{
    public function __construct(){
        #cargamos el modelo
        $this->authModel=$this->model('Auth');
    }
    public function index(){
        $datos = [
            'titulo'=>'',
        ];
        $this->view('pages/auth/login',$datos);
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos=[
                'usuario' => trim($_POST['usuario']),
                'contrasena' => trim($_POST['contrasena'])
            ];
            $usuario=$this->authModel->buscarUsuario($datos);

            if($usuario){
                session_start();
                $_SESSION['usuario']= $usuario;
               
                $datos=[
                    'titulo' => 'Bienvenido: ',
                    'usuario' => $usuario['usuario']
                ];
                $this->view('pages/dashboard',$datos);
            } else {
                $datos=[
                    'titulo' => 'Usuario no existe',
                ];
                $this->view('pages/auth/login',$datos);
            }
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        $datos=[
            'titulo' => 'Ha salido del sistema. ',
        ];
        $this->view('pages/auth/login',$datos);
    }
}
?>