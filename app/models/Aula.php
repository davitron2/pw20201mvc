<?php 

class Aula{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerAulas(){
        $resultados=$this->db->query("SELECT * FROM aula");
        return $resultados;
    }

    public function agregarAula($datos){
        $bind=array( 
                    $datos['nombre'],  
                   
                   
        );
    $sql="INSERT INTO aula (nombre) values (?)";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerAulaId($id){
        $bind=array($id);
        $sql="SELECT * FROM aula WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarAula($datos){
        $bind=array( $datos['nombre'],
                
                
                    $datos['id']
        );
        $sql="UPDATE  aula SET nombre=? where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarAula($id){
        $bind=array($id);
        $sql="DELETE FROM aula WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>