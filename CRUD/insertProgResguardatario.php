<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$progresivo = $_POST['cmbProgresivo'];
$resguardatario = $_POST['cmbResguardatario'];

$datos = array(
    $eco,
    $resguardatario,    
);
$obj = new MetodosAdmin();
if ($obj->insertarProg_Resguardatario($prog) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Registro realizado con éxito",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminParque/altaResguardatarios.php"
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