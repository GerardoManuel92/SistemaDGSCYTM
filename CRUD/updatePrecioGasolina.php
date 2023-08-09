<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$idGasolina = $_POST['txtId'];
$precio = $_POST['txtGasolina'];


$datos = array($precio,$idGasolina);
$obj = new MetodosAdmin();
if ($obj->updateGasolina($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Precio modificado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminParque/FormGasolinas.php"
        });
    </script>
<?php
} else {
?>
    <script>
        swal({
            title: "Error!",
            text: "Hubo un error al modificar el precio",
            icon: "error",
        });
    </script>

<?php
}