<?php
    include_once '../db/DB.php';

    class HimVerde extends DB {
        public function todoHimnario(){
            return $con = $this -> conectar() -> query('SELECT * FROM him_verde ORDER BY idcancion ASC');
        }

        public function datosCancion($id) {
            $con = $this -> conectar() -> prepare("SELECT * FROM him_verde WHERE idcancion=:id");
            $con -> execute(["id" => $id]);
            $datos = $con -> fetch(PDO::FETCH_OBJ);
            $con = null;
            return $datos;
        }
    }
?>