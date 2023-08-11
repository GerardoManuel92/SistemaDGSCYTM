<?php
require_once '../Conexion/Conexion.php';
$conexion = new Conexion();
$conn = $conexion->conectarEquipo();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Equipamiento Policial</title>
</head>
<?php include '../Clases/header.php'; ?>

<body>
    <main class="contenedor" style="flex-direction: column;">
        <h1>Equipamiento Policial</h1>
        <div class="contenedor2">
            <div class="icon">
                <img src="../logos/piedrapochotes.png" alt="">
            </div>
            <div class="form">
                <form action="../Clases/logEP.php" method="POST">
                    <fieldset>
                        <legend>Favor de identificarse</legend>
                        <div class="fila">
                            <div class="columna">
                                <label for="">Usuario</label>
                                <select name="cmbUser" id="">
                                    <option value="0">---Seleccionar Usuario---</option>
                                    <?php
                                    $queryUser = "SELECT username FROM usuarios";
                                    $query = mysqli_query($conn, $queryUser);
                                    while ($username = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <option value="<?php echo $username['username']; ?>"><?php echo $username['username']; ?></option>
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