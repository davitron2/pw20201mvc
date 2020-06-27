<?php

class Personales extends Controller{
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
                'nombre' => trim($_POST['inputNombre']),
                'apellidoP' => trim($_POST['inputApellidoPaterno']),
                'apellidoM' => trim($_POST['inputApellidoMaterno']),
                'usuario' => trim($_POST['inputNombreUsuario']),
                'contrasena' => trim($_POST['inputContrasena']),
                'tipoUsuario' => trim($_POST['selectTipoUsuario']),
            
            ];
            if($this->personalModel->agregarPersonal($datos)){
                redireccionar('/personales');
            } else {
                //TODO tratar errores
            }

        } else {
            $datos = [
                'nombre_usuario' => '',
              
            ];
            $this->view('pages/personal/agregar',$datos);
        }
    }


    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
         
            $datos = [
                'id' => $id,
                'nombre' => trim($_POST['inputNombre']),
                'apellidoP' => trim($_POST['inputApellidoPaterno']),
                'apellidoM' => trim($_POST['inputApellidoMaterno']),
                'usuario' => trim($_POST['inputNombreUsuario']),
                'contrasena' => trim($_POST['inputContrasena']),
                'tipoUsuario' => trim($_POST['selectTipoUsuario']),           
            ];
            if($this->personalModel->actualizarPersonal($datos)){
                redireccionar('/personales');
            } else {
                //TODO tratar errores
            }

        } else {
            $personal=$this->personalModel->obtenerPersonalId($id);

            $datos = [
                'id' => $personal['id'],
                'usuario' => $personal['usuario'],
                'nombre' => $personal['nombre'],
                'apellidoP' => $personal['apellidoP'],
                'apellidoM' => $personal['apellidoM'],
                'contrasena' => $personal['contrasena'],
                'tipoUsuario' => $personal['tipoUsuario'],
           
            ];
            $this->view('pages/personal/editar',$datos);
        }
    }

public function buscar(){
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $datos = [
            'buscado' => trim($_GET['inputBuscador']),
            'opcion' => trim($_GET['selectBuscador']),
        ];
        $Personal=$this->personalModel->buscarPersonal($datos);
        $datos = [
            'Personal'=>$Personal,
             'tipoVista'=>1
        ];
        $this->view('pages/personal/personal',$datos);
    } 
}
    public function borrar($id){
        $personal=$this->personalModel->obtenerPersonalId($id);

        $datos = [
            'id' => $personal['id'],
            'usuario' => $personal['usuario'],
            'nombre' => $personal['nombre'],
            'apellidoP' => $personal['apellidoP'],
            'apellidoM' => $personal['apellidoM'],
            'contrasena' => $personal['contrasena'],
            'tipoUsuario' => $personal['tipoUsuario']  
        ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->personalModel->borrarPersonal($id)){
                    redireccionar('/personales');
                } else {
            
                }
            }
            $this->view('pages/personal/borrar',$datos);
    }

    public function obtenerProfesoresLike(){
        $query = $_GET['query'];
        $profesores = $this->personalModel->obtenerProfesoresLike($query);
        $datos = array();
        foreach($profesores as $profesor){
            array_push($datos,$profesor);
        }
        echo json_encode($datos);
    }

}
?>