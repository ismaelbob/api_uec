<?php
    include_once '../db/DB.php';
    class Usuario extends DB {
        public function existeUsuario($nom, $pas){
            $pasMD5 = md5($pas);
            $con = $this -> conectar() -> prepare("SELECT * FROM usuario WHERE usuario= BINARY :us AND pass=:pa");
            $con -> execute(["us"=>$nom, "pa"=>$pasMD5]);
            $dato = $con -> fetch(PDO::FETCH_OBJ);
            $con = null;
            return $dato;
        }

        public function traerDatosUsuario($user) {
            $con = $this -> conectar() -> prepare("SELECT * FROM usuario WHERE usuario= BINARY :us");
            $con -> execute(["us" => $user]);
            $dato = $con -> fetch(PDO::FETCH_OBJ);
            $con = null;
            return $dato;
        }
    }
?>