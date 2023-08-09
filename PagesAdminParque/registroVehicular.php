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
    <title>Regsitro Vehicular</title>
</head>
<?php
include '../Clases/header.php';
include '../Clases/navAdmin.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <main class="contenedor" style="height: auto;">
        <div class="contenedor2">
            <div class="contenedor2__section" style="width: 30%;">
                <img src="../logos/piedrapochotes.png" alt="" style="height: 700px;">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm" style="width: 70%;">
                <form action="../CRUD/insertarUsuario.php" method="POST" enctype="multipart/form-data">
                    <h1>Registro Vehicular</h1>
                    <fieldset>
                        <legend>Complete el formulario</legend>
                        <div class="fila" style="grid-template-columns: repeat(3, 1fr);">
                            <div class="columnna">
                                <label for="">Progresivo (automático)</label>
                                <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT MAX(id_progresivo+1) as id FROM registro_unidades";
                                    $idProg = $obj->obtenerDatos($sql);
                                    foreach($idProg as $idP){
                                ?>
                                <input type="text" name="txtProgresivo" id="" value="<?php echo $idP['id'];?>" readonly>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="columnna">
                                <label for="">Motor</label>
                                <input type="text" name="txtMotor" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Costo</label>
                                <input type="text" name="txtCosto" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Inventario</label>
                                <input type="tel" name="txtInventario" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Factura</label>
                                <input type="email" name="txtFactura" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Placas</label>
                                <input type="text" name="txtPlaca" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Serie</label>
                                <input type="text" name="txtSerie" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Modelo</label>
                                <input type="text" name="txtModelo" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Fecha factura</label>
                                <input type="date" name="txtFecha" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Estado de uso</label>
                                <select name="cmbEstadoUso" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM estado_uso ORDER BY(id_estado) ASC";
                                    $rolUser = $obj->obtenerDatos($sql);
                                    foreach ($rolUser as $rol) {
                                    ?>
                                        <option value="<?php echo $rol['id_estado']; ?>"><?php echo $rol['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columnna">
                                <label for="">Proveedor</label>
                                <select name="cmbProveedor" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM proveedor ORDER BY(id_proveedor) ASC";
                                    $rolUser = $obj->obtenerDatos($sql);
                                    foreach ($rolUser as $rol) {
                                    ?>
                                        <option value="<?php echo $rol['id_proveedor']; ?>"><?php echo $rol['nombre_proveedor']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columnna">
                                <label for="">Tipo de unidad</label>
                                <select name="cmbTipoUnidad" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM tipo_unidad ORDER BY(id_tipo) ASC";
                                    $rolUser = $obj->obtenerDatos($sql);
                                    foreach ($rolUser as $rol) {
                                    ?>
                                        <option value="<?php echo $rol['id_tipo']; ?>"><?php echo $rol['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columnna">
                                <label for="">Economico</label>
                                <select name="cmbEconomico" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM eco ORDER BY(id_eco) ASC";
                                    $rolUser = $obj->obtenerDatos($sql);
                                    foreach ($rolUser as $rol) {
                                    ?>
                                        <option value="<?php echo $rol['id_eco']; ?>"><?php echo $rol['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columnna">
                                <label for="">Marca y submarca</label>
                                <select name="cmbSubmarca" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT sub.id_submarca as id, sub.descripcion as submarca, mv.descripcion as marca
                                        FROM submarca sub JOIN marca_vehiculos mv ON sub.id_marca = mv.id_marca;";
                                    $rolUser = $obj->obtenerDatos($sql);
                                    foreach ($rolUser as $rol) {
                                        if ($rol['marca'] === $rol['submarca']) {
                                    ?>
                                            <option value="<?php echo $rol['id']; ?>"><?php echo $rol['submarca']; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?php echo $rol['id']; ?>"><?php echo $rol['marca'] . ' ' . $rol['submarca']; ?></option>
                                    <?php
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="columnna">
                                <label for="">Región</label>
                                <select name="cmbRegion" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM region ORDER BY(id_region) ASC";
                                    $rolUser = $obj->obtenerDatos($sql);
                                    foreach ($rolUser as $rol) {
                                    ?>
                                        <option value="<?php echo $rol['id_region']; ?>"><?php echo $rol['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Sector</label>
                                <input type="text" name="txtSector" id="">
                            </div>
                            <div class="columna">
                                <label for="">Cuadrante</label>
                                <input type="text" name="txtCuadrante" id="">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 1</label>
                                <input type="file" name="imagen1" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 2</label>
                                <input type="file" name="imagen2" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 3</label>
                                <input type="file" name="imagen3" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 4</label>
                                <input type="file" name="imagen4" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 5</label>
                                <input type="file" name="imagen5" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 6</label>
                                <input type="file" name="imagen6" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Observaciones</label>
                                <textarea name="txtObservacion" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
</body>
<?php
include '../Clases/footer.php';
?>

</html>