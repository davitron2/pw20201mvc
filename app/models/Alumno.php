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

    public function agregarAlumno($datos){
        $bind=array( 
                    $datos['nombres'],  
                    $datos['apellidoP'],
                    $datos['apellidoM'],
                    $datos['NIP'],
               
                    $datos['semestre'],
                    $datos['idReticula'],
                   
        );
    $sql="INSERT INTO Alumno  SELECT CONCAT( YEAR(NOW()),COUNT(noControl)+1) , ?,?,?,?,?,?    FROM Alumno";
    $resultado=$this->db->query($sql,$bind);
    return(is_array($resultado))?true:false;
    }

    public function obtenerAlumnoNoControl($noControl){
        $bind=array($noControl);
        $sql="SELECT * FROM Alumno WHERE noControl=?";
        $renglon=$this->db->queryRenglon($sql,$bind);
        return $renglon;
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
}

?>