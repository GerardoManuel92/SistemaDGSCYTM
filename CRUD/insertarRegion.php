<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$region = $_POST['txtRegion'];
$obj = new MetodosAdmin();
if ($obj->insertarRegion($region) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Registro realizado con éxito",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminParque/Multiregistro.php"
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