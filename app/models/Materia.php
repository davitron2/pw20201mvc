<?php 

class Materia{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerMaterias(){
        $resultados=$this->db->query("SELECT * FROM materia");
        return $resultados;
    }

    public function agregarMateria($datos){
        $bind=array( 
                    $datos['nombre'],  
                    $datos['creditos'],
                    $datos['unidades'],
                   
                   
        );
    $sql="INSERT INTO materia   (nombre,creditos,unidades) values (?,?,?)      ";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerMateriaId($id){
        $bind=array($id);
        $sql="SELECT * FROM materia WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarMateria($datos){
        $bind=array( $datos['nombre'],
                    $datos['creditos'],  
                    $datos['unidades'],
                   
                
                    $datos['id']
        );
        $sql="UPDATE  materia SET nombre=?, creditos=?, unidades=?  where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarMateria($id){
        $bind=array($id);
        $sql="DELETE FROM materia WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>