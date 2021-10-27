<?php
    include_once 'cronograma.php';
    $cronograma = new Cronograma();

    header('Access-Control-Allow-Origin: *');

    $resultado = $cronograma -> getTurnoSemana(1,1);
    $listado = array();

    foreach($resultado as $ministerio) {
        array_push($listado, $ministerio);
    }

    echo json_encode($listado);
?>