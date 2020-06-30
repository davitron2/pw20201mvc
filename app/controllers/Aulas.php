<?php

class Aulas extends Controller{
    public function __construct(){
        $this->aulaModel=$this->model('Aula');
        
    }
    public function index(){
        $aulas=$this->aulaModel->obtenerAulas();
       
        $datos = [
            
            'aulas'=>$aulas
        ];
        $this->view('pages/aulas/aulas',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'nombre' => trim($_POST['inputNombre']),
                
            ];

            if($this->aulaModel->validarNombreAula($datos)){

                $datos = [
                    'nombre' => '',   
                ];
                $this->view('pages/aulas/agregar',$datos);          
                echo "<script>showErrorModal('Ya existe un aula con ese nombre') </script>  ";
            }else {
                if($this->aulaModel->agregarAula($datos)){
                    redireccionar('/aulas');
                } else {
                    
                }
            }
        } else {
            $datos = [
                'nombre' => '',   
            ];
            $this->view('pages/aulas/agregar',$datos);
        }
    }

    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos = [
                'id' => $id,
                'nombre' => trim($_POST['inputNombre']),
                
            ];
            if($this->aulaModel->actualizarAula($datos)){
                redireccionar('/aulas');
            } else {
                
            }

        } else {
            $aula=$this->aulaModel->obtenerAulaId($id);

            $datos = [
                'id' => $aula['id'],
                'nombre' => $aula['nombre'],
            ];
            $this->view('pages/aulas/editar',$datos);
        }

    }

    public function buscar(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $datos = [
                'buscado' => trim($_GET['inputBuscador']),
                'opcion' => trim($_GET['selectBuscador']),
            ];
            $aulas=$this->aulaModel->buscarAula($datos);
            $datos = [
                'aulas'=>$aulas,
                 'tipoVista'=>1
            ];
            $this->view('pages/aulas/aulas',$datos);
        } 
    }



    public function borrar($id){
        $aula=$this->aulaModel->obtenerAulaId($id);

            $datos = [
                'id' => $aula['id'],
                'nombre' => $aula['nombre'], 
            ];

            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->aulaModel->borrarAula($id)){
                    redireccionar('/aulas');
                } else {
                    
                }
            }
            $this->view('pages/aulas/borrar',$datos);
    }

    public function obtenerAulasLike(){
        $query = $_GET['query'];
        $aulas = $this->aulaModel->obtenerAulasLike($query);
        $datos = array();
        foreach($aulas as $aula){
            array_push($datos,$aula);
        }
        echo json_encode($datos);
    }

    public function horarios(){
        $horarios = $this->aulaModel->obtenerHorarioAulas();
        $datos = ['horarios'=>$horarios];
        $this->view('pages/aulas/horarios',$datos);
    }

    public function HorarioAulasPdf(){
      
        $horarios = $this->aulaModel->obtenerHorarioAulas();
        foreach($horarios as $key=>$horario){
            $registros[]= [
                                  
                        'aula'=>$horario['aula'] ,
                        'grupo'=> $horario['grupo'] ,
                        'profesor'=> $horario['profesor'] ,
                        'materia'=> $horario['materia'],
                        'Lunes'=> $horario['lunes'],
                        'Martes'=> $horario['martes'],
                        'Miercoles'=> $horario['miercoles'],
                        'Jueves'=> $horario['jueves'],
                        'Viernes'=> $horario['viernes'],
                        'Sabado'=> $horario['sabado']
                      
            ];
                                        
    }
    $datos=['Horarios'=>$registros  ];
      $this->view('pages/aulas/HorariosImpresion',$datos);
    }

}
?>