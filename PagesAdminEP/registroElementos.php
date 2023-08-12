<?php
require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdminEP.php';
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
            <div class="contenedor2__section contenedor2__sectionForm">
                <form action="../CRUD/insertarUsuarioEP.php" method="POST">
                    <fieldset>
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
                                <label for="">Id de empleado</label>
                                <select name="cmbEmp" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM numero_empleado ORDER BY(id_numero_de_empleado) ASC";
                                    $query = $obj->obtenerDatosChalecos($sql);                                    
                                    foreach ($query as $rol) {
                                    ?>
                                        <option value="<?php echo $rol['id_numero_de_empleado']; ?>"><?php echo $rol['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>                           
                            <div class="columnna">
                                <label for="">Estatus</label>
                                <select name="cmbEstatus" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM estatus_elemento ORDER BY(id_estatus) ASC";
                                    $query = $obj->obtenerDatosChalecos($sql);                                    
                                    foreach ($query as $rol) {
                                    ?>
                                        <option value="<?php echo $rol['id_estatus']; ?>"><?php echo $rol['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
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