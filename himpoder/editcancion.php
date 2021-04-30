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
        $id = $data -> idcancion;
        $titulo = $data -> titulo;
        $autor = $data -> autor;
        $nota = $data -> nota;
        $letra = $data -> letra;
        $enlace = $data -> enlace;

        $resultado = $himnario -> editarCancion($id, $titulo, $autor, $nota, $letra, $enlace);

        if ($resultado === 'correcto') {
            $respuesta = [
                'estado' => $resultado,
                'idcancion' => $id,
                'titulo' => $titulo,
            ];
        } else {
            $respuesta = [
                'estado' => 'error',
            ];
        }
    }


    $respuestaCodificada = json_encode($respuesta);
    echo $respuestaCodificada
?>