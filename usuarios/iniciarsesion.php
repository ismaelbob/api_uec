<?php
    include_once 'usuario.php';
    include_once 'sesion.php';
    $usuario = new Usuario();
    $sesion = new Sesion();

    header('Access-Control-Allow-Origin: *');

    $data = json_decode(file_get_contents('php://input'));

    if ($data === null) {
        $respuesta = [
            'estado' => 'Ho nay datos'
        ];
    } else {
        $user = $data -> usuario;
        $pass = $data -> pass;

        $resultado = $usuario -> existeUsuario($user, $pass);

        if (!$resultado) {
            $respuesta = [
                'estado' => 'incorrecto',
                'usuario' => $user,
                'pass' => $pass,
            ];
        } else {
            $respuesta = [
                'estado' => 'correcto',
                'usuario' => $user,
                'pass' => $pass,
                'nombre' => $resultado -> nombre,
                'nivel' => $resultado -> nivel,
            ];
            $sesion -> setSesion($user);
        }

    }

    $respuestaCodificada = json_encode($respuesta);
    echo $respuestaCodificada;
?>