<?php
    include_once 'himpoder.php';
    $himnario = new HimPoder();
    header('Access-Control-Allow-Origin: *');

    $id = $_GET['id'];


    $resultado = $himnario -> datosCancion($id);

    echo json_encode($resultado);
?>