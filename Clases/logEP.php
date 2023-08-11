<html>

<head>
<link rel="shortcut icon" href="./assets/logos/estrella.ico">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>

</html>

<?php

include "../Conexion/Conexion.php";
$conexion = new Conexion();
$conn = $conexion->conectarEquipo();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $btnEntrar = $_POST['btnEntrar'];
    if (isset($btnEntrar)) {
        $usuario = $_POST["cmbUser"];
        $password = $_POST["txtPassword"];

        if (empty($usuario) || empty($password)) {
?>
            <script>
                swal(
                    'Error!',
                    'El formulario está incompleto!',
                    'error',
                ).then(function() {
                    window.location = '../EquipamientoPolicial/loginEP.php';
                });
            </script>
            <?php
        } else {
            $sql = "SELECT nombre, paterno, materno, rol_id FROM usuarios WHERE username='$usuario' AND password ='$password'";

            $resultado = mysqli_query($conn, $sql);
            if ($log = mysqli_fetch_assoc($resultado)) {
                $perfil = $_SESSION["txtUsuario"] = $log["rol_id"];
                $_SESSION["txtUsuario"] = $log["nombre"] . ' ' . $log["paterno"] . ' ' . $log["materno"];


                if ($perfil == 1) {
            ?>
                    <script>
                        swal(
                            'Exito!',
                            'Autentificación exitosa!',
                            'success',
                        ).then(function() {
                            window.location = '../EquipamientoPolicial/menuAdmin.php';
                        });
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        swal(
                            'Exito!',
                            'Autentificación exitosa!',
                            'success',
                        ).then(function() {
                            window.location = '../EquipamientoPolicial/menUser.php';
                        });
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    swal(
                        'Error!',
                        'Credenciales incorrectas, favor de validar!',
                        'error',
                    ).then(function() {
                        window.location = '../index.php';
                    });
                </script>
<?php
            }
        }
    }
}
mysqli_close($conn);
?>