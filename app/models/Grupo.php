<?php 

class Grupo{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerGrupos(){
        $resultados=$this->db->query("SELECT *
            FROM grupo
            INNER JOIN materia ON grupo.idMateria = materia.id
            INNER JOIN personal ON grupo.idProfesor = personal.id");
        return $resultados;
    }

    public function agregarGrupo($datos){
        $bind=array( 
                    $datos['idMateria'],  
                    $datos['idProfesor'],
                    $datos['grupo'],
                    $datos['limite']
        );
        $sql="INSERT INTO grupo (idMateria, idProfesor, grupo,limite) values (?,?,?,?) ";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function obtenerGrupoId($id){
        $bind=array($id);
        $sql="SELECT * FROM grupo WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarGrupo($datos){
        $bind=array( $datos['idMateria'],
                    $datos['idProfesor'],
                    $datos['grupo'],
                    $datos['limite'],
                    $datos['id']
        );
        $sql="UPDATE grupo SET idMateria=?, idProfesor=?, grupo=?, limite=?  where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarGrupo($id){
        $bind=array($id);
        $sql="DELETE FROM grupo WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>