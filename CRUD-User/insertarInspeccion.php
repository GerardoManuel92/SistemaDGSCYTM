<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$idEco = $_POST['txtIdEco'];
$submarca = $_POST['txtSubmarca'];
$estado = $_POST['cmbEstadoUso'];
$fecha = $_POST['txtFecha'];
$observacion = $_POST['txtObservacion'];
$imagen1 = addslashes(file_get_contents($_FILES['imagen1']['tmp_name']));
$imagen2 = addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
$imagen3 = addslashes(file_get_contents($_FILES['imagen3']['tmp_name']));
$imagen4 = addslashes(file_get_contents($_FILES['imagen4']['tmp_name']));
$imagen5 = addslashes(file_get_contents($_FILES['imagen5']['tmp_name']));
$imagen6 = addslashes(file_get_contents($_FILES['imagen6']['tmp_name']));

$datos = array(
    $idEco,
    $submarca,
    $estado,
    $imagen1,
    $imagen2,
    $imagen3,
    $imagen4,
    $imagen5,
    $imagen6,
    $fecha,
    $observacion
);
$obj = new MetodosAdmin();
if ($obj->insertarInspeccion($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Usuario registrado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminParque/inspeccion.php"
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