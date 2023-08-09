<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parque Vehicular Administrador</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<?php include '../Clases/header.php';?>
<?php include '../Clases/navAdmin.php'; ?>
<body>   
    <main class="contenedor" style="height: 500px;">
        <div class="contenedor2">
            <div class="contenedor2__section">
                <img src="../logos/piedrapochotes.png" alt="">
            </div>
            <div class="contenedor2__section">
            <h1>Bienvenido <?php echo $_SESSION['txtUsuario'] ?>!</h1>
            </div>
        </div>
    </main>
</body>
<?php include '../Clases/footer.php'; ?>
</html>