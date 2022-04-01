<?php
include_once 'Setings/autoload.php';
 if(isset($_GET['id'])){
    $id = $_GET['id'];
 }
$obj= new tasks();
$obj->deleteTask($id);

header("Location:index.php");

?>