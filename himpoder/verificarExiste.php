<?php
    include_once 'himpoder.php';
    $himnario = new HimPoder();
    header('Access-Control-Allow-Origin: *');


    $data = json_decode(file_get_contents('php://input'));

    
    if ($data === null) {
        $respuesta = [
            'estado' => 'No hay datos',
        ];
    } else {
        $id = intval($data);

        $resultado = $himnario -> existeCancion($id);

        if ($resultado > 0) {
            $respuesta = [
                'estado' => 'No disponible',
                'id' => $id,

            ];
        } else {
            if ($id === 0) {
                $respuesta = [
                    'estado' => 'No disponible',
                    'id' => $id,
                ];
            } else {
                $respuesta = [
                    'estado' => 'Disponible',
                    'id' => $id,
                ];
            }
        }
    }


    $respuestaCodificada = json_encode($respuesta);
    echo $respuestaCodificada
?>