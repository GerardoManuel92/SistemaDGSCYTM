<?php
    class Conexion{
        private $servidor = "localhost:3307";
        private $usuario = "root";
        private $bd1 = "parque_vehicular";
        private $bd2 = "cascos";
        private $bd3 = "chalecos";
        private $bd4 = "equipo_policial";
        private $password = "p4tr1c10";

        public function conectarParque(){
            $conexion = mysqli_connect($this->servidor,
                                        $this->usuario,
                                        $this->password,
                                        $this->bd1);
            return $conexion;
        }

        public function conectarCascos(){
            $conexion = mysqli_connect($this->servidor,
                                        $this->usuario,
                                        $this->password,
                                        $this->bd2);
            return $conexion;
        }

        public function conectarChalecos(){
            $conexion = mysqli_connect($this->servidor,
                                        $this->usuario,
                                        $this->password,
                                        $this->bd3);
            return $conexion;
        }

        public function conectarEquipo(){
            $conexion = mysqli_connect($this->servidor,
                                        $this->usuario,
                                        $this->password,
                                        $this->bd4);
            return $conexion;
        }
    }   
?>