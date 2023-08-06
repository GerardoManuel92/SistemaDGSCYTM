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
                <form action="../CRUD/insertarUsuario.php" method="POST">
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
                                <label for="">Teléfono</label>
                                <input type="tel" name="txtTelefono" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Email</label>
                                <input type="email" name="txtEmail" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Nombre de usuario</label>
                                <input type="text" name="txtUsuario" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Password</label>
                                <input type="password" name="txtPassword1" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Confirmar password</label>
                                <input type="password" name="txtPassword2" id="">
                            </div>
                            <div class="columnna">
                                <label for="">Rol de usuario</label>
                                <select name="cmbRol" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM roles_usuario ORDER BY(id_rol) ASC";
                                    $rolUser = $obj->obtenerDatos($sql);
                                    foreach ($rolUser as $rol) {
                                    ?>
                                        <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['descripcion']; ?></option>
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