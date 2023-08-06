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
                <form action="#" id="formFiltro" class="formFiltro" method="POST">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Seleccione el tipo de gasolina</label>
                            <select name="cbOpcion" id="cbOpcion" onchange="validarOpcFiltro();">
                                <option value="0">Elige una opcion</option>
                                <option value="1">Diesel</option>
                                <option value="2">Magna</option>
                                <option value="3">Premium</option>
                            </select>
                            <p class="alert" id="alert"></p>
                        </div>
                    </div>
                </form>
                <br>
                <form action="../CRUD/updatePrecioGasolina.php" method="POST" id="form1">
                    <?php
                    $obj = new MetodosAdmin();                    
                    $sql = "SELECT id_gasolina, precio FROM tipo_gasolina WHERE descripcion='DIESEL'";
                    $datos = $obj->obtenerDatos($sql);
                    foreach ($datos as $d) {
                    ?>
                        <h1 class="h1-form">Gasolina Diesel</h1>
                        <br>
                        <fieldset>
                            <br>
                            <legend>Actualizar precio</legend>
                            <div class="fila">
                                <div class="columnna">
                                    <label for="">Precio</label>
                                    <input type="text" name="txtId" id="" hidden value="<?php echo $d['id_gasolina']; ?>">
                                    <input type="text" name="txtGasolina" id="" value="<?php echo $d['precio']; ?>">
                                </div>
                            </div>
                            <br> <br>
                            <div>
                                <input type="submit" value="Modificar" class="boton" name="btnRegistrar">
                            </div>
                            <br>
                        </fieldset>
                    <?php
                    }
                    ?>
                </form>
                <form action="../CRUD/updatePrecioGasolina.php" method="POST" id="form2">
                    <?php
                    $obj = new MetodosAdmin();                    
                    $sql = "SELECT id_gasolina, precio FROM tipo_gasolina WHERE descripcion='MAGNA'";
                    $datos = $obj->obtenerDatos($sql);
                    foreach ($datos as $d) {
                    ?>
                        <h1 class="h1-form">Gasolina Magna</h1>
                        <br>
                        <fieldset>
                            <br>
                            <legend>Actualizar precio</legend>
                            <div class="fila">
                                <div class="columnna">
                                    <label for="">Precio</label>
                                    <input type="text" name="txtId" id="" hidden value="<?php echo $d['id_gasolina']; ?>">
                                    <input type="text" name="txtGasolina" id="" value="<?php echo $d['precio']; ?>">
                                </div>
                            </div>
                            <br> <br>
                            <div>
                                <input type="submit" value="Modificar" class="boton" name="btnRegistrar">
                            </div>
                            <br>
                        </fieldset>
                    <?php
                    }
                    ?>
                </form>
                <form action="../CRUD/updatePrecioGasolina.php" method="POST" id="form3">
                    <?php
                    $obj = new MetodosAdmin();                    
                    $sql = "SELECT id_gasolina, precio FROM tipo_gasolina WHERE descripcion='PREMIUM'";
                    $datos = $obj->obtenerDatos($sql);
                    foreach ($datos as $d) {
                    ?>
                        <h1 class="h1-form">Gasolina Premium</h1>
                        <br>
                        <fieldset>
                            <br>
                            <legend>Actualizar precio</legend>
                            <div class="fila">
                                <div class="columnna">
                                    <label for="">Precio</label>
                                    <input type="text" name="txtId" id="" hidden value="<?php echo $d['id_gasolina']; ?>">
                                    <input type="text" name="txtGasolina" id="" value="<?php echo $d['precio']; ?>">
                                </div>
                            </div>
                            <br> <br>
                            <div>
                                <input type="submit" value="Modificar" class="boton" name="btnRegistrar">
                            </div>
                            <br>
                        </fieldset>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </main>
</body>
<script src="../JS/validaFormGasolinas.js"></script>
<?php
include '../Clases/footer.php';
?>
</html>