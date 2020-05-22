<?php 

class Alumno{
    private $db;

    public function __construct(){
        $this->db=new Base;
    }

    public function obtenerAlumnos(){
        $resultados=$this->db->query("SELECT * FROM Alumno");
        return $resultados;
    }

    public function agregarAlumno($datos){
        $bind=array( 
                    $datos['nombres'],  
                    $datos['apellidoP'],
                    $datos['apellidoM'],
                    $datos['NIP'],
                   
        );
    $sql="INSERT INTO Alumno  SELECT CONCAT( YEAR(NOW()),COUNT(noControl)+1) , ?,?,?,?    FROM Alumno";
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
                
                    $datos['noControl']
        );
        $sql="UPDATE  Alumno SET nombres=?, apellidoP=?, apellidoM=?, NIP=?  where noControl=?";
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