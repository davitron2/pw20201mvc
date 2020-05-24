<?php

class ReticulaMasMa extends Controller{
    public function __construct(){
        $this->reticulaMaModel=$this->model('ReticulaMa');
      
    }
    public function index(){
        $ReticulaMa=$this->reticulaMaModel->obtenerReticulaMasMa();


        $datos = [
            
            'ReticulaMasMa'=>$ReticulaMasMa
        ];
        $this->view('pages/reticulaMasMa/reticulaMasMa',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'materia' => trim($_POST['materia']),
                'semestre' => trim($_POST['semestre']),
                
            ];
            if($this->reticulaMaModel->agregarReticulaMa($datos)){
                redireccionar('/reticulaMasMa');
            } else {
             
            }

        } else {
            $datos = [
                'materia' => '',
                'semestre' => '',
                
                
            ];
            $this->view('pages/reticulaMasMa/agregar',$datos);
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