<?php
    include_once '../db/DB.php';

    class HimJovenes extends DB {
        public function todoHimnario(){
            return $con = $this -> conectar() -> query('SELECT * FROM him_jovenes ORDER BY idcancion ASC');
        }

        public function datosCancion($id) {
            $con = $this -> conectar() -> prepare("SELECT * FROM him_jovenes WHERE idcancion=:id");
            $con -> execute([':id' => $id]);
            $datos = $con -> fetch(PDO::FETCH_OBJ);
            $con = null;
            return $datos;
        }
        public function nuevaCancion($id, $titulo, $autor, $nota, $letra, $enlace) {
            $con = $this -> conectar() -> prepare('INSERT INTO him_jovenes (idcancion, titulo, autor, nota, letra, enlace) VALUES (:idcancion, :titulo, :autor, :nota, :letra, :enlace);');
            $con -> execute([':idcancion' => $id,':titulo'=> $titulo, ':autor'=> $autor, ':nota'=> $nota, ':letra'=> $letra, ':enlace' => $enlace]);
            $con = null; 
            return true;
        }
        public function editarCancion($id, $titulo, $autor, $nota, $letra, $enlace) {
            $con = $this -> conectar() -> prepare('UPDATE him_jovenes SET titulo=:titulo, autor=:autor, nota=:nota, letra=:letra, enlace=:enlace WHERE idcancion=:id;');
            $con -> execute([':titulo' => $titulo, ':autor' => $autor, ':nota' => $nota, ':letra' => $letra, ':enlace' => $enlace, ':id' => $id]);
            $con = null;
            return 'correcto';
        }
        public function ultimaCancion() {
            $con = $this -> conectar() -> query('SELECT MAX(idcancion) as ultima_fila FROM him_jovenes');
            $dato = $con -> fetch(PDO::FETCH_OBJ) -> ultima_fila;
            $con = null;
            return $dato;
        }
        public function existeCancion($id) {
            $con = $this -> conectar() -> prepare('SELECT idcancion FROM him_jovenes WHERE idcancion=:id');
            $con -> execute([':id' => $id]);
            $count = $con -> rowCount();
            $con = null;
            return $count;
        }
    }
?>