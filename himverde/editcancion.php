<?php
    include_once 'himverde.php';
    $himnario = new HimVerde();
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
                'estado' => 'error interno',
            ];
        }
    }


    $respuestaCodificada = json_encode($respuesta);
    echo $respuestaCodificada
?>