<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php
require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdminEP.php';

$obj = new MetodosAdmin();
$marca = $_POST['marca'];
$serie = $_POST['serie'];
$modelo = $_POST['modelo'];
$talla = $_POST['talla'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$datos = array(
    $marca, 
    $serie,
    $modelo,
    $talla,
    $imagen
);

if ($obj->insertCasco($datos) == 1) {
?>
    <script>
        swal({
            title: "Exito!",
            text: "Casco registrado correctamente",
            icon: "success",
        }).then(function() {
            location.reload();
            window.location = "../PagesAdminEP/casco.php"
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
