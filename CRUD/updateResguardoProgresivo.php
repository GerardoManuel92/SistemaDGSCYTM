<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$idResguardo = $_POST['txtId'];
$progresivo = $_POST['cbProgresivo'];
$resguardatario = $_POST['cbResguardatario'];

$datos = array(
    $progresivo,
    $resguardatario,
    $idResguardo    
);
$obj = new MetodosAdmin();
if ($obj->updateResguardoProgresivo($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Datos modificados correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminParque/resguardoUnidades.php"
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