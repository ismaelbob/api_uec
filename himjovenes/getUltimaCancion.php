<?php
    include_once 'himjovenes.php';
    $himnario = new HimJovenes();
    header('Access-Control-Allow-Origin: *');

    $ultimo = $himnario -> ultimaCancion();
    $resultado = $ultimo + 1;

    echo json_encode($resultado);
?>