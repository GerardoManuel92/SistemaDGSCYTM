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
    <title>Reporte de Combustible</title>
</head>
<?php
include '../Clases/header.php';
include '../Clases/navAdmin.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <main class="contenedor">
        <div class="contenedor2">
            <div class="contenedor2__section" style="width: 35%;">
                <img src="../logos/piedrapochotes.png" alt="">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm" style="width: 65%;">
                <form action="#" id="formFiltro" class="formFiltro">
                    <div class="fila">
                        <div class="columna">
                            <label for="">¿Como desea generar su reporte?</label>
                            <select name="cbOpcion" id="cbOpcion" onchange="validarOpcFiltro();">
                                <option value="0">Elige una opcion</option>
                                <option value="1">Por día</option>
                                <option value="2">Por económico</option>
                            </select>
                            <p class="alert" id="alert"></p>
                        </div>
                    </div>
                </form>
                <br><br>
                <form action="../reports/report-combustible.php" method="POST" id="form1" style="height: 100px;">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Seleccione fecha</label>
                            <input type="date" name="txtFecha" id="">
                        </div>
                        <div class="columna">
                            <br>
                            <input type="submit" value="Generar reporte" class="boton" name="btnGenerar">
                        </div>
                    </div>
                </form>
                <form action="../reports/report-combustibleEco.php" method="POST" id="form2" style="height: 300px;">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Seleccione el número de económico</label>
                            <select name="cbEco" id="">
                                <?php
                                $obj = new MetodosAdmin();
                                $sql = "SELECT id_eco FROM control_combustible group by (id_eco);";
                                $datos = $obj->obtenerDatos($sql);
                                foreach($datos as $x) {
                                ?>
                                    <option value="<?php echo $x['id_eco']; ?>" id=""><?php echo $x['id_eco']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="fila">
                        <div class="columna">
                            <label for="">Desde el día</label>
                            <input type="date" name="txtFInicio" id="">
                        </div>
                        <div class="columna">
                            <label for="">Hasta el día</label>
                            <input type="date" name="txtFTermino" id="">
                        </div>
                        <div class="columna">
                            <br>
                            <input type="submit" value="Generar reporte" class="boton" name="btnGenerar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<script src="../JS/validaFormResguardos.js"></script>
<?php
include '../Clases/footer.php';
?>

</html>