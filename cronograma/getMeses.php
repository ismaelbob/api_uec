<?php
    include_once 'cronograma.php';
    $cronograma = new Cronograma();

    header('Access-Control-Allow-Origin: *');

    $resultado = $cronograma -> getListaMeses();
    $listado = array();

    foreach($resultado as $mes) {
        array_push($listado, $mes);
    }

    echo json_encode($listado);
?>