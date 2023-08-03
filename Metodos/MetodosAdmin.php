<?php
//require_once 'Conexion.php';
    class MetodosAdmin{

        public function obtenerRolesUsuario($sql){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $result = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        public function insertarUsuario($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO usuarios(nombre,paterno,materno,telefono,email,n_usuario,u_password,rol_usuario)
                VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";
            return $result = mysqli_query($conexion, $insert);
        }

        
    }
?>