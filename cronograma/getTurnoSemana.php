<?php
    include_once 'cronograma.php';
    $cronograma = new Cronograma();

    header('Access-Control-Allow-Origin: *');
    $data = json_decode(file_get_contents('php://input'));

    if ($data === null) {
        $respuesta = [
            'estado'=> 'no hay datos',
        ];
    } else {
        $idsem = $data -> id;

        $resultado = $cronograma -> getTurnoSemana($idsem);
        
        if ($resultado) {
            $respuesta = [
                'estado' => 'correcto',
                'id' => '7',
            ];
        } else {
            $respuesta = [
                'estado' => 'error',
                'id' => $id,
            ];
        }
    }
?>