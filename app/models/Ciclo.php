<?php 

class Ciclo{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerCiclos(){
        $resultados=$this->db->query("SELECT * FROM ciclo");
        return $resultados;
    }

    public function agregarCiclo($datos){
        $bind=array( 
                    $datos['idPeriodo'],  
                    datos['año'], 
                   
        );
    $sql="INSERT INTO ciclo SELECT (idPeriodo,año) values (?,?)";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerCicloId($id){
        $bind=array($id);
        $sql="SELECT * FROM ciclo WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarCiclo($datos){
        $bind=array( $datos['idPeriodo'],
        $datos['año'],
                
                    $datos['id']
        );
        $sql="UPDATE  ciclo SET idPeriodo=?,año=? where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarCiclo($id){
        $bind=array($id);
        $sql="DELETE FROM ciclo WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>