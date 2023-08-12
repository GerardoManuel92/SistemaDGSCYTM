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
    <title>Regsitro Vehicular</title>
</head>
<?php
include '../Clases/header.php';
include '../EquipamientoPolicial/navAdmin.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <main class="contenedor" style="height: auto;">
        <div class="contenedor2">
            <div class="contenedor2__section" style="width: 35%;">
                <img src="../logos/piedrapochotes.png" alt="" style="height: 700px; width: 550px;">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm" style="width: 65%;">
                <form action="#" id="formFiltro" class="formFiltro" method="POST">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Seleccione el usuario</label>
                            <select name="cbUser" id="">
                                <?php
                                $obj = new MetodosAdmin();
                                $sql = "SELECT id,username FROM usuarios ORDER BY(id) ASC";
                                $economico = $obj->obtenerDatosEP($sql);
                                foreach ($economico as $eco) {
                                ?>
                                    <option value="<?php echo $eco['id'] ?>"><?php echo $eco['username'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="columna">
                            <label for="">.</label>
                            <input type="submit" value="Buscar" class="boton" name="btnBuscar">
                        </div>
                    </div>
                </form>
                <br>
                <form action="../CRUD/updateUsuarioEP.php" method="POST" enctype="multipart/form-data" id="formInspeccion">
                    <h1>Atributos de usuarios</h1>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $btnBusqueda = $_POST['btnBuscar'];
                        if (isset($btnBusqueda)) {
                            $usuario = $_POST['cbUser'];
                            $obj = new MetodosAdmin();
                            $sql = "SELECT * FROM usuarios WHERE id='$usuario'";
                            $info = $obj->obtenerDatosEP($sql);
                            foreach ($info as $i) {
                    ?>
                                <fieldset>
                                    <legend>Reemplace los valores necesarios</legend>
                                    <div class="fila">
                                        <div class="columnna">
                                            <label for="">Nombre</label>
                                            <input type="text" name="txtId" id="" value="<?php echo $i['id']; ?>" hidden>
                                            <input type="text" name="txtNombre" id="" value="<?php echo $i['nombre']; ?>">
                                        </div>
                                        <div class="columnna">
                                            <label for="">Apellido Paterno</label>
                                            <input type="text" name="txtPaterno" id="" value="<?php echo $i['paterno']; ?>">
                                        </div>
                                        <div class="columnna">
                                            <label for="">Apellido Materno</label>
                                            <input type="text" name="txtMaterno" id="" value="<?php echo $i['materno']; ?>">
                                        </div>
                                        <div class="columnna">
                                            <label for="">Teléfono</label>
                                            <input type="tel" name="txtTelefono" id="" value="<?php echo $i['telefono']; ?>">
                                        </div>
                                        <div class="columnna">
                                            <label for="">Email</label>
                                            <input type="email" name="txtEmail" id="" value="<?php echo $i['email']; ?>">
                                        </div>
                                        <div class="columnna">
                                            <label for="">Nombre de usuario</label>
                                            <input type="text" name="txtUsuario" id="" value="<?php echo $i['username']; ?>">
                                        </div>
                                        <div class="columnna">
                                            <label for="">Password</label>
                                            <input type="password" name="txtPassword1" id="" value="<?php echo $i['password']; ?>">
                                        </div>
                                        <div class="columnna">
                                            <label for="">Confirmar password</label>
                                            <input type="password" name="txtPassword2" id="" value="<?php echo $i['password']; ?>">
                                        </div>
                                        <div class="columnna">
                                            <label for="">Rol de usuario</label>
                                            <select name="cmbRol" id="">
                                                <option value="<?php echo $i['rol_id']; ?>">
                                                    <?php
                                                    $rol = $i['rol_id'];
                                                    $sql2 = "SELECT nombre FROM roles WHERE id='$rol'";
                                                    $idRol = $obj->obtenerDatosEP($sql2);
                                                    foreach ($idRol as $r) {
                                                        echo $r['nombre'];
                                                    }
                                                    ?>
                                                </option>
                                                <?php
                                                $idUser = $i['id'];
                                                $sql3 = "SELECT ru.id as idRol, ru.nombre as rol from roles ru
                                    WHERE ru.id NOT IN(SELECT u.rol_id FROM usuarios u JOIN roles ru ON u.rol_id = ru.id
                                    WHERE u.id='$idUser')";
                                                $idRol = $obj->obtenerDatosEP($sql3);
                                                foreach ($idRol as $r) {
                                                ?>
                                                    <option value="<?php echo $r['idRol']; ?>"><?php echo $r['rol']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br> <br>
                                    <div>
                                        <input type="submit" value="Modificar" class="boton" name="btnRegistrar">
                                    </div>
                                </fieldset>
                    <?php
                            }
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </main>
</body>
<?php
include '../Clases/footer.php';
?>

</html>