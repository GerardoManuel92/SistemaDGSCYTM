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
    <main class="contenedor" style="height: auto;">
        <div class="contenedor2">
            <div class="contenedor2__section" style="width: 0;">
                <img src="../logos/piedrapochotes.png" alt="" style="width: 600px; height: 700px;">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm" style="width: 100%;">
                <form action="#" id="formFiltro" class="formFiltro">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Seleccione el tipo de combustible</label>
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
                <br><br>
                <form action="#" method="POST" id="formBusqueda" class="formBusqueda" style="height: 100px;">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Eco</label>
                            <select name="cbEco" id="">
                                <?php
                                $obj = new MetodosAdmin();
                                $sql = "SELECT * FROM eco ORDER BY(id_eco) ASC";
                                $eco = $obj->obtenerDatos($sql);
                                foreach ($eco  as $e) {
                                ?>
                                    <option value="<?php echo $e['id_eco'] ?>"><?php echo $e['descripcion'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="">.</label>
                            <input type="submit" value="Buscar" class="boton" name="btnBuscar">
                        </div>
                    </div>
                </form>
                <form action="#" method="POST" id="form1">
                    <h1 class="h1-form">Gasolina Diesel</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila" style="grid-template-columns: repeat(3,1fr);">
                            <div class="columnna">
                                <label for="">Precio $</label>
                                <?php
                                $obj = new MetodosAdmin();
                                $sql = "SELECT precio FROM tipo_gasolina WHERE descripcion='DIESEL'";
                                $precioDiesel = $obj->obtenerDatos($sql);
                                foreach ($precioDiesel as $diesel) {
                                ?>
                                    <input type="text" name="txtPrecio" id="txtPrecio" value="<?php echo $diesel['precio'] ?>">
                                <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Id Eco</label>
                                <input type="text" name="txtEco" id="">
                            </div>
                            <div class="columna">
                                <label for="">Id resguardatario</label>
                                <input type="text" name="txtIdresg" id="">
                            </div>
                            <div class="columna">
                                <label for="">Nombre</label>
                                <input type="text" name="txtNomResg" id="">
                            </div>
                            <div class="columna">
                                <label for="">Id control</label>
                                <input type="text" name="txtIdControl" id="">
                            </div>
                            <div class="columna">
                                <label for="">Litros cargados</label>
                                <input type="text" name="txtLitros" id="">
                            </div>
                            <div class="columna">
                                <label for="">Ubicacion</label>
                                <select name="cbEco" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM ubicacion ORDER BY(id_ubicacion) ASC";
                                    $ubicacion = $obj->obtenerDatos($sql);
                                    foreach ($ubicacion  as $u) {
                                    ?>
                                        <option value="<?php echo $u['id_ubicacion'] ?>"><?php echo $u['descripcion'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Fecha de registro</label>
                                <input type="date" name="txtFecha" id="">
                            </div>
                            <div class="columna">
                                <label for="">Kilometraje anterior</label>
                                <input type="text" name="txtKiloAnterior" id="">
                            </div>
                            <div class="columna">
                                <label for="">Tanque anterior</label>
                                <input type="text" name="txtTanqueAnterior" id="">
                            </div>
                            <div class="columna">
                                <label for="">Kilometraje actual</label>
                                <input type="text" name="txtKiloNuevo" id="">
                            </div>
                            <div class="columna">
                                <label for="">Tanque actual</label>
                                <input type="text" name="txtTanqueNuevo" id="">
                            </div>
                            <div class="columna">
                                <label for="">Bomba</label>
                                <input type="text" name="txtBomba" id="">
                            </div>
                            <div class="columna">
                                <label for="">Precio ticket</label>
                                <input type="text" name="txtPrecioTicket" id="">
                            </div>
                            <div class="columna">
                                <label for="">Folio ticket</label>
                                <input type="text" name="txtFolio" id="">
                            </div>
                            <div class="columna">
                                <label for="">Observaciones</label>
                                <textarea name="txtObservaciones" id="" cols="30" rows="10"></textarea>
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
                    <h1 class="h1-form">Gasolina Magna</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila" style="grid-template-columns: repeat(3,1fr);">
                            <div class="columnna">
                                <label for="">Precio $</label>
                                <?php
                                $obj = new MetodosAdmin();
                                $sql = "SELECT precio FROM tipo_gasolina WHERE descripcion='MAGNA'";
                                $precioDiesel = $obj->obtenerDatos($sql);
                                foreach ($precioDiesel as $diesel) {
                                ?>
                                    <input type="text" name="txtPrecio" id="txtPrecio" value="<?php echo $diesel['precio'] ?>">
                                <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Eco</label>
                                <select name="cbEco" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM eco ORDER BY(id_eco) ASC";
                                    $eco = $obj->obtenerDatos($sql);
                                    foreach ($eco  as $e) {
                                    ?>
                                        <option value="<?php echo $e['id_eco'] ?>"><?php echo $e['descripcion'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Id resguardatario</label>
                                <input type="text" name="txtIdresg" id="">
                            </div>
                            <div class="columna">
                                <label for="">Nombre</label>
                                <input type="text" name="txtNomResg" id="">
                            </div>
                            <div class="columna">
                                <label for="">Id control</label>
                                <input type="text" name="txtIdControl" id="">
                            </div>
                            <div class="columna">
                                <label for="">Litros cargados</label>
                                <input type="text" name="txtLitros" id="">
                            </div>
                            <div class="columna">
                                <label for="">Ubicacion</label>
                                <select name="cbEco" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM ubicacion ORDER BY(id_ubicacion) ASC";
                                    $ubicacion = $obj->obtenerDatos($sql);
                                    foreach ($ubicacion  as $u) {
                                    ?>
                                        <option value="<?php echo $u['id_ubicacion'] ?>"><?php echo $u['descripcion'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Fecha de registro</label>
                                <input type="date" name="txtFecha" id="">
                            </div>
                            <div class="columna">
                                <label for="">Kilometraje anterior</label>
                                <input type="text" name="txtKiloAnterior" id="">
                            </div>
                            <div class="columna">
                                <label for="">Tanque anterior</label>
                                <input type="text" name="txtTanqueAnterior" id="">
                            </div>
                            <div class="columna">
                                <label for="">Kilometraje actual</label>
                                <input type="text" name="txtKiloNuevo" id="">
                            </div>
                            <div class="columna">
                                <label for="">Tanque actual</label>
                                <input type="text" name="txtTanqueNuevo" id="">
                            </div>
                            <div class="columna">
                                <label for="">Bomba</label>
                                <input type="text" name="txtBomba" id="">
                            </div>
                            <div class="columna">
                                <label for="">Precio ticket</label>
                                <input type="text" name="txtPrecioTicket" id="">
                            </div>
                            <div class="columna">
                                <label for="">Folio ticket</label>
                                <input type="text" name="txtFolio" id="">
                            </div>
                            <div class="columna">
                                <label for="">Observaciones</label>
                                <textarea name="txtObservaciones" id="" cols="30" rows="10"></textarea>
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
                    <h1 class="h1-form">Gasolina Premium</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila" style="grid-template-columns: repeat(3,1fr);">
                            <div class="columnna">
                                <label for="">Precio $</label>
                                <?php
                                $obj = new MetodosAdmin();
                                $sql = "SELECT precio FROM tipo_gasolina WHERE descripcion='PREMIUM'";
                                $precioDiesel = $obj->obtenerDatos($sql);
                                foreach ($precioDiesel as $diesel) {
                                ?>
                                    <input type="text" name="txtPrecio" id="txtPrecio" value="<?php echo $diesel['precio'] ?>">
                                <?php } ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Eco</label>
                                <select name="cbEco" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM eco ORDER BY(id_eco) ASC";
                                    $eco = $obj->obtenerDatos($sql);
                                    foreach ($eco  as $e) {
                                    ?>
                                        <option value="<?php echo $e['id_eco'] ?>"><?php echo $e['descripcion'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Id resguardatario</label>
                                <input type="text" name="txtIdresg" id="">
                            </div>
                            <div class="columna">
                                <label for="">Nombre</label>
                                <input type="text" name="txtNomResg" id="">
                            </div>
                            <div class="columna">
                                <label for="">Id control</label>
                                <input type="text" name="txtIdControl" id="">
                            </div>
                            <div class="columna">
                                <label for="">Litros cargados</label>
                                <input type="text" name="txtLitros" id="">
                            </div>
                            <div class="columna">
                                <label for="">Ubicacion</label>
                                <select name="cbEco" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM ubicacion ORDER BY(id_ubicacion) ASC";
                                    $ubicacion = $obj->obtenerDatos($sql);
                                    foreach ($ubicacion  as $u) {
                                    ?>
                                        <option value="<?php echo $u['id_ubicacion'] ?>"><?php echo $u['descripcion'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="columna">
                                <label for="">Fecha de registro</label>
                                <input type="date" name="txtFecha" id="">
                            </div>
                            <div class="columna">
                                <label for="">Kilometraje anterior</label>
                                <input type="text" name="txtKiloAnterior" id="">
                            </div>
                            <div class="columna">
                                <label for="">Tanque anterior</label>
                                <input type="text" name="txtTanqueAnterior" id="">
                            </div>
                            <div class="columna">
                                <label for="">Kilometraje actual</label>
                                <input type="text" name="txtKiloNuevo" id="">
                            </div>
                            <div class="columna">
                                <label for="">Tanque actual</label>
                                <input type="text" name="txtTanqueNuevo" id="">
                            </div>
                            <div class="columna">
                                <label for="">Bomba</label>
                                <input type="text" name="txtBomba" id="">
                            </div>
                            <div class="columna">
                                <label for="">Precio ticket</label>
                                <input type="text" name="txtPrecioTicket" id="">
                            </div>
                            <div class="columna">
                                <label for="">Folio ticket</label>
                                <input type="text" name="txtFolio" id="">
                            </div>
                            <div class="columna">
                                <label for="">Observaciones</label>
                                <textarea name="txtObservaciones" id="" cols="30" rows="10"></textarea>
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
<script src="../JS/validaFormRegCombustible.js"></script>
<?php
include '../Clases/footer.php';
?>

</html>