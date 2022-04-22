<?php
include_once 'Setings/autoload.php';

$obj = new validar;
$obj->validar();


header('location: index.php');
?>