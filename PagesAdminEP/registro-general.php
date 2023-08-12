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
    <title>Registro de Chalecos</title>
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
                <h1 class="h1" style="text-align: center; font-size: 28px; color: #631133;">Registro general chalecos</h1>
                <form action="../CRUD/insertRegGeneral.php" method="POST">
                    <fieldset>
                        <legend>Por favor llene el formulario</legend>
                        <div class="fila" style="display: grid; grid-template-columns: repeat(3, 1fr);">
                            <div class="columna">
                                <label for="">ID Matricula (automático)</label>
                                <?php
                                $sqlID = "SELECT MAX(matricula)+1 AS id FROM concentrado_general";
                                $queryID = $conn->obtenerDatosChalecos($sqlID);
                                foreach ($queryID as $arrayID) {
                                ?>
                                    <input type="text" name="Idmatricula" id="" value="<?php echo $arrayID['id']; ?>" readonly style="border-style: none;">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="columna">
                                <label for="">ID modelo chaleco</label>
                                <select name="cmbModelChaleco" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM modelo_chaleco";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_modelo_chaleco']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">ID serie chaleco</label>
                                <select name="cmbSerieChaleco" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM serie_chaleco";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_serie_chaleco']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">ID modelo placa delantera</label>
                                <select name="mod_placa_delantera" id="">
                                    <option value="0">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM modelo_placa_delantera";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_placa_delantera']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">ID serie placa delantera</label>
                                <select name="cmbSeriePlacaD" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM serie_placa_delantera";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_serie_placa_delantera']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">ID modelo placa trasera</label>
                                <select name="cmbModelPlacaT" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM modelo_placa_trasera";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_placa_trasera']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">ID serie placa trasera</label>
                                <select name="cmbSeriePlacaT" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM serie_placa_trasera";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_serie_placa_trasera']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Elemento</label>
                                <select name="idElemento" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM empleado";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_empleado']; ?>"><?php echo $array['paterno'] . ' ' . $array['materno'] . ' ' . $array['nombre'] . ' (' . $array['id_numero_de_empleado'] . ')'; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Región</label>
                                <select name="idRegion" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM regiones";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_region']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Talla</label>
                                <select name="idTalla" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM talla_chaleco";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_talla_chaleco']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Sexo</label>
                                <select name="idSexo" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM sexo";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_sexo']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Cargo</label>
                                <select name="idCargo" id="">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    $sql = "SELECT * FROM grado";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $array) {
                                    ?>
                                        <option value="<?php echo $array['id_grado']; ?>"><?php echo $array['descripcion']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="fila">
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