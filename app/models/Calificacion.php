<?php 

class Calificacion{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerCalificaciones(){
        $resultados=$this->db->query("SELECT * FROM Calificacion");
        return $resultados;
    }

    public function agregarCalificacion($datos){
        $bind=array( 
                    $datos['idGrupo'],  
                    $datos['idAlumno'],
                    $datos['unidad'],
                    $datos['calificacion'],
                    $datos['idCiclo'],
                   
        );
    $sql="INSERT INTO Calificacion (idGrupo,idAlumno,unidad,calificacion,idCiclo)    values (?,?,?,?,?)";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerCalificacionId($id){
        $bind=array($id);
        $sql="SELECT * FROM Calificacion WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarCalificacion($datos){
        $bind=array( $datos['idGrupo'],
                    $datos['idAlumno'],  
                    $datos['unidad'],
                    $datos['calificacion'],
                    $datos['idCiclo'],
                
                    $datos['id']
        );
        $sql="UPDATE  Calificacion SET idGrupo=?, idAlumno=?, unidad=?, calificacion=?, idCiclo=?  where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarCalificacion($id){
        $bind=array($id);
        $sql="DELETE FROM Calificacion WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>