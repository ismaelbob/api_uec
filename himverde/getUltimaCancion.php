<?php
    include_once 'himverde.php';
    $himnario = new HimVerde();
    header('Access-Control-Allow-Origin: *');

    $ultimo = $himnario -> ultimaCancion();
    $resultado = $ultimo + 1;

    echo json_encode($resultado);
?>