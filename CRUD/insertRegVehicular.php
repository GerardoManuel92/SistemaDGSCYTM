<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$idProgresivo = $_POST['txtProgresivo'];
$motor = $_POST['txtMotor'];
$costo = $_POST['txtCosto'];
$inventario = $_POST['txtInventario'];
$factura = $_POST['txtFactura'];
$placa = $_POST['txtPlaca'];
$serie = $_POST['txtSerie'];
$modelo = $_POST['txtModelo'];
$fecha = $_POST['txtFecha'];
$estado_uso = $_POST['cmbEstadoUso'];
$proveedor = $_POST['cmbProveedor'];
$tipo_unidad = $_POST['cmbTipoUnidad'];
$economico = $_POST['cmbEconomico'];
$submarca = $_POST['cmbSubmarca'];
$observacion = $_POST['txtObservacion'];
$region = $_POST['cmbRegion'];
$sector = $_POST['txtSector'];
$cuadrante = $_POST['txtCuadrante'];
$imagen1 = addslashes(file_get_contents($_FILES['imagen1']['tmp_name']));
$imagen2 = addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
$imagen3 = addslashes(file_get_contents($_FILES['imagen3']['tmp_name']));
$imagen4 = addslashes(file_get_contents($_FILES['imagen4']['tmp_name']));
$imagen5 = addslashes(file_get_contents($_FILES['imagen5']['tmp_name']));
$imagen6 = addslashes(file_get_contents($_FILES['imagen6']['tmp_name']));

$datos = array(
    $placa,
    $factura,
    $fecha,
    $costo,
    $inventario,
    $tipo_unidad,
    $estado_uso,
    $proveedor,
    $submarca,
    $modelo,
    $economico,
    $serie,
    $observacion,
    $motor,
    $sector,
    $cuadrante,
    $imagen1,
    $imagen2,
    $imagen3,
    $imagen4,
    $imagen5,
    $imagen6    
);
$datos2 = array($idProgresivo, $region);
$obj = new MetodosAdmin();
if ($obj->insertarRegistroVehicular($datos) == 1 && $obj->insertarRegistroRegiones($datos2) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Usuario registrado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../Pages/registroVehicular.php"
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
