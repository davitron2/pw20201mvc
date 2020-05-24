<?php 

class Grupo{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerGrupos(){
        $resultados=$this->db->query("SELECT * FROM Grupo");
        return $resultados;
    }

    public function agregarGrupo($datos){
        $bind=array( 
                    $datos['idMateria'],  
                    $datos['idProfesor'],
                    $datos['idHorario'],
                    $datos['grupo'],
                    $datos['limite'],
                   
        );
    $sql="INSERT INTO Grupo    (idMateria, idProfesor, idHorario, grupo,limite) values (?,?,?,?,?) ";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerGrupoId($id){
        $bind=array($id);
        $sql="SELECT * FROM Grupo WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarGrupo($datos){
        $bind=array( $datos['idMateria'],
                    $datos['idProfesor'],  
                    $datos['idHorario'],
                    $datos['grupo'],
                    $datos['limite'],
                
                    $datos['id']
        );
        $sql="UPDATE  Grupo SET idMateria=?, idProfesor=?, idHorario=?, grupo=?, limite=?  where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarGrupo($id){
        $bind=array($id);
        $sql="DELETE FROM Grupo WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>