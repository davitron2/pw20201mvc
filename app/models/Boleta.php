<?php 

class Boleta{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerBoletas(){
        $resultados=$this->db->query("SELECT * FROM Boleta");
        return $resultados;
    }

    public function agregarBoleta($datos){
        $bind=array( 
                    $datos['idGrupo'],  
                    $datos['idAlumno'],
                    $datos['idCiclo'],
                    $datos['calificacion'],
                    
                   
        );
    $sql="INSERT INTO Boleta (idGrupo,idAlumno,idCiclo,calificacion) values (?,?,?,?) ";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerBoletaId($id){
        $bind=array($id);
        $sql="SELECT * FROM Boleta WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarBoleta($datos){
        $bind=array( $datos['idGrupo'],
                    $datos['idAlumno'],  
                    $datos['idCiclo'],
                    $datos['calificacion'],
                   
                
                    $datos['id']
        );
        $sql="UPDATE  Boleta SET idGrupo=?, idAlumno=?,  idCiclo=?,calificacion=?  where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarBoleta($id){
        $bind=array($id);
        $sql="DELETE FROM Boleta WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>