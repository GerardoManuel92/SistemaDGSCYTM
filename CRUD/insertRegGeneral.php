<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdminEP.php';

$modelChaleco = $_POST['cmbModelChaleco'];
$serieChaleco = $_POST['cmbSerieChaleco'];
$modelPlacaDel = $_POST['mod_placa_delantera'];
$seriePlacaDel = $_POST['cmbSeriePlacaD'];
$modelPlacaT = $_POST['cmbModelPlacaT'];
$seriePlacaT = $_POST['cmbSeriePlacaT'];
$elemento = $_POST['idElemento'];
$region = $_POST['idRegion'];
$talla = $_POST['idTalla'];
$sexo = $_POST['idSexo'];
$cargo = $_POST['idCargo'];

$datos = array(
    $modelChaleco,
    $serieChaleco,
    $modelPlacaDel,
    $seriePlacaDel,
    $modelPlacaT,
    $seriePlacaT,
    $elemento,
    $region,
    $talla,
    $sexo,
    $cargo
);
$obj = new MetodosAdmin();
if ($obj->insertRegistroGeneralChaleco($datos) == 1) {
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
