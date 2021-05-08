<?php
    include 'sesion.php';
    include 'usuario.php';
    $sesion = new Sesion();
    $usuario = new Usuario();

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
            $sesion -> setSesion($user);
            $respuesta = [
                'estado' => 'correcto',
                'usuario' => $user,
                'pass' => $pass,
                'nombre' => $resultado -> nombre,
                'nivel' => $resultado -> nivel,
            ];
        }

    }

    $respuestaCodificada = json_encode($respuesta);
    echo $respuestaCodificada;
?>