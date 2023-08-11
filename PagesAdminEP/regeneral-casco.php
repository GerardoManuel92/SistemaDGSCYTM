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
    <div class="container2">
        <div class="container__element">
            <div class="container__elementForm">
                <h1 class="h1" style="font-size: 28px; color : #631133; text-align: center;">Registro general de cascos</h1>
                <form action="../insert(Admin)/insertRegenCasco.php" method="POST">
                    <fieldset>
                        <legend>Por favor llene el formulario</legend>
                        <div class="fila" style="display: grid; grid-template-columns: repeat(3, 1fr);">
                            <div class="columna">
                                <label for="">ID_CASCO</label>
                                <?php
                                $sql = "SELECT MAX(id_control+1) AS id FROM control_casco";
                                $control = $conn->obtenerDatosCascos($sql);
                                foreach ($control as $a) {
                                ?>
                                    <input type="text" id="casco" name="control_chaleco" value="<?php echo $a['id']; ?>">
                                <?php } ?>
                            </div>
                            <div class="columna">
                                <label for="">MARCA</label>
                                <select name="marca" id="lang">
                                    <option value="0">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM marca";
                                    $marca = $conn->obtenerDatosCascos($sql);
                                    foreach ($marca as $b) {
                                    ?>
                                        <option value="<?php echo $b['id_marca']; ?>"><?php echo $b['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">SERIE</label>
                                <select name="serie" id="lang">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM serie";
                                    $serie = $conn->obtenerDatosCascos($sql);
                                    foreach($serie as $c){ 
                                    ?>
                                        <option value="<?php echo $c['id_serie']; ?>"><?php echo $c['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">MODELO</label>
                                <select name="modelo" id="lang">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM modelo";
                                    $modelo = $conn->obtenerDatosCascos($sql);
                                    foreach($modelo as $d) {
                                    ?>
                                        <option value="<?php echo $d['id_modelo']; ?>"><?php echo $d['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">COLOR</label>
                                <select name="color" id="lang">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM color";
                                    $color = $conn->obtenerDatosCascos($sql);
                                    foreach($color as $e) {
                                    ?>
                                        <option value="<?php echo $e['id_color']; ?>"><?php echo $e['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">MATERIAL</label>
                                <select name="material" id="lang">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM material";
                                    $material = $conn->obtenerDatosCascos($sql);
                                    foreach($material as $f){
                                    ?>
                                        <option value="<?php echo $f['id_material']; ?>"><?php echo $f['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">MUEBLE</label>
                                <select name="mueble" id="lang">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM nombre_mueble";
                                    $nomMueble = $conn->obtenerDatosCascos($sql);
                                    foreach($nomMueble as $g){
                                    ?>
                                        <option value="<?php echo $g['id_mueble']; ?>"><?php echo $g['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">INVENTARIO</label>
                                <input type="text" name="txtInventario" id="">
                            </div>
                            <div class="columna">
                                <label for="">FECHA FABRICACIÓN</label>
                                <input type="text" name="txtFF" id="">
                            </div>
                            <div class="columna">
                                <label for="">ESTADO USO</label>
                                <select name="estadoUso" id="lang">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM estado_uso";
                                    $estado = $conn->obtenerDatosCascos($sql);
                                    foreach($estado as $h){
                                    ?>
                                        <option value="<?php echo $h['id_estado']; ?>"><?php echo $h['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">OBSERVACIONES</label>
                                <textarea name="txtObservaciones" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="columna">
                            <input type="submit" value="Registrar" name="btnGuardar" class="boton" style="margin: auto;">
                        </div>
                        </div>                        
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
include '../Clases/footer.php';
?>

</html>