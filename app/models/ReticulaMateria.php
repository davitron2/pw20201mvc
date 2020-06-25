<?php 

class ReticulaMateria{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerReticulaMaterias($id){
        $bind=array($id);
        $sql="SELECT reticula_materia.id, reticula_materia.idMateria, materia.nombre, materia.creditos, materia.unidades 
            FROM reticula_materia  
            INNER JOIN materia ON reticula_materia.idMateria = materia.id 
            WHERE idReticula = ?";
        $resultados=$this->db->query($sql,$bind);
        return $resultados;
    }

    public function agregarReticulaMa($datos){
        $bind=array( 
                    $datos['idReticula'],  
                    $datos['idMateria']
        );
        $sql="INSERT INTO reticula_materia (idReticula,idMateria) values (?,?)";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function obtenerReticulaMaId($id){
        $bind=array($id);
        $sql="SELECT * FROM reticula_materia WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarRerticulaMa($datos){
        $bind=array( 
            $datos['idReticula'],
            $datos['idMateria'],
            $datos['id']
        );
        $sql="UPDATE reticula_materia SET idReticula=?,idMateria=? where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarReticulaMa($id){
        $bind=array($id);
        $sql="DELETE FROM reticula_materia WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>