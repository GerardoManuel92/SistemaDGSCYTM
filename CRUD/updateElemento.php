<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdminEP.php';

$idUser = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$paterno = $_POST['txtPaterno'];
$materno = $_POST['txtMaterno'];
$estatus = $_POST['cbEstatus'];

$datos = array(
    $paterno,
    $materno, 
    $nombre,   
    $estatus,    
    $idUser
);
$obj = new MetodosAdmin();
if ($obj->updateElemento($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Elemento modificado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminEP/listEmpleados.php"
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
