<?php

class ReticulaMaterias extends Controller{
    public function __construct(){
        $this->reticulaMatariaModel=$this->model('ReticulaMateria');
      
    }
    public function index($id){
        $ReticulaMa=$this->reticulaMatariaModel->obtenerRerticulaMaterias($id);
        $datos = [
            'materias'=>$ReticulaMa
        ];
        $this->view('pages/reticulas/materias/materias',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'idReticula' => trim($_POST['inputReticula']),
                'idMateria' => trim($_POST['inputSemestre'])
            ];
            if($this->reticulaMatariaModel->agregarReticulaMa($datos)){
                redireccionar('/reticulamaterias');
            } else {
             
            }

        } else {
            $datos = [
                'materia' => '',
                'semestre' => '',
                
                
            ];
            $this->view('pages/reticulamaterias/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'materia' => trim($_POST['materia']),
                'semestre' => trim($_POST['semestre']),
              
                              
            ];
            if($this->reticulaMaModel->actualizarReticulaMa($datos)){
                redireccionar('/reticulaMasMa');
            } else {
               
            }

        } else {
            $reticulaMa=$this->reticulaMaModel->obtenerReticulaMaId($id);

            $datos = [
                'id' => $reticulaMa['id'],
                'materia' => $reticulaMa['materia'],
                'semestre' => $reticulaMa['semestre'],
               
             
                
                
            ];
            $this->view('pages/reticulaMasMa/editar',$datos);

        }

    }

    public function borrar($id){
        $reticulaMa=$this->reticulaMa->obtenerReticulaMaId($id);

        $datos = [
            'id' => $reticulaMa['id'],
            'materia' => $reticulaMa['materia'],
            'semestre' => $reticulaMa['semestre'],
           
         
            
            
        ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->reticulaMaModel->borrarReticulaMa($id)){
                    redireccionar('/reticulaMasMa');
                } else {
            
                }
            }
            $this->view('pages/reticulaMasMa/borrar',$datos);
    }




  


}
?>