<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$nombre = $_POST['txtNombre'];
$paterno = $_POST['txtPaterno'];
$materno = $_POST['txtMaterno'];
$rol = $_POST['cmbRol'];


$datos = array(
    $nombre,
    $paterno,
    $materno,    
    $rol
);
$obj = new MetodosAdmin();
if ($obj->insertarResguardatario_Region($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Registro realizado con éxito",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../Pages/altaResguardatarios.php"
        });
    </script>
<?php
} else {
?>
    <script>
        swal({
            title: "Error!",
            text: "Hubo un error al registrar",
            icon: "error",
        });
    </script>

<?php
}