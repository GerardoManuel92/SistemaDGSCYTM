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
    <title>Registro de Usuarios</title>
</head>
<?php
include '../Clases/header.php';
include '../Clases/navAdmin.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <main class="contenedor">
        <div class="contenedor2">
            <div class="contenedor2__section">
                <img src="../logos/piedrapochotes.png" alt="">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm">
                <form action="#" id="formFiltro" class="formFiltro">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Que desea realizar</label>
                            <select name="cbOpcion" id="cbOpcion" onchange="validarOpcFiltro();">
                                <option value="0">Elige una opcion</option>
                                <option value="1">Alta de resguardatarios y asignación a regiones</option>
                                <option value="2">Resguardo por económico</option>
                                <option value="3">Resguardo por id progresivo</option>
                            </select>
                            <p class="alert" id="alert"></p>
                        </div>
                    </div>
                </form>
                <form action="../CRUD/insertarResguardatarioRegion.php" method="POST" id="form1">
                    <h1 class="h1-form">Alta de resguardatarios y asignación a regiones</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Nombre</label>
                                <input type="text" name="txtNombre" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Apellido Paterno</label>
                                <input type="text" name="txtPaterno" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Apellido Materno</label>
                                <input type="text" name="txtMaterno" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Rol de usuario</label>
                                <select name="cmbRol" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM region ORDER BY(id_region) ASC";
                                    $region = $obj->obtenerDatos($sql);
                                    foreach ($region as $reg) {
                                    ?>
                                        <option value="<?php echo $reg['id_region']; ?>"><?php echo $reg['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="#" method="POST" id="form2">
                    <h1 class="h1-form">Resguardo por económico</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Numero eco</label>
                                <select name="cmbEco" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM eco ORDER BY(id_eco) ASC";
                                    $eco = $obj->obtenerDatos($sql);
                                    foreach ($eco as $eco) {
                                    ?>
                                        <option value="<?php echo $eco['id_eco']; ?>"><?php echo $eco['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columnna">
                                <label for="">Resguardatario / Región</label>
                                <select name="cmbResguardatario" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT res.id_resguardatario AS resguardatario, res.nombre AS nombre, res.paterno AS paterno,
                                            res.materno AS materno, reg.descripcion AS region FROM resguardatarios res JOIN region reg
                                            ON res.region = reg.id_region ORDER BY(resguardatario) ASC";
                                    $resguardatario = $obj->obtenerDatos($sql);
                                    foreach ($resguardatario as $resg) {
                                    ?>
                                        <option value="<?php echo $resg['resguardatario']; ?>"><?php echo $resg['nombre'].' '.$resg['paterno'].' '.$resg['materno'].' ('.$resg['region'].') '; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="#" method="POST" id="form3">
                    <h1 class="h1-form">Resguardo por id progresivo</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Id progresivo</label>
                                <select name="cmbProgresivo" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT id_progresivo FROM registro_unidades ORDER BY(id_progresivo) ASC";
                                    $progresivo = $obj->obtenerDatos($sql);
                                    foreach ($progresivo as $prog) {
                                    ?>
                                        <option value="<?php echo $prog['id_progresivo']; ?>"><?php echo $prog['id_progresivo']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columnna">
                                <label for="">Resguardatario / Región</label>
                                <select name="cmbResguardatario" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT res.id_resguardatario AS resguardatario, res.nombre AS nombre, res.paterno AS paterno,
                                            res.materno AS materno, reg.descripcion AS region FROM resguardatarios res JOIN region reg
                                            ON res.region = reg.id_region ORDER BY(resguardatario) ASC";
                                    $resguardatario = $obj->obtenerDatos($sql);
                                    foreach ($resguardatario as $resg) {
                                    ?>
                                        <option value="<?php echo $resg['resguardatario']; ?>"><?php echo $resg['nombre'].' '.$resg['paterno'].' '.$resg['materno'].' ('.$resg['region'].') '; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
</body>
<script src="../JS/validaFormResguardatario.js"></script>
<?php
include '../Clases/footer.php';
?>
</html>