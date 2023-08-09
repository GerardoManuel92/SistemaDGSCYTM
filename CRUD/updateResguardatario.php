<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$idResguardo = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$paterno = $_POST['txtPaterno'];
$materno = $_POST['txtMaterno'];
$region = $_POST['cbRegion'];

$datos = array(
    $nombre,
    $paterno,
    $materno,
    $region,
    $idResguardo
);
$obj = new MetodosAdmin();
if ($obj->updateResguardatario($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Datos modificados correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminParque/listaResguardatarios.php"
        });
    </script>
<?php
} else {
?>
    <script>
        swal({
            title: "Error!",
            text: "No se pudieron modificar los datos",
            icon: "error",
        });
    </script>

<?php
}