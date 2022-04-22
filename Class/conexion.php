<?php
/* La clase conexion lleva a cabo la conexion de mi base de datos*/
interface connect{
    public function conectar();
}
class conexion implements connect{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "tareas";
    private $connect;
    

    public function __construct(){
        $conectionString = "mysql:hos=". $this->host . ";dbname=". $this->db .";charset=utf8";
        try{
            $this->connect = new PDO($conectionString, $this->user, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch(Exception $e){
            $this->connect = "error de conexion";
            echo "ERROR: ". $e->getMessage();
        }
    }

    public function conectar(){
        return $this->connect;
        
    }
}
?>