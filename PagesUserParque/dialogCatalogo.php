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
    <link rel="stylesheet" href="../CSS/modalstyle.css">
    <title>Fotos</title>
</head>

<body class="body_dialog">
    <dialog open>
        <div class="body_dialog2">
            <div class="div_dialog">
                <img src="../logos/direccion-administrativa.png" alt="">
                <h1>Galeria de fotos de la unidad</h1>
            </div>
            <br>
            <?php
            $obj = new MetodosAdmin();
            $id = base64_decode($_GET['id']);
            $sql = "SELECT imagen,imagen2,imagen3,imagen4,imagen5,imagen6 FROM registro_unidades WHERE id_progresivo=$id";
            $datos = $obj->obtenerDatos($sql);
            foreach ($datos as $d) {
            ?>
                <div class="container">

                    <ul class="slider">
                        <li id="slide1">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($d['imagen']); ?>" alt="">
                        </li>
                        <li id="slide2">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($d['imagen2']); ?>" alt="">
                        </li>
                        <li id="slide3">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($d['imagen3']); ?>" alt="">
                        </li>
                        <li id="slide4">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($d['imagen4']); ?>" alt="">
                        </li>
                        <li id="slide5">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($d['imagen5']); ?>" alt="">
                        </li>
                        <li id="slide6">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($d['imagen6']); ?>" alt="">
                        </li>
                    </ul>
                    <br><br><br><br>
                    <ul class="menu">
                        <li>
                            <a href="#slide1">1</a>
                        </li>
                        <li>
                            <a href="#slide2">2</a>
                        </li>
                        <li>
                            <a href="#slide3">3</a>
                        </li>
                        <li>
                            <a href="#slide4">4</a>
                        </li>
                        <li>
                            <a href="#slide5">5</a>
                        </li>
                        <li>
                            <a href="#slide6">6</a>
                        </li>
                    </ul>

                </div>

                <a href="../ParqueVehicular/menUser.php">Salir</a>
            <?php }
            include '../Clases/footer.php'; ?>
        </div>

    </dialog>
</body>

</html>