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


    public function     buscarGrupo($datos){
        $bind=array($datos['buscado']);
        if ($datos['opcion'] == 1) {

            $resultados=$this->db->query("SELECT grupo.id,materia.nombre as materia ,personal.nombre as profesor,personal.apellidoP,personal.apellidoM,grupo.grupo,grupo.limite
            FROM grupo
            INNER JOIN materia ON grupo.idMateria = materia.id
            INNER JOIN personal ON grupo.idProfesor = personal.id where grupo.id=?",$bind);

        }
         elseif ($datos['opcion'] == 2) {
            $resultados=$this->db->query("SELECT grupo.id,materia.nombre as materia ,personal.nombre as profesor,personal.apellidoP,personal.apellidoM,grupo.grupo,grupo.limite
            FROM grupo
            INNER JOIN materia ON grupo.idMateria = materia.id
            INNER JOIN personal ON grupo.idProfesor = personal.id where materia.nombre=?",$bind);
        } 
        
        elseif ($datos['opcion'] == 3) {
            $resultados=$this->db->query("SELECT grupo.id,materia.nombre as materia ,personal.nombre as profesor,personal.apellidoP,personal.apellidoM,grupo.grupo,grupo.limite
            FROM grupo
            INNER JOIN materia ON grupo.idMateria = materia.id
            INNER JOIN personal ON grupo.idProfesor = personal.id where personal.nombre=?",$bind);
        }
        elseif ($datos['opcion'] == 4) {
            $resultados=$this->db->query("SELECT grupo.id,materia.nombre as materia ,personal.nombre as profesor,personal.apellidoP,personal.apellidoM,grupo.grupo,grupo.limite
            FROM grupo
            INNER JOIN materia ON grupo.idMateria = materia.id
            INNER JOIN personal ON grupo.idProfesor = personal.id where grupo.grupo=?",$bind);
        }
        elseif ($datos['opcion'] == 5) {
            $resultados=$this->db->query("SELECT grupo.id,materia.nombre as materia ,personal.nombre as profesor,personal.apellidoP,personal.apellidoM,grupo.grupo,grupo.limite
            FROM grupo
            INNER JOIN materia ON grupo.idMateria = materia.id
            INNER JOIN personal ON grupo.idProfesor = personal.id where grupo.limite=?",$bind);
        }
       
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

        $bind=array($id);
        $sql="DELETE FROM horario WHERE horario.idGrupo=?";
        $resultado=$this->db->query($sql,$bind);
       
        $bind=array($id);
        $sql="DELETE from alumno_grupo  WHERE alumno_grupo.idGrupo=?";
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



    public function validarNombreMateriaGrupo($datos){
        $bind=array( 
            $datos['idMateria'],  
            $datos['grupo'],
        
       );
        $sql = "SELECT COUNT(*) FROM grupo
            WHERE   idMateria=?   and grupo=?               ";
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
  
    public function obtenerGruposMateria($id){
        $bind=array($id);
        $sql = "SELECT grupo.id,
                grupo.grupo,
                personal.nombre,
                personal.apellidoP,
                personal.apellidoM,
                IFNULL((select concat(DATE_FORMAT(h.horaInicio, '%H:%i'),'-',DATE_FORMAT(h.horaFin, '%H:%i'),' <br>',a.nombre)
                    from horario h inner join aula a on h.idAula = a.id 
                    where h.idGrupo=grupo.id and h.diaSemana =1),'-') as 'Lunes',
                IFNULL((select concat(DATE_FORMAT(h.horaInicio, '%H:%i'),'-',DATE_FORMAT(h.horaFin, '%H:%i'),' <br>',a.nombre)
                    from horario h inner join aula a on h.idAula = a.id 
                    where h.idGrupo=grupo.id and h.diaSemana =2),'-') as 'Martes',
                IFNULL((select concat(DATE_FORMAT(h.horaInicio, '%H:%i'),'-',DATE_FORMAT(h.horaFin, '%H:%i'),' <br>',a.nombre)
                    from horario h inner join aula a on h.idAula = a.id 
                    where h.idGrupo=grupo.id and h.diaSemana =3),'-') as 'Miercoles',
                IFNULL((select concat(DATE_FORMAT(h.horaInicio, '%H:%i'),'-',DATE_FORMAT(h.horaFin, '%H:%i'),' <br>',a.nombre)
                    from horario h inner join aula a on h.idAula = a.id 
                    where h.idGrupo=grupo.id and h.diaSemana =4),'-') as 'Jueves',
                IFNULL((select concat(DATE_FORMAT(h.horaInicio, '%H:%i'),'-',DATE_FORMAT(h.horaFin, '%H:%i'),' <br>',a.nombre)
                    from horario h inner join aula a on h.idAula = a.id 
                    where h.idGrupo=grupo.id and h.diaSemana =5),'-') as 'Viernes',
                IFNULL((select concat(DATE_FORMAT(h.horaInicio, '%H:%i'),'-',DATE_FORMAT(h.horaFin, '%H:%i'),' <br>',a.nombre)
                    from horario h inner join aula a on h.idAula = a.id 
                    where h.idGrupo=grupo.id and h.diaSemana =6),'-') as 'Sabado'
            FROM grupo
            INNER JOIN horario ON grupo.id = horario.idGrupo
            INNER JOIN personal ON grupo.idProfesor = personal.id
            INNER JOIN aula ON horario.idAula = aula.id
            WHERE grupo.idMateria = ?
            group by grupo.id";
        
        $resultados=$this->db->query($sql,$bind);
        return $resultados;
    }

    public function obtenerListaDeAlumnos($idGrupo) {
        $bind=array($idGrupo, $_SESSION['usuario']['id']);
        $sql="SELECT a.noControl, CONCAT(a.apellidoP, ' ', a.apellidoM, ' ', a.nombres) As Alumno FROM alumno_grupo ag JOIN grupo g ON ag.idGrupo = g.id JOIN alumno a ON ag.idAlumno = a.noControl JOIN materia m ON g.idMateria = m.id WHERE g.id = ? AND g.idProfesor = ? ORDER BY a.apellidoP, a.apellidoM, a.nombres";
        $resultado=$this->db->query($sql, $bind);
        return $resultado;
    }
}

?>