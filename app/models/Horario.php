<?php 

class Horario{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerHorarios(){
        $resultados=$this->db->query("SELECT * FROM Horario");
        return $resultados;
    }

    public function agregarHorario($datos){
        $bind=array( 
                    $datos['diaSemana'],  
                    $datos['horaInicio'],
                    $datos['horaFin'],
                    $datos['idAula'],
                   
        );
    $sql="INSERT INTO Horario   (diaSemana,horaInicio,horaFin,idAula) values (?,?,?,?) ";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerHorarioId($id){
        $bind=array($id);
        $sql="SELECT * FROM Horario WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarHorario($datos){
        $bind=array( $datos['diaSemana'],
                    $datos['horaInicio'],  
                    $datos['HoraFin'],
                    $datos['idAula'],
                
                    $datos['id']
        );
        $sql="UPDATE  Horario SET diaSemana=?, horaInicio=?, horaFin=?, idAula=?  where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarHorario($id){
        $bind=array($id);
        $sql="DELETE FROM Horario WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>