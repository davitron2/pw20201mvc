<?php 

class Aula{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerAulas(){
        $resultados=$this->db->query("SELECT * FROM aula");
        return $resultados;
    }

    public function    buscarAula($datos){
        $bind=array($datos['buscado']);
        if ($datos['opcion'] == 1) {

            $resultados=$this->db->query("SELECT * FROM aula  where id=? ",$bind);

        }

         elseif ($datos['opcion'] == 2) {
            $resultados=$this->db->query("SELECT * FROM aula where nombre=?",$bind);
        } 
        

        return $resultados;
    }

    public function validarNombreAula($datos){
        $bind=array( 
            $datos['nombre']
       );
        $sql = "SELECT COUNT(*) FROM aula
            WHERE   nombre=?              ";
        $resultado=$this->db->queryOne($sql,$bind);
        return $resultado;
    }

    public function obtenerAulasLike($like){
        $bind = array($like);
        $sql = "SELECT * FROM aula WHERE nombre LIKE CONCAT('%',?,'%')";
        $resultados=$this->db->query($sql,$bind);
        return $resultados;
    }

    public function obtenerHorarioAulas(){
        $sql = "SELECT a.id,
                    a.nombre as 'aula',
                    g.grupo as 'grupo',
                    concat(p.nombre,' ',p.apellidoP,' ',p.apellidoM) as 'profesor',
                    m.nombre as 'materia',
                    IFNULL((select concat(DATE_FORMAT(h1.horaInicio, '%H:%i'),'-',DATE_FORMAT(h1.horaFin, '%H:%i'))
                                    from horario h1 where h1.idGrupo=g.id and h1.diaSemana =1),'-') as 'lunes',
                    IFNULL((select concat(DATE_FORMAT(h1.horaInicio, '%H:%i'),'-',DATE_FORMAT(h1.horaFin, '%H:%i'))
                                    from horario h1 where h1.idGrupo=g.id and h1.diaSemana =2),'-') as 'martes',
                    IFNULL((select concat(DATE_FORMAT(h1.horaInicio, '%H:%i'),'-',DATE_FORMAT(h1.horaFin, '%H:%i'))
                                    from horario h1 where h1.idGrupo=g.id and h1.diaSemana =3),'-') as 'miercoles',
                    IFNULL((select concat(DATE_FORMAT(h1.horaInicio, '%H:%i'),'-',DATE_FORMAT(h1.horaFin, '%H:%i'))
                                    from horario h1 where h1.idGrupo=g.id and h1.diaSemana =4),'-') as 'jueves',
                    IFNULL((select concat(DATE_FORMAT(h1.horaInicio, '%H:%i'),'-',DATE_FORMAT(h1.horaFin, '%H:%i'))
                                    from horario h1 where h1.idGrupo=g.id and h1.diaSemana =5),'-') as 'viernes',
                    IFNULL((select concat(DATE_FORMAT(h1.horaInicio, '%H:%i'),'-',DATE_FORMAT(h1.horaFin, '%H:%i'))
                                    from horario h1 where h1.idGrupo=g.id and h1.diaSemana =6),'-') as 'sabado'                 
                from aula a 
                inner join horario h on h.idAula = a.id
                inner join grupo g on g.id = h.idGrupo 
                inner join personal p on p.id = g.idProfesor
                inner join materia m on m.id = g.idMateria 
                group by g.id
                order by a.id,h.horaInicio";
        $resultados=$this->db->query($sql);
        return $resultados;
    }
    
    public function agregarAula($datos){
        $bind=array( 
                    $datos['nombre']
        );
        $sql="INSERT INTO aula (nombre) values (?)";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function obtenerAulaId($id){
        $bind=array($id);
        $sql="SELECT * FROM aula WHERE id=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }
    public function actualizarAula($datos){
        $bind=array( $datos['nombre'],
                    $datos['id']
        );
        $sql="UPDATE  aula SET nombre=? where id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarAula($id){
        $bind=array($id);
        $sql="DELETE FROM aula WHERE id=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }
}

?>