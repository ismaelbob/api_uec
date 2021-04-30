<?php
    include_once 'himpoder.php';
    $himnario = new HimPoder();
    header('Access-Control-Allow-Origin: *');

    $ultimo = $himnario -> ultimaCancion();
    $resultado = $ultimo + 1;

    echo json_encode($resultado);
?>