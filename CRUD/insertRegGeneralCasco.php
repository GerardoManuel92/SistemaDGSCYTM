<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdminEP.php';

$marca = $_POST['marca'];
$serie = $_POST['serie'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$material = $_POST['material'];
$mueble = $_POST['mueble'];
$inventario = $_POST['txtInventario'];
$fechaFab = $_POST['txtFF'];
$estado = $_POST['estadoUso'];
$observaciones = $_POST['txtObservaciones'];

$datos = array(
    $marca,
    $serie,
    $modelo,
    $color,
    $material,
    $mueble,
    $inventario,
    $fechaFab,
    $estado,
    $observaciones
);
$obj = new MetodosAdmin();
if ($obj->insertRegistroGeneralCasco($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Usuario registrado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminEP/registro-general.php"
        });
    </script>
<?php
} else {
?>
    <script>
        swal({
            title: "Error!",
            text: "El usuario no se pudo registrar correctamente",
            icon: "error",
        });
    </script>

<?php
}
