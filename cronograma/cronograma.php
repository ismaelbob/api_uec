<?php
    include '../db/DB.php';

    class Cronograma extends DB {
        public function getMinisterios () {
            return $con = $this -> conectar() -> query ('SELECT * FROM ministerio');
        }
    }
?>