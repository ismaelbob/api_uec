<?php
    include_once 'cronograma.php';
    $cronograma = new Cronograma();
    header('Access-Control-Allow-Origin: *');

    $id = $_GET['id'];


    $resultado = $cronograma -> getTurnoSemana($id);

    echo json_encode($resultado);
?>