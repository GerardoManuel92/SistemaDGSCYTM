<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';

$nombre = $_POST['txtNombre'];
$paterno = $_POST['txtPaterno'];
$materno = $_POST['txtMaterno'];
$idEmpleado = $_POST['cbEmp'];
$estatus = $_POST['cbEstatus'];


$datos = array(    
    $paterno,
    $materno,
    $nombre,
    $idEmpleado,
    $estatus
);
$obj = new MetodosAdmin();
if ($obj->insertElemento($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Elemento registrado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminEP/registroElementos.php"
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
