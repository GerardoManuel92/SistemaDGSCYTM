<?php
require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Control de Combustible</title>
</head>
<?php
include '../Clases/header.php';
include '../Clases/navUser.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <br>
    <h1 class="h1" style="color: #631133; text-align: center;">Seleccione tipo de gasolina</h1>
    <main class="contenedor" style="height: auto;">
        <div class="contenedor_combustible">
            <div class="contenedor_combustible--content contenedor_combustible--content1">
                <a href="../PagesUserParque/combustibleDiesel.php"><p>Diesel</p></a>                
            </div>
            <div class="contenedor_combustible--content contenedor_combustible--content2">
            <a href="../PagesUserParque/combustibleMagna.php"><p>Magna</p></a>
            </div>
            <div class="contenedor_combustible--content contenedor_combustible--content3">
            <a href="../PagesUserParque/combustiblePremium.php"><p>Premium</p></a>
            </div>
        </div>
    </main>
</body>
<?php
include '../Clases/footer.php';
?>

</html>