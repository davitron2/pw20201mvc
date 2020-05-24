<?php 

class RerticulaMa{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerRerticulasMa(){
        $resultados=$this->db->query("SELECT * FROM rerticulaMa");
        return $resultados;
    }

    public function agregarRerticulaMa($datos){
        $bind=array( 
                    $datos['materia'],  
                    datos['semestre'], 
                   
        );
    $sql="INSERT INTO rerticulaMa SELECT (materia,semestre) values (?,?)";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerRerticulaMaId($id){
        $bind=array($id);
        $sql="SELECT * FROM rerticulaMa WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarRerticulaMa($datos){
        $bind=array( $datos['materia'],
        $datos['semestre'],
                
                    $datos['id']
        );
        $sql="UPDATE  rerticulaMa SET materia=?,semestre=? where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarRerticulaMa($id){
        $bind=array($id);
        $sql="DELETE FROM rerticulaMa WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>