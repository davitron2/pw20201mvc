<?php 

class ReticulaMateria{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerRerticulaMaterias(){
        $resultados=$this->db->query("SELECT * FROM reticula_materia");
        return $resultados;
    }

    public function agregarRerticulaMa($datos){
        $bind=array( 
                    $datos['idReticula'],  
                    $datos['idMateria']
        );
    $sql="INSERT INTO reticula_materia (idReticula,idMateria) values (?,?)";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerRerticulaMaId($id){
        $bind=array($id);
        $sql="SELECT * FROM reticula_materia WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarRerticulaMa($datos){
        $bind=array( 
            $datos['idReticula'],
            $datos['idMateria'],
            $datos['id']
        );
        $sql="UPDATE reticula_materia SET idReticula=?,idMateria=? where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarRerticulaMa($id){
        $bind=array($id);
        $sql="DELETE FROM reticula_materia WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>