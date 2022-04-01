<?php
include_once 'Setings/autoload.php';

$obj = new tasks;
$obj->validarUpdate();


header('location: index.php');
?>