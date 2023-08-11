<?php
//require_once 'Conexion.php';
    class MetodosAdmin{

        // Funcion para obtener datos de la BD Equipo Policial

        public function obtenerDatosEP($sql){
            $c = new Conexion();
            $conexion = $c->conectarEquipo();
            $result = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } 
        
        // Funcion para obtener datos de la BD Chalecos

        public function obtenerDatosChalecos($sql){
            $c = new Conexion();
            $conexion = $c->conectarChalecos();
            $result = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        // Funcion para obtener datos de la BD Equipo Policial

        public function obtenerDatosCascos($sql){
            $c = new Conexion();
            $conexion = $c->conectarCascos();
            $result = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        // Funciones para insertar datos

        public function insertarUsuario($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO usuarios(nombre,paterno,materno,telefono,email,n_usuario,u_password,rol_usuario)
                VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";
            return $result = mysqli_query($conexion, $insert);
        }

        

        //Funciones para modificar datos

        public function updateGasolina($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $update = "UPDATE tipo_gasolina SET precio='$datos[0]' WHERE id_gasolina='$datos[1]'";
            return $result = mysqli_query($conexion, $update);
        }

        

        //Funciones para eliminar datos
    }
?>