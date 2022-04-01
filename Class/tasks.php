<?php
include_once '<Setings/autoload.php';

/* Heredamos la clase conexion */
class tasks extends conexion{
    /* Defino las propiedades de mi clase, en este caso son el titulo,
       la descripcion y la hora de incio */
    private $strtitulo;
    private $strdescripcion;
    private $strhoraInicio;
    private $conexion;

    /* Constructor para inicio de conexion*/
    public function __construct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->conectar();
    }

    /* Funcion para mostrar las tareas */
    public function showTask(){
        $sql = "SELECT * FROM tasks";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    /* Funcion para validar las variables que se almacenaran en la tabla */
    public function validarUpdate(){
        if(isset($_POST['guardar_datos'])){
            $obj = new tasks();
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['description'];
            $horaInicio = $_POST['time'];
            $obj->updateTask($titulo, $descripcion, $horaInicio);
        
        }
    }

    /* Funcion para Guardar datos en la tabla */
    public function updateTask(string $titulo, string $descripcion, string $horaInicio){
        $this->strtitulo = $titulo;
        $this->strdescripcion = $descripcion;
        $this->strhoraInicio = $horaInicio;

        $sql = "INSERT INTO tasks(titulo, descripcion, horaInicio) VALUES (?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->strtitulo, $this->strdescripcion, $this->strhoraInicio);
        $resInsert = $insert->execute($arrData);
    }
    
    /* Funcion para validar el Edit del usuario */
    public function validarEdit(){          
        if(isset($_POST['editar_datos'])){
            $obj = new tasks();
            $id = $_GET['id'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $horaInicio = $_POST['time'];
            $obj->editTask($id, $titulo, $descripcion, $horaInicio);
        
        }
    }

    /* Funcion para Editar tareas */
    public function editTask(int $id, string $titulo, string $descripcion, string $horaInicio){
        $this->strtitulo = $titulo;
        $this->strdescripcion = $descripcion;
        $this->strhoraInicio = $horaInicio;

        $sql = 'UPDATE tasks SET titulo = ?, descripcion = ?, horaInicio = ? WHERE id = ?';
        $update = $this->conexion->prepare($sql);
        $arrData = array($this->strtitulo, $this->strdescripcion, $this->strhoraInicio, $id);
        $resInsert = $update->execute($arrData);
        return $resInsert;

    }

    /* Funcion para Borrar tareas */
    public function deleteTask(int $id){
        $consulta = 'DELETE FROM tasks WHERE id=?';
        $delete = $this->conexion->prepare($consulta);
        $data = array($id);
        $resDelete = $delete->execute($data);
        return $resDelete;

    }

    /* Funcion para BORRAR TODAS las tareas */
    public function deleteAllTask(){
            $consulta = "DELETE FROM tasks";
            $deleteAll = $this->conexion->prepare($consulta);
            $resDelete = $deleteAll->execute();
            return $resDelete;
        
    }
}
?>