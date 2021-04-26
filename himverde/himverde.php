<?php
    include_once '../db/DB.php';

    class HimVerde extends DB {
        public function todoHimnario(){
            return $con = $this -> conectar() -> query('SELECT * FROM him_verde ORDER BY idcancion ASC');
        }

        public function datosCancion($id) {
            $con = $this -> conectar() -> prepare("SELECT * FROM him_verde WHERE idcancion=:id");
            $con -> execute([':id' => $id]);
            $datos = $con -> fetch(PDO::FETCH_OBJ);
            $con = null;
            return $datos;
        }
        public function editarCancion($id, $titulo, $autor, $nota, $letra, $enlace) {
            $con = $this -> conectar() -> prepare('UPDATE him_verde SET titulo=:titulo, autor=:autor, nota=:nota, letra=:letra, enlace=:enlace WHERE idcancion=:id;');
            $con -> execute([':titulo' => $titulo, ':autor' => $autor, ':nota' => $nota, ':letra' => $letra, ':enlace' => $enlace, ':id' => $id]);
            $con = null;
            return 'correcto';
        }
        public function ultimaCancion() {
            $con = $this -> conectar() -> query('SELECT MAX(idcancion) as ultima_fila FROM him_verde');
            $dato = $con -> fetch(PDO::FETCH_OBJ) -> ultima_fila;
            $con = null;
            return $dato;
        }
        public function existeCancion($id) {
            $con = $this -> conectar() -> prepare('SELECT idcancion FROM him_verde WHERE idcancion=:id');
            $con -> execute([':id' => $id]);
            $count = $con -> rowCount();
            return $count;
        }
    }
?>