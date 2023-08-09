<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$submarca = $_POST['txtSubmarca'];
$marca = $_POST['cbMarcaPropietario'];
$obj = new MetodosAdmin();
$datos = array($submarca, $marca);

if ($obj->insertarSubmarca($datos) == 1) {
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