<?php
    include_once 'himverde.php';
    $himnario = new HimVerde();

    header('Access-Control-Allow-Origin: *');

    $resultado = $himnario -> todoHimnario();
    $listado = array();

    foreach($resultado as $cancion) {
        array_push($listado, $cancion);
    }

    echo json_encode($listado);
?>