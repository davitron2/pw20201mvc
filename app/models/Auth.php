<?php
    class Auth{
        private $db;

        public function __construct(){
            $this->db=new Base;
        }

        public function buscarUsuario($datos){
            //print_r($datos);
            if(!$this->verificar($datos)){
                $bind=array($datos['usuario'], $datos['contrasena']);
                $sql=" SELECT * FROM personal WHERE usuario=? and contrasena=?";
                $renglon=$this->db->queryRenglon($sql,$bind);
                return $renglon;
            } else {
              //TODO para el manejo de errores
            }
        }

        public function verificar($datos){
            return empty($datos['usuario']) || empty($datos['contrasena']);

        }




        public function buscarAlumno($datos){
            //print_r($datos);
            if(!$this->verificarAlumno($datos)){
                $bind=array($datos['noControl'], $datos['NIP']);
                $sql=" SELECT * FROM alumno WHERE noControl=? and NIP=?";
                $renglon=$this->db->queryRenglon($sql,$bind);
                return $renglon;
            } else {
              //TODO para el manejo de errores
            }
        }

        public function verificarAlumno($datos){
            return empty($datos['noControl']) || empty($datos['NIP']);

        }





    }
?>