<?php
    include_once 'cronograma.php';
    $cronograma = new Cronograma();

    header('Access-Control-Allow-Origin: *');

    $resultado = $cronograma -> getMinisterios();
    $listado = array();

    foreach($resultado as $ministerio) {
        array_push($listado, $ministerio);
    }

    echo json_encode($listado);
?>