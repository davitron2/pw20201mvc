<?php 

class Periodo{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerPeriodos(){
        $resultados=$this->db->query("SELECT * FROM periodo");
        return $resultados;
    }

    public function agregarPeriodo($datos){
        $bind=array( 
                    $datos['descripcion'],  
                   
                   
        );
    $sql="INSERT INTO periodo SELECT (descripcion) values (?)";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerPeriodoId($id){
        $bind=array($id);
        $sql="SELECT * FROM periodo WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarPeriodo($datos){
        $bind=array( $datos['descripcion'],
                
                
                    $datos['id']
        );
        $sql="UPDATE  periodo SET descripcion=? where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarPeriodo($id){
        $bind=array($id);
        $sql="DELETE FROM periodo WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>