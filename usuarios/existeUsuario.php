<?php
    include_once 'usuario.php';
    $usuario = new Usuario();
    header('Access-control-Allow-Origin: *');

    $data = json_decode(file_get_contents('php://input'));

    if ($data === null) {
        $respuesta = [
            'estado' => 'No hay datos'
        ];
    } else {
        $user = $data -> usuario;
        $pass = $data -> pass;

        $resultado = $usuario -> existeUsuario($user, $pass);

        if ($resultado) {
            $respuesta = [
                'estado' => 'correcto',
                'usuario' => $user,
                'pass' => $pass,
            ];
        } else {
            $respuesta = [
                'estado' => 'incorrecto',
                'usuario' => $user,
                'pass' => $pass,
            ];
        }

    }

    $respuestaCodificada = json_encode($respuesta);
    echo $respuestaCodificada;
?>