<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    
</head>

</html>


<?php
require_once '../Conexion/Conexion.php';
$conexion = new Conexion();
$conn = $conexion->conectarParque();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $btnEntrar = $_POST['btnEntrar'];
    if (isset($btnEntrar)) {
        $usuario = base64_decode($_POST["cmbUser"]);
        $password = $_POST["txtPassword"];

        if (empty($usuario) || empty($password)) {
?>
            <script>                
                swal(
                    'Error!',
                    'El formulario está incompleto!',
                    'error',
                ).then(function() {
                    window.location = '../ParqueVehicular/loginPV.php';
                });
            </script>
            <?php
        } else {
            $sql = "SELECT nombre, paterno, materno,rol_usuario FROM usuarios WHERE rol_usuario='$usuario' AND u_password ='$password'";

            $resultado = mysqli_query($conn, $sql);
            if ($log = mysqli_fetch_assoc($resultado)) {
                $perfil = $_SESSION["txtUsuario"] = $log["rol_usuario"];
                $_SESSION["txtUsuario"] = $log["nombre"] . ' ' . $log["paterno"] . ' ' . $log["materno"];


                if ($perfil == 1) {
            ?>
                    <script>                        
                        swal(
                            'Exito!',
                            'Autentificación exitosa!',
                            'success',
                        ).then(function() {
                            window.location = '../ParqueVehicular/menuAdmin.php';
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
                            window.location = '../ParqueVehicular/menUser.php';
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
                        window.location = '../ParqueVehicular/loginPV.php';
                    });
                </script>
<?php
            }
        }
    }
}
mysqli_close($conn);
?>