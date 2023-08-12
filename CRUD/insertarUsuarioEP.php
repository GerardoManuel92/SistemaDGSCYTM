<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php

require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdminEP.php';

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
    $rol
);
$obj = new MetodosAdmin();
if ($obj->insertarUsuario($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Usuario registrado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminEP/registroUsuarios.php"
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
