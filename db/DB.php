<?php
    class DB{
        private $servidor;
        private $usuario;
        private $pass;
        private $database;
        private $charset;

        public function __construct(){
            //Para Local
            /*$this->servidor = "localhost";
            $this->usuario = "root";
            $this->pass = "";
            $this->database = "uec";
            $this->charset = "utf8mb4";*/

            // Para Clever Cloud
            $this->servidor = "bqxxgnvj9oydsxmmdxy2-mysql.services.clever-cloud.com";
            $this->usuario = "ukx6ly9c1qwbzo8z";
            $this->pass = "aovP8aCVTwOvaDTwQ4E3";
            $this->database = "bqxxgnvj9oydsxmmdxy2";
            $this->charset = "utf8mb4";
        }

        public function conectar(){
            try{
                $conectador = "mysql:host=" . $this->servidor . ";dbname=" . $this->database . ";charset=" . $this->charset;
                $opciones=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES=>false];
                $pdo=new PDO($conectador, $this->usuario, $this->pass, $opciones);
                return $pdo;
            }catch(PDOException $e){
                print_r("Error en la conexion" . $e->getMessage());
            }
        }
    }
?>