<?php
    include_once '../db/DB.php';

    class Cronograma extends DB {
        public function getMinisterios () {
            return $con = $this -> conectar() -> query ('SELECT * FROM ministerio');
        }
        public function getTurnoSemana ($mes, $semana) {
            $con = $this -> conectar() -> prepare ('SELECT * FROM mes JOIN semana ON mes.idmes=semana.idmes JOIN ministerio ON ministerio.idministerio=semana.idgrupo WHERE mes.idmes=:mes AND semana.idsemana=:semana');
            $con -> execute([':mes' => $mes, ':semana' => $semana]);
            $datos = $con -> fetch(PDO::FETCH_OBJ);
            $con = null;
            return $datos;
        }
        public function getTurnoMensual () {
            return $con = $this -> conectar() -> query ('SELECT * FROM mes JOIN semana ON mes.idmes=semana.idmes JOIN ministerio ON ministerio.idministerio=semana.idgrupo');
        }
    }
?>