<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';


$precio_litro = $_POST['precio_litro'];
$litros = $_POST['litros'];
$eco = $_POST['txtidEco'];
$gasolina = 1;
$ubicacion = $_POST['id_ubicacion'];
$fecha = $_POST['fecha'];
$kilometros = $_POST['kilometraje'];
$kilometros_nvo = $_POST['kilometraje_nvo'];
$noBomba = $_POST['bomba'];
$tanque = $_POST['tanque'];
$tanque_nvo = $_POST['tanque_nvo'];
$precio_ticket = $_POST['precio_ticket'];
$folio_ticket = $_POST['folio_ticket'];
$resguardatario = $_POST['id_resg'];
$observaciones = $_POST['observaciones'];

$datos = array(
    $gasolina,
    $eco,
    $ubicacion,
    $kilometros,
    $kilometros_nvo,
    $tanque,
    $tanque_nvo,
    $precio_litro,
    $litros,
    $precio_ticket,
    $noBomba,
    $folio_ticket,
    $observaciones,
    $fecha,
    $resguardatario
);
$obj = new MetodosAdmin();
if ($obj->insertarCtrlCombustible($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Usuario registrado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminParque/combustibleDiesel.php"
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