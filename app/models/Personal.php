<?php 

class Personal{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerPersonal(){
        $resultados=$this->db->query("SELECT * FROM personal");
        return $resultados;
    }


    public function     buscarPersonal($datos){
        $bind=array($datos['buscado']);



        if ($datos['opcion'] == 1) {

            $resultados=$this->db->query("SELECT * FROM personal  where id=? ",$bind);

        }

         elseif ($datos['opcion'] == 2) {
            $resultados=$this->db->query("SELECT * FROM personal where nombre=?",$bind);
        } 
        
        elseif ($datos['opcion'] == 3) {
            $resultados=$this->db->query("SELECT * FROM personal where apellidoP=?",$bind);
        }
        elseif ($datos['opcion'] == 4) {
            $resultados=$this->db->query("SELECT * FROM personal where apellidoM=?",$bind);
        }
        elseif ($datos['opcion'] == 5) {
            $resultados=$this->db->query("SELECT * FROM personal where usuario=?",$bind);
        }

       
        return $resultados;
    }




    public function agregarPersonal($datos){
        $bind=array( 
            $datos['usuario'],  
            $datos['nombre'],  
            $datos['apellidoP'],  
            $datos['apellidoM'],  
                 
                    $datos['contrasena'],
                  $datos['tipoUsuario'],
                    
                   
        );
    $sql="INSERT INTO personal   (usuario,nombre,apellidoP,apellidoM,contrasena,tipoUsuario) VALUES (?,?,?,?,?,?)    ";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerPersonalId($id){
        $bind=array($id);
        $sql="SELECT * FROM personal WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }

    public function obtenerProfesoresLike($like){
        $bind=array($like,$like,$like);
        $sql="SELECT id,nombre,apellidoP,apellidoM FROM personal 
            WHERE (nombre LIKE CONCAT('%',?,'%') 
            OR apellidoP LIKE CONCAT('%',?,'%')
            OR apellidoM LIKE CONCAT('%',?,'%'))
            AND tipoUsuario = 2";
        $resultado=$this->db->query($sql,$bind);
        return $resultado;
    }

    public function actualizarPersonal($datos){
        $bind=array( $datos['usuario'],
                    $datos['nombre'],  
                    $datos['apellidoP'],
                    $datos['apellidoM'],
                    $datos['contrasena'],
                    $datos['tipoUsuario'],
                
                    $datos['id']
        );
        $sql="UPDATE personal SET usuario=?, nombre=?, apellidoP=?, apellidoM=?,contrasena=?,tipoUsuario=?  where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }


    public function borrarPersonal($id){
        $bind=array($id);
        $sql="DELETE FROM personal WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>