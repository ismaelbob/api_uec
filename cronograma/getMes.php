<?php
    include_once 'cronograma.php';
    $cronograma = new Cronograma();
    header('Access-Control-Allow-Origin: *');

    $id = $_GET['id'];


    $resultado = $cronograma -> getMes($id);

    echo json_encode($resultado);
?>