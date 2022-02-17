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
        $idsemana = $data -> idsemana;
        $idmes = $data -> idmes;
        $idgrupo = $data -> idgrupo;
        $fecha = $data -> fecha;

        $resultado = $cronograma -> setTurnoJovenes($idsemana, $idmes, $idgrupo, $fecha);
        
        if ($resultado === 'correcto') {
            $respuesta = [
                'estado' => 'correcto',
                'id' => $idsemana,
            ];
        } else {
            $respuesta = [
                'estado' => 'error',
                'id' => $idsemana,
            ];
        }
    }

    $respuestaCodificada = json_encode($respuesta);
    echo $respuestaCodificada;
?>