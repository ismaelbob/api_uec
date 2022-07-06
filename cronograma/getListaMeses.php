<?php
    include_once 'cronograma.php';
    $cronograma = new Cronograma();
    header('Access-Control-Allow-Origin: *');

    $id = $_GET['id'];


    $resultado = $cronograma -> getListaMeses();

    echo json_encode($resultado);
?>