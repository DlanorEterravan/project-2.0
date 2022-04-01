<?php
include_once 'Setings/autoload.php';

if(isset($_POST['delete_all'])){
    $obj= new tasks();
    $obj->deleteAllTask();

    header("location:index.php");
}

?>