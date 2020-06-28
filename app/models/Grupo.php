<?php 

class Grupo{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerGrupos(){
        $resultados=$this->db->query("SELECT grupo.id,materia.nombre as materia ,personal.nombre as profesor,personal.apellidoP,personal.apellidoM,grupo.grupo,grupo.limite
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

    public function obtenerHorariosGrupo($id){
        $bind = array($id);
        $sql = "SELECT horario.id,horario.idGrupo,aula.nombre,horario.diaSemana,horario.horaInicio,horario.horaFin
            FROM horario
            INNER JOIN aula ON horario.idAula = aula.id
            WHERE idGrupo = ?;";
        
        $resultados=$this->db->query($sql,$bind);
        return $resultados;
    }

    public function agregarHorario($datos){
        $bind = array(
            $datos['idGrupo'],
            $datos['idAula'],
            $datos['diaSemana'],
            $datos['horaInicio'],
            $datos['horaFin'], 
        );
        $sql = "INSERT INTO horario (idGrupo,idAula,diaSemana,horaInicio,horaFin) VALUES (?,?,?,?,?)";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function actualizarHorario($datos){
        $bind = array(
            $datos['idAula'],
            $datos['diaSemana'],
            $datos['horaInicio'],
            $datos['horaFin'], 
            $datos['id'] 
        );
        $sql = "UPDATE horario SET idAula=?,diaSemana=?,horaInicio=?,horaFin=? WHERE id = ?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function validarHorarioAula($datos){
        $bind = array(
            $datos['horaFin'], 
            $datos['horaInicio'],
            $datos['idAula'],
            $datos['diaSemana'],
        );
        $sql = "SELECT COUNT(*) FROM horario
            WHERE (horaInicio < ? AND horaFin > ?) AND
                idAula = ? AND diaSemana = ?;";
        $resultado=$this->db->queryOne($sql,$bind);
        return $resultado;
    }

    public function validarHorarioProfe($datos){
        $bind = array(
            $datos['horaFin'], 
            $datos['horaInicio'],
            $datos['idGrupo'],
            $datos['diaSemana'],
        );
        $sql = "SELECT COUNT(*) FROM horario
            INNER JOIN grupo on horario.idGrupo = grupo.id
            WHERE (horario.horaInicio < ? AND horario.horaFin > ?) AND
                grupo.idProfesor = (SELECT idProfesor FROM grupo WHERE id = ?) AND horario.diaSemana = ?;";
        $resultado=$this->db->queryOne($sql,$bind);
        return $resultado;
    }

    public function borrarHorario($id){
        $bind=array($id);
        $sql="DELETE FROM horario WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function obtenerGruposDeDocente($idDocente) {
        $bind = array($idDocente);
        $sql = "SELECT g.id, m.nombre As Materia, g.grupo As Grupo FROM alumno_grupo ag JOIN alumno a On ag.idAlumno = a.noControl JOIN grupo g ON ag.idGrupo = g.id JOIN materia m ON g.idMateria = m.id WHERE g.idProfesor = ? GROUP BY m.nombre, g.grupo ";
        $resultado = $this->db->query($sql, $bind);
        return($resultado);
    }

}

?>