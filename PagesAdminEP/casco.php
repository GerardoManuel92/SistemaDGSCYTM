<?php
require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdminEP.php';
$conn = new MetodosAdmin();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Registro de Usuarios</title>
</head>
<?php
include '../Clases/header.php';
include '../EquipamientoPolicial/navAdmin.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <main class="contenedor">
        <div class="contenedor2">
            <div class="contenedor2__section" style="width: 30%;">
                <img src="../logos/piedrapochotes.png" alt="">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm" style="width: 70%;">
                <h1>Registro de Cascos</h1>
                <form action="../CRUD/insertarCasco.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Por favor llene el formulario</legend>
                        <div class="fila" style="display: grid; grid-template-columns: repeat(3, 1fr);">
                            <div class="columna">
                                <label for="">ID_CASCO</label>
                                <?php
                                $sql = "SELECT MAX(id_casco+1) AS id FROM casco";
                                $query = $conn->obtenerDatosCascos($sql);
                                foreach ($query as $a) {
                                ?>
                                    <input type="text" id="casco" name="control_chaleco" value="<?php echo $a['id']; ?>">
                                <?php } ?>
                            </div>
                            <div class="columna">
                                <label for="">ID_MARCA</label>
                                <select name="marca" id="lang">
                                    <option value="0">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM marca";
                                    $query = $conn->obtenerDatosCascos($sql);
                                    foreach ($query as $b) {
                                    ?>
                                        <option value="<?php echo $b['id_marca']; ?>"><?php echo $b['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">ID_SERIE</label>
                                <select name="serie" id="lang">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM serie";
                                    $query = $conn->obtenerDatosCascos($sql);
                                    foreach ($query as $c) {
                                    ?>
                                        <option value="<?php echo $c['id_serie']; ?>"><?php echo $c['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">ID_MODELO</label>
                                <select name="modelo" id="lang">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM modelo";
                                    $query = $conn->obtenerDatosCascos($sql);
                                    foreach ($query as $d) {
                                    ?>
                                        <option value="<?php echo $d['id_modelo']; ?>"><?php echo $d['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">ID_TALLA</label>
                                <select name="talla" id="lang">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM talla";
                                    $query = $conn->obtenerDatosCascos($sql);
                                    foreach ($query as $e) {
                                    ?>
                                        <option value="<?php echo $e['id_talla']; ?>"><?php echo $e['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label class="">Imagen</label>
                                <input type="file" class="form-control" id="imagen4" name="imagen" accept="image/*">
                            </div>
                        </div>
                        <br>
                        <div class="fila">
                            <div class="columna">
                                <input type="submit" value="Registrar" name="btnGuardar" class="boton" style="margin-left: 50%;">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </div>
    </main>
</body>
<?php
include '../Clases/footer.php';
?>

</html>