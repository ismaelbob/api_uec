<?php
    include_once '../db/DB.php';

    class Cronograma extends DB {
        public function getMinisterios () {
            return $con = $this -> conectar() -> query ('SELECT * FROM ministerio');
        }
        public function getTurnoSemana ($semana) {
            $con = $this -> conectar() -> prepare ('SELECT * FROM mes JOIN semana ON mes.idmes=semana.idmes JOIN ministerio ON ministerio.idministerio=semana.idgrupo WHERE semana.idsemana=:semana');
            $con -> execute([':semana' => $semana]);
            $datos = $con -> fetch(PDO::FETCH_OBJ);
            $con = null;
            return $datos;
        }
        public function getTurnoMensual () {
            return $con = $this -> conectar() -> query ('SELECT * FROM mes JOIN semana ON mes.idmes=semana.idmes JOIN ministerio ON ministerio.idministerio=semana.idgrupo');
        }
        public function getTurnoMensualJovenes () {
            return $con = $this -> conectar() -> query ('SELECT * FROM mes JOIN semana_jov ON mes.idmes=semana_jov.idmes JOIN ministerio ON ministerio.idministerio=semana_jov.idgrupo');
        }
    }
?>