<?php
    include_once '../db/DB.php';

    class Cronograma extends DB {
        public function getMinisterios () {
            return $con = $this -> conectar() -> query ('SELECT * FROM ministerio');
        }
        public function getTurnoSemana ($mes, $semana) {
            return $con = $this -> conectar() -> query ('SELECT * FROM mes JOIN semana ON mes.idmes=semana.idmes JOIN ministerio ON ministerio.idministerio=semana.idgrupo WHERE mes.idmes=$mes AND semana.idsemana=$semana');
        }
        public function getTurnoMensual () {
            return $con = $this -> conectar() -> query ('SELECT * FROM mes JOIN semana ON mes.idmes=semana.idmes JOIN ministerio ON ministerio.idministerio=semana.idgrupo');
        }
    }
?>