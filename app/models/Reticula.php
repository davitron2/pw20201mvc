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


    public function     buscarReticula($datos){
        $bind=array($datos['buscado']);



        if ($datos['opcion'] == 1) {

            $resultados=$this->db->query("SELECT reticula.id,  carrera.nombre, reticula.max_creditos, reticula.anio FROM reticula JOIN carrera ON carrera.id = reticula.idCarrera where reticula.id=?",$bind);

        }

         elseif ($datos['opcion'] == 2) {
            $resultados=$this->db->query("SELECT reticula.id,  carrera.nombre, reticula.max_creditos, reticula.anio FROM reticula JOIN carrera ON carrera.id = reticula.idCarrera where carrera.nombre=?",$bind);
        } 
        
        elseif ($datos['opcion'] == 3) {
            $resultados=$this->db->query("SELECT reticula.id,  carrera.nombre, reticula.max_creditos, reticula.anio FROM reticula JOIN carrera ON carrera.id = reticula.idCarrera where reticula.max_creditos=?",$bind);
        }
        elseif ($datos['opcion'] == 4) {
            $resultados=$this->db->query("SELECT reticula.id,  carrera.nombre, reticula.max_creditos, reticula.anio FROM reticula JOIN carrera ON carrera.id = reticula.idCarrera where reticula.anio=?",$bind);
        }
      

       
        return $resultados;
    }




    public function obtenerReticulasNombre(){
        $resultados=$this->db->query("SELECT reticula.id, CONCAT(carrera.nombre,': ',reticula.id) as nombre FROM reticula,carrera where reticula.idCarrera=carrera.id");
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
        $sql="SELECT reticula.id, reticula.idCarrera,reticula.anio,reticula.max_creditos,carrera.nombre as nombre from reticula,carrera 
        WHERE reticula.idCarrera=carrera.id and reticula.id=?";
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