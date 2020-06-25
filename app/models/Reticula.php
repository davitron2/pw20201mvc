<?php 

class Reticula{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerReticulas(){
        $resultados=$this->db->query("SELECT * FROM reticula");
        return $resultados;
    }


    public function obtenerReticulasNombre(){
        $resultados=$this->db->query("SELECT reticula.id, CONCAT(carrera.nombre,': ',reticula.id) as nombre FROM reticula,carrera where reticula.idCarrera=carrera.id");
        return $resultados;
    }

    public function agregarReticula($datos){
        $bind=array( 
                    $datos['idCarrera'],  
                    $datos['año'], 
                   
        );
    $sql="INSERT INTO reticula SELECT (carrera,año) values (?,?)";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerReticulaId($id){
        $bind=array($id);
        $sql="SELECT * FROM reticula WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }

    public function obtenerReticulaIdNombre($id){
        $bind=array($id);
        $sql="SELECT  CONCAT(carrera.nombre,': ',reticula.id) as nombre FROM reticula,carrera      where reticula.idCarrera=carrera.id and reticula.id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }

    public function actualizarReticula($datos){
        $bind=array( $datos['carrera'],
        $datos['año'],
                
                    $datos['id']
        );
        $sql="UPDATE  reticula SET carrera=?,año=? where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarReticula($id){
        $bind=array($id);
        $sql="DELETE FROM reticula WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>