<?php 

class AlumnoGrupo{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerTodos(){
        $resultados=$this->db->query("SELECT * from alumno_grupo");
        return $resultados;
    }
    public function obtenerGruposAlumno($id){
        $bind = array($id);
        $sql = "SELECT * from alumno_grupo WHERE idAlumno = ?";
        $resultados=$this->db->query($sql,$bind);
        return $resultados;
    }
    public function obtenerAlumnosGrupo($id){
        $bind = array($id);
        $sql = "SELECT * from alumno_grupo WHERE idGrupo = ?";
        $resultados=$this->db->query($sql,$bind);
        return $resultados;
    }

    public function agregarAlumnoGrupo($datos){
        $bind=array( 
                    $datos['idAlumno'],
                    $datos['idGrupo'],
                    $datos['estado']
        );
        echo $datos['idGrupo'];
        $sql="INSERT INTO alumno_grupo (idAlumno,idGrupo,estado) 
            VALUES (?,?,?)";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarAlumnoGrupo($datos){
        $bind=array($datos['idGrupo'],$datos['idAlumno']);
        $sql="DELETE FROM alumno_grupo WHERE idGrupo=? AND idAlumno = ?;";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function validarLimiteGrupo($datos){
        $bind=array($datos['idGrupo'],$datos['idGrupo']);
        $sql="select g.limite>(SELECT COUNT(*) FROM alumno_grupo WHERE idGrupo=?) as 'valido'
                from grupo g 
                where g.id =?";
        $resultado=$this->db->queryOne($sql,$bind);
        return $resultado;
    }

    public function validarExiste($datos){
        $bind=array($datos['idAlumno'],$datos['idGrupo']);
        $sql="SELECT count(*) 
            FROM alumno_grupo ag 
            INNER JOIN grupo g ON ag.idGrupo = g.id
            WHERE idAlumno = ? AND idMateria = (SELECT idMateria FROM grupo WHERE id = ?)";
        $resultado=$this->db->queryOne($sql,$bind);
        return $resultado;
    }

    public function validarCreditos($datos){
        $bind=array($datos['idAlumno'],$datos['idGrupo'],$datos['idAlumno']);
        $sql="select (select r.max_creditos
                from alumno a
                inner join reticula r on r.id = a.idReticula
                where a.noControl = ?) >=
            (select (select m2.creditos from grupo g2 
                inner join materia m2 on m2.id = g2.idMateria 
                where g2.id = ?
            )+ (select IFNULL(sum(m.creditos),0)
                from alumno_grupo ag
                inner join grupo g on ag.idGrupo = g.id
                inner join materia m on m.id = g.idMateria
                where ag.idAlumno = ?)) as 'valido'";
        $resultado=$this->db->queryOne($sql,$bind);
        return $resultado;
    }

    public function validarEmpalmes($datos){
        $bind=array($datos['idAlumno'],$datos['idGrupo'],$datos['idGrupo']);
        $sql = "select ifnull(count(*),0) as 'conteo' from horario h 
            where h.idGrupo in (select ag.idGrupo from alumno_grupo ag where ag.idAlumno = ?)
            and h.horaInicio < (select h2.horaFin from horario h2 where h2.idGrupo  =  ? and h2.diaSemana = h.diaSemana limit 1)
            and h.horaFin > (select h2.horaInicio from horario h2 where h2.idGrupo  =  ? and h2.diaSemana = h.diaSemana limit 1 )";
        $resultado=$this->db->queryOne($sql,$bind);
        return $resultado;
    }

    public function obtenerHorarioAlumno($id){
        $bind = array($id);
        $sql = "SELECT grupo.id,
                    materia.nombre as 'materia',
                    materia.creditos as 'creditos',
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
                INNER JOIN alumno_grupo on alumno_grupo.idGrupo = grupo.id
                INNER JOIN materia on materia.id = grupo.idMateria
                WHERE alumno_grupo.idAlumno = ?
                group by grupo.id";
                $resultados=$this->db->query($sql,$bind);
                return $resultados;
    }

    public function agregarAlumnoCalificacion($datos){
        $bind=array( 
                   
                    $datos['idGrupo'],
                    $datos['idAlumno']
        );
        $sql="INSERT INTO calificacion (idGrupo,idAlumno,unidad1,unidad2,unidad3,unidad4,unidad5,unidad6,unidad7) 
            VALUES (?,?,0,0,0,0,0,0,0)";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
    public function borrarAlumnoCalificacion($datos){
        $bind=array($datos['idGrupo'],$datos['idAlumno']);
        $sql="DELETE FROM calificacion WHERE idGrupo=? AND idAlumno = ?;";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>