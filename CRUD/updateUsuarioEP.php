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
$telefono = $_POST['txtTelefono'];
$mail = $_POST['txtEmail'];
$usuario = $_POST['txtUsuario'];
$passwd1 = $_POST['txtPassword1'];
$passwd2 = $_POST['txtPassword2'];
$rol = $_POST['cmbRol'];


$datos = array(
    $nombre,
    $paterno,
    $materno,    
    $mail,
    $telefono,
    $usuario,
    $passwd2,
    $rol,
    $idUser
);
$obj = new MetodosAdmin();
if ($obj->updateUsuario($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Datos modificados correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminEP/BusquedaUsuarios.php"
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
