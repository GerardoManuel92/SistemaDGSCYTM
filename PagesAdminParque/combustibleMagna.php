<?php
require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';
$inst = new Conexion();
$conn = $inst->conectarParque();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Registro Magna</title>
</head>
<?php
include '../Clases/header.php';
include '../Clases/navAdmin.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <main class="contenedor" style="height: auto;">
        <div class="contenedor2">
            <div class="contenedor2__section contenedor2__sectionForm" style="width: auto; height: 100%;">
                <form action="#" method="POST" style="display:flex; height: 100px; justify-content: center;">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Seleccione numero económico</label>
                            <select name="cbOpcion" id="" style="width: 200px;">
                                <?php
                                $obj = new MetodosAdmin();
                                $sql = "SELECT * FROM eco ORDER BY(id_eco) ASC";
                                $ecos = $obj->obtenerDatos($sql);
                                foreach ($ecos as $ec) {
                                ?>
                                    <option value="<?php echo $ec['id_eco']; ?>"><?php echo $ec['descripcion']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="columna">
                            <br>
                            <input type="submit" value="Buscar" name="btnBuscar" class="boton" style="width: 300px;">
                        </div>
                    </div>
                </form>
                <br>
                <form action="../CRUD/insertRegMagna.php" method="POST" style="height: auto;" id="formCombustible">
                    <fieldset>
                        <legend>Complete el formulario</legend>

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $LlenarFormulario = $_POST['btnBuscar'];

                            if (isset($LlenarFormulario)) {
                                $ideEco = $_POST['cbOpcion'];
                                if ($ideEco === '0') {
                        ?>
                                    <h2 style="text-align: center; color:#631133;">Opción no válida</h2>
                                    <?php
                                } else {


                                    $consulta2 = "SELECT id_control, kilometraje2, tanque2 FROM control_combustible WHERE id_eco='$ideEco'
                    ORDER BY(id_control) DESC LIMIT 1";
                                    $querie2 = mysqli_query($conn, $consulta2);

                                    $consulta = "SELECT re.eco as idEco, resg.id_resguardatario as idResg, resg.nombre as nombre, 
                    resg.paterno as paterno, resg.materno as materno, rg.descripcion as region
                    FROM resguardatarios resg JOIN resguardo_ecos re ON re.resguardatario=resg.id_resguardatario
                    JOIN region rg ON resg.region = rg.id_region AND re.eco='$ideEco';";
                                    $querie = mysqli_query($conn, $consulta);

                                    if ($x = mysqli_fetch_assoc($querie)) {

                                    ?>
                                        <div class="fila" style="display: grid; grid-template-columns: repeat(4, 1fr);">
                                            <div class="columna">
                                                <label for="">Eco </label>
                                                <input type="text" id="id_control" name="txtidEco" value="<?php echo $x['idEco']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Id resguardatario</label>
                                                <input type="text" id="id_resg" name="id_resg" value="<?php echo $x['idResg']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Nombre completo</label>
                                                <input type="text" id="txtNombre" name="txtNombre" value="<?php echo $x['nombre'] . ' ' . $x['paterno'] . ' ' . $x['materno']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Región</label>
                                                <input type="text" id="txtRegion" name="txtRegion" value="<?php echo $x['region']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Id Control </label>
                                                <?php
                                                $sql = "SELECT MAX(id_control)+1 AS id FROM (control_combustible)";
                                                $query = mysqli_query($conn, $sql);
                                                while ($idControl = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <input type="text" id="id_control" value="<?php echo $idControl['id']; ?>" readonly>
                                                <?php } ?>
                                            </div>
                                            <div class="columna">
                                                <label for="">Precio por litro</label>
                                                <?php
                                                $sql = "SELECT precio FROM tipo_gasolina WHERE descripcion='MAGNA'";
                                                $query = mysqli_query($conn, $sql);
                                                while ($price = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <input type="text" id="precio_litro" name="precio_litro" value="<?php echo $price['precio']; ?>" readonly>
                                                <?php } ?>
                                            </div>
                                            <div class="columna">
                                                <div class="columna">
                                                    <label for="">Litros de Gasolina <span style="color: #631133; font-size: 20px;">*</span> </label>
                                                    <input type="text" id="litros_gasolina" name="litros" onchange="cargaPrecio();">
                                                </div>
                                            </div>
                                            <div class="columna">
                                                <label for="">Ubicación <span style="color: #631133; font-size: 20px;">*</span> </label>
                                                <select id="id_ubicacion" name="id_ubicacion">
                                                    <option value="0">--Seleccionar--</option>
                                                    <?php
                                                    $sql = "SELECT * FROM ubicacion";
                                                    $query = mysqli_query($conn, $sql);

                                                    while ($idUbicacion = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                        <option value="<?php echo $idUbicacion['id_ubicacion']; ?>"><?php echo $idUbicacion['descripcion']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="columna">
                                                <label for="">Fecha de registro <span style="color: #631133; font-size: 20px;">*</span> </label>
                                                <input type="date" name="fecha" id="fecha">
                                            </div>
                                            <?php
                                            if ($y = mysqli_fetch_assoc($querie2)) {
                                            ?>
                                                <div class="columna">
                                                    <label for="">Kilomatraje anterior</label>
                                                    <input type="text" id="kilometraje" name="kilometraje" value="<?php echo $y['kilometraje2']; ?>" readonly>
                                                </div>
                                                <div class="columna">
                                                    <label for="">Tanque anterior</label>
                                                    <input type="text" id="tanque" name="tanque" value="<?php echo $y['tanque2']; ?>" readonly>
                                                </div>
                                            <?php } else {
                                            ?>
                                                <div class="columna">
                                                    <label for="">Kilomatraje anterior</label>
                                                    <input type="text" id="kilometraje" name="kilometraje" value="<?php echo '0' ?>" readonly>
                                                </div>
                                                <div class="columna">
                                                    <label for="">Tanque anterior</label>
                                                    <input type="text" id="tanque" name="tanque" value="<?php echo 'S/D' ?>" readonly>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="columna">
                                                <label for="">Kilometraje actual <span style="color: #631133; font-size: 20px;">*</span> </label>
                                                <input type="text" id="kilometraje_nvo" name="kilometraje_nvo">
                                            </div>
                                            <div class="columna">
                                                <label for="">No. Bomba <span style="color: #631133; font-size: 20px;">*</span> </label>
                                                <input type="text" id="no. bomba" name="bomba">
                                            </div>
                                            <div class="columna">
                                                <label for="">Tanque actual <span style="color: #631133; font-size: 20px;">*</span> </label>
                                                <input type="text" id="tanque_nvo" name="tanque_nvo">
                                            </div>
                                            <div class="columna">
                                                <label for="">Precio_ticket</label>
                                                <input type="text" name="precio_ticket" id="precio_ticket" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Folio ticket</label>
                                                <input type="text" id="folio_ticket" name="folio_ticket">
                                            </div>
                                            <div class="columna">
                                                <label for="">Observaciones</label>
                                                <textarea name="observaciones" id="observaciones" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="columna"></div>
                                            <div class="columna">
                                                <br>
                                                <a href="../PagesAdminParque/MenuCombustible.php" class="boton">Regresar</a>
                                            </div>
                                            <div class="columna">
                                                <br>
                                                <input type="submit" value="Registrar" name="btnGuardar" class="boton">
                                            </div>
                                        </div>                                        
                                    <?php

                                    } else {
                                    ?>
                                        <div class="fila" style="display: grid; grid-template-columns: repeat(4, 1fr);">
                                            <div class="columna">
                                                <label for="">Eco </label>
                                                <input type="text" id="id_control" name="txtidEco" value="<?php echo $ideEco; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Id resguardatario</label>
                                                <input type="text" id="id_resg" name="id_resg" value="<?php echo '32'; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Nombre completo</label>
                                                <input type="text" id="txtNombre" name="txtNombre" value="<?php echo 'S/N' ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Región</label>
                                                <input type="text" id="txtRegion" name="txtRegion" value="<?php echo 'SIN REGIÓN'; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Id Control </label>
                                                <?php
                                                $sql = "SELECT MAX(id_control)+1 AS id FROM (control_combustible)";
                                                $query = mysqli_query($conn, $sql);
                                                while ($idControl = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <input type="text" id="id_control" value="<?php echo $idControl['id']; ?>" readonly>
                                                <?php } ?>
                                            </div>
                                            <div class="columna">
                                                <label for="">Precio por litro</label>
                                                <?php
                                                $sql = "SELECT precio FROM tipo_gasolina WHERE descripcion='MAGNA'";
                                                $query = mysqli_query($conn, $sql);
                                                while ($price = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <input type="text" id="precio_litro" name="precio_litro" value="<?php echo $price['precio']; ?>" readonly>
                                                <?php } ?>
                                            </div>
                                            <div class="columna">
                                                <div class="columna">
                                                    <label for="">Litros de Gasolina<span style="color: #631133; font-size: 20px;">*</label>
                                                    <input type="text" id="litros_gasolina" name="litros" onchange="cargaPrecio();">
                                                </div>
                                            </div>
                                            <div class="columna">
                                                <label for="">Ubicación<span style="color: #631133; font-size: 20px;">*</label>
                                                <select id="id_ubicacion" name="id_ubicacion">
                                                    <option value="0">--Seleccionar--</option>
                                                    <?php
                                                    $sql = "SELECT * FROM ubicacion";
                                                    $query = mysqli_query($conn, $sql);

                                                    while ($idUbicacion = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                        <option value="<?php echo $idUbicacion['id_ubicacion']; ?>"><?php echo $idUbicacion['descripcion']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="columna">
                                                <label for="">Fecha de registro<span style="color: #631133; font-size: 20px;">*</label>
                                                <input type="date" name="fecha" id="fecha">
                                            </div>
                                            <?php
                                            if ($y = mysqli_fetch_assoc($querie2)) {
                                            ?>
                                                <div class="columna">
                                                    <label for="">Kilomatraje anterior</label>
                                                    <input type="text" id="kilometraje" name="kilometraje" value="<?php echo $y['kilometraje2']; ?>" readonly>
                                                </div>
                                                <div class="columna">
                                                    <label for="">Tanque anterior</label>
                                                    <input type="text" id="tanque" name="tanque" value="<?php echo $y['tanque2']; ?>" readonly>
                                                </div>
                                            <?php } else {
                                            ?>
                                                <div class="columna">
                                                    <label for="">Kilomatraje anterior</label>
                                                    <input type="text" id="kilometraje" name="kilometraje" value="<?php echo '0' ?>" readonly>
                                                </div>
                                                <div class="columna">
                                                    <label for="">Tanque anterior</label>
                                                    <input type="text" id="tanque" name="tanque" value="<?php echo 'S/D' ?>" readonly>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <div class="columna">
                                                <label for="">Kilometraje actual<span style="color: #631133; font-size: 20px;">*</label>
                                                <input type="text" id="kilometraje_nvo" name="kilometraje_nvo">
                                            </div>
                                            <div class="columna">
                                                <label for="">No. Bomba<span style="color: #631133; font-size: 20px;">*</label>
                                                <input type="text" id="no. bomba" name="bomba">
                                            </div>
                                            <div class="columna">
                                                <label for="">Tanque actual<span style="color: #631133; font-size: 20px;">*</label>
                                                <input type="text" id="tanque_nvo" name="tanque_nvo">
                                            </div>
                                            <div class="columna">
                                                <label for="">Precio_ticket</label>
                                                <input type="text" name="precio_ticket" id="precio_ticket" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Folio ticket</label>
                                                <input type="text" id="folio_ticket" name="folio_ticket">
                                            </div>
                                            <div class="columna">
                                                <label for="">Observaciones</label>
                                                <textarea name="observaciones" id="observaciones" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="columna"></div>
                                            <div class="columna">
                                                <br>
                                                <a href="../PagesAdminParque/MenuCombustible.php" class="boton">Regresar</a>
                                            </div>
                                            <div class="columna">
                                                <br>
                                                <input type="submit" value="Registrar" name="btnGuardar" class="boton">
                                            </div>
                                        </div>
                                        
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <script src="../JS/calculoCosto.js"></script>
</body>
<?php
include '../Clases/footer.php';
?>

</html>