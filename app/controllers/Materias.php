<?php

class Materias extends Controller{
    public function __construct(){
        $this->materiaModel=$this->model('Materia');
      
    }
    public function index(){
        $Materias=$this->materiaModel->obtenerMaterias();

        $datos = [
            'Materias'=>$Materias
        ];
        $this->view('pages/materias/materias',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'nombre' => trim($_POST['inputNombre']),
                'creditos' => trim($_POST['inputCreditos']),
                'unidades' => trim($_POST['inputUnidades'])
            ];
            if($this->materiaModel->agregarMateria($datos)){
                redireccionar('/materias');
            } else {
             
            }
        } else {
            $datos = [
                'nombre' => '',
                'creditos' => '',
                'unidades' => '',
            ];
            $this->view('pages/materias/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'nombre' => trim($_POST['inputNombre']),
                'creditos' => trim($_POST['inputCreditos']),
                'unidades' => trim($_POST['inputUnidades'])      
            ];
            if($this->materiaModel->actualizarMateria($datos)){
                redireccionar('/materias');
            } else {
               
            }

        } else {
            $materia=$this->materiaModel->obtenerMateriaId($id);

            $datos = [
                'id' => $materia['id'],
                'nombre' => $materia['nombre'],
                'creditos' => $materia['creditos'],
                'unidades' => $materia['unidades']
            ];
            $this->view('pages/materias/editar',$datos);

        }

    }

    public function borrar($id){
        $materia=$this->materiaModel->obtenerMateriaId($id);

        $datos = [
            'id' => $materia['id'],
            'nombre' => $materia['nombre'],
            'creditos' => $materia['creditos'],
            'unidades' => $materia['unidades']
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->materiaModel->borrarMateria($id)){
                    redireccionar('/materias');
                } else {
            
                }
            }
            $this->view('pages/materias/borrar',$datos);
    }




  


}
?>