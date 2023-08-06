<?php
//require_once 'Conexion.php';
    class MetodosAdmin{

        // Funcion para obtener datos de la BD Parque Vehicular

        public function obtenerDatos($sql){
            $c = new Conexion();
            $conexion = $c->conectarParque();
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

        public function insertarResguardatario_Region($resguardatario){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO resguardatarios(nombre,paterno,materno,region)
                VALUES('$resguardatario[0]','$resguardatario[1]','$resguardatario[2]','$resguardatario[3]')";
            return $result = mysqli_query($conexion, $insert);
        }   
        
        public function insertarEco_Resguardatario($eco){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO resguardo_ecos(eco,resguardatario)
                VALUES('$eco[0]','$eco[1]')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarProg_Resguardatario($prog){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO resguardo_progresivos(progresivo,resguardatario)
                VALUES('$prog[0]','$prog[1]')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarProveedor($proveedor){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO proveedor(nombre_proveedor) VALUES('$proveedor')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarRegion($region){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO region(descripcion) VALUES('$region')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarTipoUnidad($tipo){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO tipo_unidad(descripcion) VALUES('$tipo')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarMarcaVehiculo($marca){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO marca_vehiculos(descripcion) VALUES('$marca')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarSubmarca($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO submarca(descripcion, id_marca) VALUES('$datos[0]','$datos[1]')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarMarcaUnidad($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO marca_unidades(id_tipo_unidad, id_marca) VALUES('$datos[0]','$datos[1]')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarRegistroVehicular($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO registro_unidades(no_placas, no_factura, fecha_factura, costo, inventario, id_tipo, id_estado, id_proveedor, id_submarca, 
                        modelo, id_eco, serie, onservaciones, motor, sector, cuadrante, imagen, imagen2, imagen3, imagen4, i,agen5, imagen6) 
                        VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]',
                        '$datos[11]','$datos[12]','$datos[13]','$datos[14]','$datos[15]','$datos[16]','$datos[17]','$datos[18]','$datos[19]','$datos[20]','$datos[21]')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarRegistroRegiones($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO registro_regiones VALUES('$datos[0]','$datos[1]')";
            return $result = mysqli_query($conexion, $insert);
        }

        public function insertarInspeccion($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $insert = "INSERT INTO inspecciones(id_eco, id_submarca, id_estado, imagen, imagen2, imagen3, imagen4, imagen5, imagen6, fecha_registro, observaciones) 
                        VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]')";
            return $result = mysqli_query($conexion, $insert);
        }

        //Funciones para modificar datos

        public function updateGasolina($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $update = "UPDATE tipo_gasolina SET precio='$datos[0]' WHERE id_gasolina='$datos[1]'";
            return $result = mysqli_query($conexion, $update);
        }

        public function updateUsuario($datos){
            $c = new Conexion();
            $conexion = $c->conectarParque();
            $update = "UPDATE usuarios SET nombre='$datos[0]', paterno='$datos[1]', materno='$datos[2]', telefono='$datos[3]',
            email='$datos[4]', n_usuario='$datos[5]', u_password='$datos[6]', rol_usuario='$datos[7]' WHERE id_usuario='$datos[8]'";
            return $result = mysqli_query($conexion, $update);
        }

        //Funciones para eliminar datos
    }
?>