<?php

class ReticulaMaterias extends Controller{
    public function __construct(){
        $this->reticulaMatariaModel=$this->model('ReticulaMateria');
        $this->materiasModel=$this->model('Materia');
    }
    public function index($id){
        $ReticulaMa=$this->reticulaMatariaModel->obtenerReticulaMaterias($id);
        $datos = [
            'materias'=>$ReticulaMa,
            'id'=>$id
        ];
        $this->view('pages/reticulas/materias/materias',$datos);
    }


    public function buscar(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $datos = [
                'buscado' => trim($_GET['inputBuscador']),
                'opcion' => trim($_GET['selectBuscador']),
                'idReticula'=> trim($_GET['inputidReticula']),
            ];
            $Materias=$this->reticulaMatariaModel->buscarMateria($datos);
            $datos = [
                'materias'=>$Materias,
                'id'=> trim($_GET['inputidReticula']),
                 'tipoVista'=>1
            ];
            $this->view('pages/reticulas/materias/materias',$datos);
        } 
    }



    public function agregar($reticula){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'idReticula' => $reticula,
                'idMateria' => trim($_POST['idMateria'])
            ];
            if($this->reticulaMatariaModel->agregarReticulaMa($datos)){
                $direccion = "/reticulamaterias/".$reticula;
                redireccionar($direccion);
            }

        } else {
            $materias=$this->reticulaMatariaModel->obtenerMateriasNoEnReticula($reticula);
            $datos = [
                'materias' => $materias,
                'reticula' => $reticula
            ];
            $this->view('pages/reticulas/materias/agregar',$datos);
        }
    }


    public function borrar($id){
        $reticulaMa=$this->reticulaMatariaModel->obtenerReticulaMaId($id);
        $datos = [
            'id' => $reticulaMa['id'],
            'reticula' => $reticulaMa['idReticula'],
        ];
        $direccion = "/reticulamaterias/".$datos['reticula'];
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->reticulaMatariaModel->borrarReticulaMa($id)){
                redireccionar($direccion);
            }
        }
        $this->view($direccion,$datos);
    }




  


}
?>