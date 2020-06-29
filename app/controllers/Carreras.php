<?php

class Carreras extends Controller{
    public function __construct(){
        $this->carreraModel=$this->model('Carrera');
      
    }
    public function index(){
        $Carreras=$this->carreraModel->obtenerCarreras();


        $datos = [
            
            'Carreras'=>$Carreras
        ];
        $this->view('pages/carreras/carreras',$datos);
    }

    public function buscar(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $datos = [
                'buscado' => trim($_GET['inputBuscador']),
                'opcion' => trim($_GET['selectBuscador']),
            ];
            $carreras=$this->carreraModel->buscarCarrera($datos);
            $datos = [
                'Carreras'=>$carreras,
                 'tipoVista'=>1
            ];
            $this->view('pages/carreras/carreras',$datos);
        } 
    }


    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'nombre' => trim($_POST['inputNombre']),
             
            
            ];
            if($this->carreraModel->validarNombreCarrera($datos)){


                $datos = [
                    'nombre' => '',   
                ];
                $this->view('pages/carreras/agregar',$datos);          
                echo "<script>showErrorModal('Ya existe un carrera con ese nombre') </script>  "; 
            }else {
                if($this->carreraModel->agregarCarrera($datos)){
                    redireccionar('/carreras');
                } else {
                    
                }
            }

        } else {
            $datos = [
                'nombre' => '',
              
            ];
            $this->view('pages/carreras/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'nombre' => trim($_POST['inputNombre']),                
            ];
            if($this->carreraModel->actualizarCarrera($datos)){
                redireccionar('/carreras');
            } else {
               
            }

        } else {
            $carrera=$this->carreraModel->obtenerCarreraId($id);

            $datos = [
                'id' => $carrera['id'],
                'nombre' => $carrera['nombre'],
              
            ];
            $this->view('pages/carreras/editar',$datos);

        }

    }

    public function borrar($id){
        $carrera=$this->carreraModel->obtenerCarreraId($id);

        $datos = [
            'id' => $carrera['id'],
           
            'nombre' => $carrera['nombre'],
    
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->carreraModel->borrarCarrera($id)){
                    redireccionar('/carreras');
                } else {
            
                }
            }
            $this->view('pages/carreras/borrar',$datos);
    }



  


}
?>