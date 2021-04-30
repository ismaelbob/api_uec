<?php
    include_once 'himjovenes.php';
    $himnario = new HimJovenes();
    header('Access-Control-Allow-Origin: *');

    $id = $_GET['id'];


    $resultado = $himnario -> datosCancion($id);

    echo json_encode($resultado);
?>