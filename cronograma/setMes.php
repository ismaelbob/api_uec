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
        $idmes = $data -> idmes;
        $mes = $data -> nom_mes;
  

        $resultado = $cronograma -> setMes($idmes, $mes);
        
        if ($resultado === 'correcto') {
            $respuesta = [
                'estado' => 'correcto',
                'id' => $idmes,
            ];
        } else {
            $respuesta = [
                'estado' => 'error',
                'id' => $mes,
            ];
        }
    }

    $respuestaCodificada = json_encode($respuesta);
    echo $respuestaCodificada;
?>