<?php 

class Alumno{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerAlumnos(){
        $resultados=$this->db->query("SELECT noControl,nombres,apellidoP,apellidoM,semestre,idReticula,carrera.nombre 
        from alumno,reticula,carrera
        WHERE idReticula= reticula.id AND reticula.idCarrera=carrera.id");
        return $resultados;
    }

    public function    buscarAlumno($datos){
        $bind=array($datos['buscado']);

        if ($datos['opcion'] == 1) {

            $resultados=$this->db->query("SELECT noControl,nombres,apellidoP,apellidoM,semestre,idReticula,carrera.nombre 
            from alumno,reticula,carrera
            WHERE idReticula= reticula.id AND reticula.idCarrera=carrera.id and alumno.noControl=?",$bind);

        }

         elseif ($datos['opcion'] == 2) {
            $resultados=$this->db->query("SELECT noControl,nombres,apellidoP,apellidoM,semestre,idReticula,carrera.nombre 
            from alumno,reticula,carrera
            WHERE idReticula= reticula.id AND reticula.idCarrera=carrera.id and alumno.nombres=?",$bind);
        } 
        
        elseif ($datos['opcion'] == 3) {
            $resultados=$this->db->query("SELECT noControl,nombres,apellidoP,apellidoM,semestre,idReticula,carrera.nombre 
            from alumno,reticula,carrera
            WHERE idReticula= reticula.id AND reticula.idCarrera=carrera.id and alumno.apellidoP=?",$bind);
        }
        elseif ($datos['opcion'] == 4) {
            $resultados=$this->db->query("SELECT noControl,nombres,apellidoP,apellidoM,semestre,idReticula,carrera.nombre 
            from alumno,reticula,carrera
            WHERE idReticula= reticula.id AND reticula.idCarrera=carrera.id and alumno.apellidoM=?",$bind);
        }
        elseif ($datos['opcion'] == 5) {
            $resultados=$this->db->query("SELECT noControl,nombres,apellidoP,apellidoM,semestre,idReticula,carrera.nombre 
            from alumno,reticula,carrera
            WHERE idReticula= reticula.id AND reticula.idCarrera=carrera.id and alumno.semestre=?",$bind);
        }
        elseif ($datos['opcion'] == 6) {
            $resultados=$this->db->query("SELECT noControl,nombres,apellidoP,apellidoM,semestre,idReticula,carrera.nombre 
            from alumno,reticula,carrera
            WHERE idReticula= reticula.id AND reticula.idCarrera=carrera.id and carrera.nombre=?",$bind);
        }
        elseif ($datos['opcion'] == 7) {
            $resultados=$this->db->query("SELECT noControl,nombres,apellidoP,apellidoM,semestre,idReticula,carrera.nombre 
            from alumno,reticula,carrera
            WHERE idReticula= reticula.id AND reticula.idCarrera=carrera.id and alumno.idReticula=?",$bind);
        }

       
        return $resultados;
    }


    public function agregarAlumno($datos){
        $bind=array( 
                    $datos['nombres'],  
                    $datos['apellidoP'],
                    $datos['apellidoM'],
                    $datos['NIP'],
               
                    $datos['semestre'],
                    $datos['idReticula'],
                   
        );
    $sql="INSERT INTO Alumno (`noControl`,`nombres`,`apellidoP`,`apellidoM`,`NIP`,`semestre`,`idReticula`)
    VALUES ('',?,?,?,?,?,?)";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }





    public function obtenerAlumnoNoControl($noControl){
        $bind=array($noControl);
        $sql="SELECT * FROM Alumno WHERE noControl=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }


    public function obtenerUltimoAlumno($datos){
        $bind=array($datos['noControl']);
        $sql="SELECT * FROM Alumno WHERE noControl=? and id = (select  max(id) from alumno)    ";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
    }

    public function actualizarNoControl($datos){
        $bind=array( $datos['id']
                   
        );
        $sql="UPDATE alumno SET noControl= CONCAT(  (SELECT DATE_FORMAT(now(), '%y')), id  )  WHERE ID =?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }




    public function actualizarAlumno($datos){
        $bind=array( $datos['nombres'],
                    $datos['apellidoP'],  
                    $datos['apellidoM'],
                    $datos['NIP'],
                    $datos['semestre'],
                    $datos['idReticula'],
                
                    $datos['noControl']
        );
        $sql="UPDATE  Alumno SET nombres=?, apellidoP=?, apellidoM=?, NIP=?,semestre=?,idReticula=?  where noControl=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function borrarAlumno($noControl){
        $bind=array($noControl);
        $sql="DELETE FROM Alumno WHERE noControl=?";
        $resultado=$this->db->query($sql,$bind);
        return(is_array($resultado))?true:false;
    }

    public function obtenerAlumnosPorGrupo($idGrupo) {
        $bind=array($idGrupo, $_SESSION['usuario']['id']);
        $sql="SELECT c.id, a.noControl, CONCAT(a.apellidoP, ' ', a.apellidoM, ' ', a.nombres) As Alumno, IF(c.unidad1 <> 0, c.unidad1, 0) As unidad1, IF(c.unidad2 <> 0, c.unidad2, 0) As unidad2, IF(c.unidad3 <> 0, c.unidad3, 0) As unidad3, IF(c.unidad4 <> 0, c.unidad4, 0) As unidad4, IF(c.unidad5 <> 0, c.unidad5, 0) As unidad5, IF(c.unidad6 <> 0, c.unidad6, 0) As unidad6, IF(c.unidad7 <> 0, c.unidad7, 0) As unidad7 FROM alumno_grupo ag JOIN alumno a ON ag.idAlumno = a.noControl JOIN grupo g ON ag.idGrupo = g.id LEFT JOIN calificacion c ON c.idAlumno = a.noControl WHERE g.id = ? aND g.idProfesor = ? ORDER BY a.apellidoP, a.apellidoM, a.nombres";
        $resultado=$this->db->query($sql, $bind);
        return $resultado;
    }
    
    public function obtenerCalificacionesAlumno($idAlumno) {
        $bind=array($idAlumno);
        $sql="SELECT c.id, a.noControl, 
                CONCAT(a.apellidoP, ' ', a.apellidoM, ' ', a.nombres) As Alumno, 
                IF(c.unidad1 <> 0, c.unidad1, 0) As unidad1,
                IF(c.unidad2 <> 0, c.unidad2, 0) As unidad2, 
                IF(c.unidad3 <> 0, c.unidad3, 0) As unidad3, 
                IF(c.unidad4 <> 0, c.unidad4, 0) As unidad4, 
                IF(c.unidad5 <> 0, c.unidad5, 0) As unidad5, 
                IF(c.unidad6 <> 0, c.unidad6, 0) As unidad6, 
                IF(c.unidad7 <> 0, c.unidad7, 0) As unidad7, 
                m.unidades 
                FROM alumno_grupo ag 
                JOIN alumno a ON ag.idAlumno = a.noControl 
                JOIN grupo g ON ag.idGrupo = g.id 
                JOIN materia m ON m.id = g.idMateria 
                LEFT JOIN calificacion c ON c.idAlumno = a.noControl 
                WHERE c.id = ?";
        $resultado=$this->db->queryRenglon($sql, $bind);
        return $resultado;
    }

    public function obtenerCalificacionesMateriasAlumno($id) {
        $bind=array($id);
        $sql="SELECT m.nombre As Materia, g.grupo As Grupo, c.unidad1, c.unidad2, c.unidad3, c.unidad4, c.unidad5, c.unidad6, c.unidad7 FROM calificacion c JOIN alumno a ON c.idAlumno = a.noControl JOIN grupo g ON c.idGrupo = g.id JOIN materia m ON g.idMateria = m.id WHERE a.noControl = ?";
        $resultado=$this->db->query($sql, $bind);
        return $resultado;
    }

    public function calificarAlumno($datos){
        $bind=array(
            $datos['unidad1'],
            $datos['unidad2'],
            $datos['unidad3'],
            $datos['unidad4'],
            $datos['unidad5'],
            $datos['unidad6'],
            $datos['unidad7'],
            $datos['id']
        );
        $sql="UPDATE calificacion SET unidad1=?, unidad2=?, unidad3=?, unidad4=?, unidad5=?, unidad6=?, unidad7=? WHERE id=?";
        $resultado=$this->db->query($sql, $bind);
        return(is_array($resultado) ? true : false);
    }

    public function obtenerHorario(){
        $resultados=$this->db->query("SELECT noControl,nombres,apellidoP,apellidoM,semestre,idReticula,carrera.nombre 
        from alumno,reticula,carrera
        WHERE idReticula= reticula.id AND reticula.idCarrera=carrera.id");
        return $resultados;
    }

    public function obtenerCarrera($id){
        $bind = array($id);
        $sql = "select c.nombre 
                from alumno a
                inner join reticula r on a.idReticula = r.id 
                inner join carrera c on c.id = r.idCarrera
                where a.noControl = ?";
        $resultado=$this->db->queryRenglon($sql, $bind);
        return $resultado;
    }
}

?>