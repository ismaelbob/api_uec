<?php
    include_once '../db/DB.php';

    class HimVerde extends DB {
        public function todoHimnario(){
            return $con = $this -> conectar() -> query('SELECT * FROM him_verde ORDER BY idcancion ASC');
        }
    }
?>