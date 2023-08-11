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
            <div class="contenedor2__section">
                <img src="../logos/piedrapochotes.png" alt="">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm" style="margin-bottom: 15rem;">
                <h1>Registro de elementos</h1>
                <form action="../insert(Admin)/insertElemento.php" method="POST">
                    <fieldset>
                        <legend>Por favor llene el formulario</legend>
                        <div class="fila">
                            <div class="columna">
                                <label for="">Id empleado(automático)</label>
                                <?php
                                $sql = "SELECT MAX(id_empleado)+1 AS id FROM empleado";
                                $query = $conn->obtenerDatosChalecos($sql);
                               foreach($query as $a) {
                                ?>
                                    <input type="text" id="chaleco" name="idElemento" value="<?php echo $a['id']; ?>" readonly>
                                <?php } ?>
                            </div>
                            <div class="columna">
                                <label for="">Nombre</label>
                                <input type="text" id="chaleco" name="txtNombre">
                            </div>
                            <div class="columna">
                                <label for="">Apellido Paterno</label>
                                <input type="text" id="chaleco" name="txtPaterno">
                            </div>
                            <div class="columna">
                                <label for="">Apellido Materno</label>
                                <input type="text" id="chaleco" name="txtMaterno">
                            </div>
                            <div class="columna">
                                <label for="">ID_Numero de empleado</label>
                                <select name="cmbNumEmp" id="lang">
                                    <option value="0">Seleccione una opcion</option>
                                    <?php
                                    $csql = "SELECT * FROM numero_empleado";
                                    $query = $conn->obtenerDatosChalecos($csql);
                                    foreach($query as $b) {
                                    ?>
                                        <option value="<?php echo $b['id_numero_de_empleado']; ?>"><?php echo $b['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="boton">
                            <input type="submit" value="Registrar" name="btnGuardar" class="boton">
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