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

    public function     buscarMateria($datos){
        $bind=array($datos['buscado']);
        if ($datos['opcion'] == 1) {

            $resultados=$this->db->query("SELECT * FROM materia  where id=? ",$bind);

        }
         elseif ($datos['opcion'] == 2) {
            $resultados=$this->db->query("SELECT * FROM materia where nombre=?",$bind);
        } 
        
        elseif ($datos['opcion'] == 3) {
            $resultados=$this->db->query("SELECT * FROM materia where creditos=?",$bind);
        }
        elseif ($datos['opcion'] == 4) {
            $resultados=$this->db->query("SELECT * FROM materia where unidades=?",$bind);
        }

       
        return $resultados;
    }
    
    public function validarNombreMateria($datos){
        $bind=array( 
            $datos['nombre'],  
            
        
       );
        $sql = "SELECT COUNT(*) FROM materia
            WHERE   nombre=?              ";
        $resultado=$this->db->queryOne($sql,$bind);
        return $resultado;
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

    public function obtenerMateriasLike($like){
        $bind=array($like);
        $sql="SELECT * FROM materia WHERE nombre LIKE CONCAT('%',?,'%');";
        $resultado=$this->db->query($sql,$bind);
        return $resultado;
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