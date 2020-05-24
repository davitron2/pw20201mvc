<?php 

class Carrera{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerCarreras(){
        $resultados=$this->db->query("SELECT * FROM carrera");
        return $resultados;
    }

    public function agregarCarrera($datos){
        $bind=array( 
                    $datos['nombre'],  
                   
                   
        );
    $sql="INSERT INTO carrera SELECT (nombre) values (?)";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerCarreraId($id){
        $bind=array($id);
        $sql="SELECT * FROM carrera WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarCarrera($datos){
        $bind=array( $datos['nombre'],
                
                
                    $datos['id']
        );
        $sql="UPDATE  carrera SET nombre=? where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarCarrera($id){
        $bind=array($id);
        $sql="DELETE FROM carrera WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>