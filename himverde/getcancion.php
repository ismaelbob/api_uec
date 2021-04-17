<?php
    include_once 'himverde.php';
    $himnario = new HimVerde();
    header('Access-Control-Allow-Origin: *');

    $id = $_GET['id'];


    $resultado = $himnario -> datosCancion($id);

    echo json_encode($resultado);
?>