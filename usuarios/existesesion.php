<?php
    include_once 'sesion.php';
    include_once 'usuario.php';
    $sesion = new Sesion();
    $usuario = new Usuario();

    header('Access-Control-Allow-Origin: *');

    if (isset($_SESSION['user-uec'])) {
        $user = $_SESSION['user-uec'];
        $datos = $usuario -> traerDatosUsuario($user);
        $respuesta = [
            'sesion' => true,
            'usuario' => $_SESSION['user-uec'],
            'nombre' => $datos -> nombre,
            'nivel' => $datos -> nivel,
        ];
    } else {
        $respuesta = [
            'sesion' => false,
        ];
    }

    $respuestaCodificada = json_encode($respuesta);
    echo $respuestaCodificada;
?>