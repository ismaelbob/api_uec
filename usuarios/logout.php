<?php
    include_once 'sesion.php';
    header('Access-Control-Allow-Origin: *');
    $sesion = new Sesion();
    $sesion -> cerrarSesion();
?>