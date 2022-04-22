<?php
include_once '<Setings/autoload.php';

/* Heredamos la clase conexion */

interface tareas{
    public function showTask();
    public function updateTask(string $clase, string $bootcamp, string $horaInicio, string $horaFinalizacion);
    public function editTask(int $id, string $clase, string $bootcamp, string $horaInicio, string $horaFinalizacion);
    public function deleteTask(int $id);
    public function deleteAllTask();
}
class tasks extends conexion implements tareas{
    /* Defino las propiedades de mi clase, en este caso son el clase,
       la descripcion y la hora de incio */
    private $strclase;
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

/****
    /* Funcion para Guardar datos en la tabla */
    public function updateTask(string $clase, string $bootcamp, string $horaInicio, string $horaFinalizacion){
        $this->strclase = $clase;
        $this->strbootcamp = $bootcamp;
        $this->strhoraInicio = $horaInicio;
        $this->strhoraFinalizacion = $horaFinalizacion;

        $sql = "INSERT INTO tasks(clase, bootcamp, horaInicio, horaFinalizacion) VALUES (?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->strclase, $this->strbootcamp, $this->strhoraInicio, $this->strhoraFinalizacion);
        $resInsert = $insert->execute($arrData);
    }
    
    /* Funcion para validar el Edit del usuario */


    /* Funcion para Editar tareas */
    public function editTask(int $id, string $clase, string $bootcamp, string $horaInicio, string $horaFinalizacion){
        $this->strclase = $clase;
        $this->strdescripcion = $bootcamp;
        $this->strhoraInicio = $horaInicio;
        $this->strhoraFinalizacion= $horaFinalizacion;

        $sql = 'UPDATE tasks SET clase = ?, bootcamp = ?, horaInicio = ?, horaFinalizacion = ? WHERE id = ?';
        $update = $this->conexion->prepare($sql);
        $arrData = array($this->strclase, $this->strdescripcion, $this->strhoraInicio, $this->strhoraFinalizacion,$id);
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