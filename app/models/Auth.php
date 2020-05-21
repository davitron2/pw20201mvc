<?php
    class Auth{
        private $db;

        public function __construct(){
            $this->db=new Base;
        }

        public function buscarUsuario($datos){
            //print_r($datos);
            if(!$this->verificar($datos)){
                $bind=array($datos['correo'], $datos['password']);
                $sql=" SELECT * FROM usuarios WHERE correo=? and password=?";
                $renglon=$this->db->queryRenglon($sql,$bind);
                return $renglon;
            } else {
              //TODO para el manejo de errores
            }
        }

        public function verificar($datos){
            return empty($datos['correo']) || empty($datos['password']);

        }
    }
?>