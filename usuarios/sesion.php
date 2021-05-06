<?php
    class Sesion {
        public function __construct() {
            session_start();
        }
        public function setSesion($user) {
            $_SESSION['user-uec'] = $user;
        }
        public function getSesion() {
            return $_SESSION['user-uec'];
        }
        public function cerrarSesion() {
            session_unset();
            session_destroy();
        }
    }
?>