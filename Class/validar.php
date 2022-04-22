<?php
interface validacion{
    public function validar();
    public function validarHorario($inputA, $inputB, $inputBootcamp);
} 
class validar extends conexion{
    private $conexion;

        /* Constructor para inicio de conexion*/
    public function __construct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->conectar();
    }
    

public function validar(){

    $disponible = $this->validarHorario($_POST['time1'], $_POST['time2'], $_POST['bootcamp']);


    if(isset($_POST['guardar_datos'])&& $disponible ){
        $obj = new tasks();
        $clase = $_POST['clase'];
        $bootcamp = $_POST['bootcamp'];
        $horaInicio = $_POST['time1'];
        $horaFinalizacion = $_POST['time2'];
        $obj->updateTask($clase, $bootcamp, $horaInicio, $horaFinalizacion);
     
    }
    if(isset($_POST['editar_datos'])&& $disponible){
        $obj = new tasks();
        $id = $_GET['id'];
        $clase = $_POST['clase'];
        $bootcamp = $_POST['bootcamp'];
        $horaInicio = $_POST['time1'];
        $horaFinalizacion = $_POST['time2'];
        $obj->editTask($id, $clase, $bootcamp, $horaInicio, $horaFinalizacion);
    
}
}

public function validarHorario($inputA, $inputB, $inputBootcamp){
    $objeto = new tasks;
    $clases = $objeto->showTask();

    
    /*$inputA  = "02:30:00" ;//hora inicio mediante $_POST
    $inputB = "05:00:00" ;//hora final mediante $_POST
    $inputBootcamp = "fsj1";//bootcamp mediante $_POST*/
    $grupo_disponible = true;

    foreach($clases as $clase){
  
        $setA = $clase['horaInicio'];
        $setB = $clase['horaFinalizacion'];
        $setBootcamp= $clase['bootcamp']; 

        if(($inputA < $setA) && ($inputB>$setA && $inputB<=$setB) && $setBootcamp == $inputBootcamp){

                $grupo_disponible = false;
                break;// horario reservado en el input final
         }elseif(($setA < $inputA && $inputA<$setB)&& $setB < $inputB  && $setBootcamp == $inputBootcamp){

                $grupo_disponible = false;
                break;//horario reservado en el input inicial
         }elseif($setA<=$inputA && $inputB<=$setB  && $setBootcamp == $inputBootcamp){

                $grupo_disponible = false;
                break;//horario reservado antes y despues del input
        }elseif($inputA<$setA && $setB<$inputB  && $setBootcamp == $inputBootcamp){

                $grupo_disponible = false;
                break;// horario reservado en medio de input
        }

    }

    return $grupo_disponible;
}

    
    
}

?>