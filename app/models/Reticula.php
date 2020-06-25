<?php 

class Reticula{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerReticulas(){
        $resultados=$this->db->query("SELECT reticula.id,  carrera.nombre, reticula.max_creditos, reticula.anio FROM reticula JOIN carrera ON carrera.id = reticula.idCarrera");
        return $resultados;
    }

    public function agregarReticula($datos){
        $bind=array(
                $datos['max_creditos'],
                $datos['anio'],
                $datos['idCarrera'],
        );
        $sql="INSERT INTO reticula (max_creditos,anio,idCarrera) values (?,?,?)";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function obtenerReticulaId($id){
        $bind=array($id);
        $sql="SELECT * FROM reticula WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarReticula($datos){
        $bind=array( 
            $datos['idCarrera'],  
            $datos['anio'], 
            $datos['max_creditos'],
            $datos['id']
        );
        $sql="UPDATE reticula SET idCarrera=?,anio=?,max_creditos=? where id=?";
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