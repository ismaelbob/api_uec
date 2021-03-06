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
        public function getTurnoSemanaJov ($semana) {
            $con = $this -> conectar() -> prepare ('SELECT * FROM mes JOIN semana_jov ON mes.idmes=semana_jov.idmes JOIN ministerio ON ministerio.idministerio=semana_jov.idgrupo WHERE semana_jov.idsemana_jov=:semana');
            $con -> execute([':semana' => $semana]);
            $datos = $con -> fetch(PDO::FETCH_OBJ);
            $con = null;
            return $datos;
        }
        public function setTurnoSemana ($idsemana, $idmes, $idgrupo, $domingo, $martes, $jueves) {
            $con = $this -> conectar() -> prepare ('UPDATE semana SET idmes=:mes , idgrupo=:grupo , domingo=:dom , martes=:mar , jueves=:jue WHERE idsemana=:sem;');
            $con -> execute([':mes' => $idmes, ':grupo' => $idgrupo, ':dom' => $domingo, ':mar' => $martes, ':jue' => $jueves, ':sem' => $idsemana]);
            $con = null;
            return 'correcto';
        }
        public function setTurnoJovenes ($idsemana_jov, $idmes, $idgrupo, $fecha) {
            $con = $this -> conectar() -> prepare ('UPDATE semana_jov SET idmes=:mes, idgrupo=:grupo, fecha=:fec WHERE idsemana_jov=:id;');
            $con -> execute([':mes' => $idmes, ':grupo' => $idgrupo, ':fec' => $fecha, ':id' => $idsemana_jov]);
            $con = null;
            return 'correcto';
            
        }
        public function getTurnoMensual () {
            return $con = $this -> conectar() -> query ('SELECT * FROM mes JOIN semana ON mes.idmes=semana.idmes JOIN ministerio ON ministerio.idministerio=semana.idgrupo');
        }
        public function getTurnoMensualJovenes () {
            return $con = $this -> conectar() -> query ('SELECT * FROM mes JOIN semana_jov ON mes.idmes=semana_jov.idmes JOIN ministerio ON ministerio.idministerio=semana_jov.idgrupo');
        }

        public function getListaMeses () {
            return $con = $this -> conectar() -> query('SELECT * FROM mes;');
        }
        public function getMes ($id) {
            $con = $this -> conectar() -> prepare('SELECT * FROM mes WHERE idmes=:id');
            $con -> execute([':id' => $id]);
            $datos = $con -> fetch(PDO::FETCH_OBJ);
            $con = null;
            return $datos;
        }
        public function setMes($idmes, $mes) {
            $con = $this -> conectar() -> prepare ('UPDATE mes SET nom_mes=:mes WHERE idmes=:id');
            $con -> execute ([':mes' => $mes, ':id' => $idmes]);
            $con = null;
            return 'correcto';
        }
    }
?>