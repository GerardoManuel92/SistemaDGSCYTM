<?php
require_once '../Conexion/Conexion.php';
$conexion = new Conexion();
$conn = $conexion->conectarParque();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">       
    <title>PARQUE VEHICULAR</title>
</head>
<?php include '../Clases/header.php'; ?>

<body>
    <main class="contenedor" style="flex-direction: column;">
        <h1>Parque Vehicular</h1>
        <div class="contenedor2">
            <div class="icon">
                <img src="../logos/estrella.png" alt="">
            </div>
            <div class="form">
                <form action="../Clases/logPV.php" method="POST">
                    <fieldset>
                        <legend>Favor de identificarse</legend>
                        <div class="fila">
                            <div class="columna">
                                <label for="">Usuario</label>
                                <select name="cmbUser" id="">
                                    <option value="0">--Seleccionar--</option>
                                    <?php
                                    $sqlAlias = "SELECT n_usuario, rol_usuario FROM usuarios";
                                    $queryAlias = mysqli_query($conn, $sqlAlias);
                                    while ($nombreUsuario = mysqli_fetch_assoc($queryAlias)) {
                                    ?>
                                        <option value="<?php echo base64_encode($nombreUsuario['rol_usuario']); ?>"><?php echo $nombreUsuario['n_usuario']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Password</label>
                                <input type="password" name="txtPassword" id="">
                            </div>
                            <div class="columna">
                                <input type="submit" name="btnEntrar" value="Entrar" id="" class="boton">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <br>
        <a href="../index.php">Regresar al menú</a>
    </main>
</body>
<?php include '../Clases/footer.php'; ?>

</html>