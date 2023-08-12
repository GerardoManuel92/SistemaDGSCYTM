<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php
require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdminEP.php';

$obj = new MetodosAdmin();
$descripcion = $_POST['txtDescripcion'];

if ($obj->insertSerieCasco($descripcion) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Serie registrado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminEP/opcRegistroCascos.php"
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