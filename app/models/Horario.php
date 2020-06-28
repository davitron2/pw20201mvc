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

    public function obtenerHorarioDeDocente($idDocente) {
        $bind = array($idDocente);
        $sql = "SELECT m.nombre As 'Materia', g.grupo As 'Grupo', MAX(IF(h.diaSemana = 1, CONCAT(h.horaInicio, ' - ', h.horaFin, ' ', a.nombre), '-')) As 'Lunes', MAX(IF(h.diaSemana = 2, CONCAT(h.horaInicio, ' - ', h.horaFin, ' ', a.nombre), '-')) As 'Martes', MAX(IF(h.diaSemana = 3, CONCAT(h.horaInicio, ' - ', h.horaFin, ' ', a.nombre), '-')) As 'Miercoles', MAX(IF(h.diaSemana = 4, CONCAT(h.horaInicio, ' - ', h.horaFin, ' ', a.nombre), '-')) As 'Jueves', MAX(IF(h.diaSemana = 5, CONCAT(h.horaInicio, ' - ', h.horaFin, ' ', a.nombre), '-')) As 'Viernes', MAX(IF(h.diaSemana = 6, CONCAT(h.horaInicio, ' - ', h.horaFin, ' ', a.nombre), '-')) As 'Sabado' FROM grupo g LEFT JOIN horario h ON g.id = h.idGrupo JOIN materia m ON g.idMateria = m.id JOIN aula a ON h.idAula = a.id WHERE g.idProfesor = ? GROUP BY m.nombre, g.grupo ";
        $resultado = $this->db->query($sql, $bind);
        return $resultado;
    }
}

?>