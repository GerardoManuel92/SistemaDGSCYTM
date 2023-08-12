<?php
//require_once 'Conexion.php';


class MetodosAdmin
{

    // Funcion para obtener datos de la BD Equipo Policial

    public function obtenerDatosEP($sql)
    {
        $c = new Conexion();
        $conexion = $c->conectarEquipo();
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Funcion para obtener datos de la BD Chalecos

    public function obtenerDatosChalecos($sql)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Funcion para obtener datos de la BD Equipo Policial

    public function obtenerDatosCascos($sql)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Funciones para insertar datos

    public function insertRegistroGeneralChaleco($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO concentrado_general(model_chaleco,s_chaleco,mod_placa_delantera,s_placa_delantera,mod_placa_trasera,s_placa_trasera,elemento,region, talla, genero, cargo)
                VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertRegistroGeneralCasco($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $insert = "INSERT INTO control_casco(id_marca,id_serie,id_modelo,id_color,id_material,id_mueble,numero_inventario,fecha_fabricacion,estado_uso,observacion)
                VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertCargo($grado)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO grado(descripcion) VALUES('$grado')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertModeloChaleco($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO modelo_chaleco(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertModeloPlDel($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO modelo_placa_delantera(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertModeloPlTr($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO modelo_placa_trasera(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertNumEco($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO numero_eco VALUES('$descripcion', '$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertNumEmpleado($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO numero_empleado(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertRegion($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO regiones(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertSerieChaleco($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO serie_chaleco VALUES('$descripcion','$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertSeriePlDel($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO serie_placa_delantera VALUES('$descripcion','$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertSeriePlTr($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $insert = "INSERT INTO serie_placa_trasera VALUES('$descripcion','$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertCasco($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $insert = "INSERT INTO casco(id_marca, id_serie, id_modelo, id_talla, imagen) VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertColorCasco($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $insert = "INSERT INTO color(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertMarcaCasco($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $insert = "INSERT INTO marca(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertMaterialCasco($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $insert = "INSERT INTO material(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertModeloCasco($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $insert = "INSERT INTO modelo(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertMueble($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $insert = "INSERT INTO nombre_mueble(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertSerieCasco($descripcion)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $insert = "INSERT INTO serie(descripcion) VALUES('$descripcion')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertElemento($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectarCascos();
        $insert = "INSERT INTO empleado(paterno, materno, nombre, id_numero_de_empleado, estatus) VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')";
        return $result = mysqli_query($conexion, $insert);
    }

    public function insertarUsuario($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectarEquipo();
        $insert = "INSERT INTO usuarios(nombre,paterno,materno,email,telefono,username,password,rol_id)
                VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";
        return $result = mysqli_query($conexion, $insert);
    }

    //Funciones para modificar datos

    public function updateUsuario($datos){
        $c = new Conexion();
        $conexion = $c->conectarEquipo();
        $update = "UPDATE usuarios SET nombre='$datos[0]', paterno='$datos[1]', materno='$datos[2]', email='$datos[3]',
        telefono='$datos[4]', username='$datos[5]', password='$datos[6]', rol_id='$datos[7]' WHERE id='$datos[8]'";
        return $result = mysqli_query($conexion, $update);
    }

    public function updateElemento($datos){
        $c = new Conexion();
        $conexion = $c->conectarChalecos();
        $update = "UPDATE empleado SET paterno='$datos[0]', materno='$datos[1]', nombre='$datos[2]', estatus='$datos[3]' WHERE id_empleado='$datos[4]'";
        return $result = mysqli_query($conexion, $update);
    }

    //Funciones para eliminar datos
}
