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