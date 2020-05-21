<?php
#Clase para conexion a base de datos
class Base{

    private $motor = DB_MOTOR;
    private $host = DB_HOST;
    private $user = DB_USUARIO;
    private $password = DB_PASSWORD;
    private $database = DB_NOMBRE;

    private $dbh; //database dba_handlers
    private $stmt;
    private $error;

    public function __construct(){
            //$this->dbh=ADONewConnection($this->motor);
            //$this->dbh->PConnect($this->host, $this->user, $this->password, $this->database);

        try{
            //crear capturas
            #negación !
            #conexion con el motor de base de datos

            if(!$this->dbh=ADONewConnection($this->motor)){
                throw new Exception('Error al conectarse a motor (driver)');
            }
            elseif(!$this->dbh->PConnect($this->host, $this->user, $this->password, $this->database)){
                throw new Exception('Error al conectarse a base de datos' . $this->database);
            }
            $this->dbh->SetFetchMode(ADODB_FETCH_ASSOC);
            return $this->dbh; //devuelve la conexion
        }catch(Exception $e){
            echo $e->getMessage();

        };
    }//fin de __construct

    public function query($sql,$bind=[]){
        $sql=$this->dbh->prepare($sql);
        $resultado=$this->dbh->execute($sql, $bind); //or die('Error');
        // echo var_dump($resultado);
        //echo $resultado->recordCount();

        if(!$resultado->recordCount())
            $resultado=[];

        return $resultado;
    }

    public function queryOne($sql,$bind=[]){
        //var_dump($bind);
        $sql=$this->dbh->prepare($sql);
        $resultado=$this->dbh->getOne($sql, $bind);// or die('Error');
        //echo json_encode($resultado);
        //var_dump($resultado);
       // if(!$resultado){
       //     $resultado['msg_error']=true;
        //}
        return $resultado;
    }

    public function queryRenglon($sql,$bind=[]){
        //var_dump($bind);
        $sql=$this->dbh->prepare($sql);
        $resultado=$this->dbh->getRow($sql, $bind); // or die('Error');

        //if(!$renglon->recordCount()){
          //  $renglon['msg_error']="Algo salio mal";
        //}
        //echo var_dump($resultado);
        return $resultado;
    }

}//fin de class
?>