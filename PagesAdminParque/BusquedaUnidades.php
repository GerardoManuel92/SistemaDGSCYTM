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
            <div class="contenedor2__section contenedor2__sectionForm" style="width: 95%;">
                <form action="#" style="height: 100px;" method="POST">
                    <div class="fila" style="display: flex; justify-content: center; align-items: center;">
                        <div class="columna" style="flex-direction: row; margin-top: 30px;">
                            <label for="">Buscar por: </label>
                            <select name="cbOpcion" id="">
                                <option value="0">--Seleccione--</option>
                                <option value="1">Economico</option>
                                <option value="2">Serie</option>
                            </select>
                            <input type="text" name="txtValor" id="" placeholder="Ingrese el valor a buscar" style="width: 400px;">
                            <input type="submit" value="Buscar" class="boton" name="btnBuscar">
                        </div>
                    </div>
                </form>
                <form action="" method="POST">
                    <h1>Registro Vehicular</h1>
                    <fieldset>
                        <legend>Complete el formulario</legend>
                        <?php
                        global $datos;
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $btnBusqueda = $_POST['btnBuscar'];
                            if (isset($btnBusqueda)) {
                                $opcion = $_POST['cbOpcion'];
                                $valor = $_POST['txtValor'];
                                $obj = new MetodosAdmin();
                                if ($opcion === '1') {
                                    $sql = "SELECT u.id_progresivo AS id, u.no_placas AS placas, u.no_factura AS factura, IFNULL(u.fecha_factura,'SIN FECHA') AS fecha_factura, u.costo AS costo, u.inventario AS inventario, t.descripcion AS tipo_bien, e.descripcion AS estado_uso, p.nombre_proveedor AS proveedor, m.descripcion as marca, s.descripcion AS submarca, u.modelo AS modelo, ec.descripcion as ECO, u.serie as serie, IFNULL(u.observaciones,'No hay observaciones') AS observaciones, u.motor as motor, r.descripcion as region, IFNULL(u.sector,'NO HAY DATOS') AS sector, IFNULL(u.cuadrante,'NO HAY DATOS') AS cuadrante
                                FROM registro_unidades u JOIN tipo_unidad t ON u.id_tipo = t.id_tipo INNER JOIN estado_uso e ON u.id_estado = e.id_estado
                                INNER JOIN proveedor p ON u.id_proveedor = p.id_proveedor INNER JOIN submarca s ON u.id_submarca = s.id_submarca
                                INNER JOIN marca_vehiculos m ON s.id_marca = m.id_marca INNER JOIN marca_unidades mu ON  mu.id_tipo_unidad = t.id_tipo AND mu.id_marca = m.id_marca
                                INNER JOIN eco ec ON u.id_eco = ec.id_eco INNER JOIN registro_regiones rr
                                ON rr.id_progresivo = u.id_progresivo  INNER JOIN region r ON rr.id_region = r.id_region
                                AND u.id_eco='$valor' ORDER BY u.id_progresivo ASC";
                                    $datos = $obj->obtenerDatos($sql);

                                    foreach ($datos as $d) {
                        ?>
                                        <div class="fila" style="grid-template-columns: repeat(4, 1fr);">
                                            <div class="columnna">
                                                <label for="">Progresivo</label>
                                                <input type="text" name="txtProgresivo" id="" value="<?php echo $d['id']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Motor</label>
                                                <input type="text" name="txtMotor" id="" value="<?php echo $d['motor']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Costo</label>
                                                <input type="text" name="txtCosto" id="" value="<?php echo $d['costo']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Inventario</label>
                                                <input type="tel" name="txtInventario" id="" value="<?php echo $d['inventario']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Factura</label>
                                                <input type="email" name="txtFactura" id="" value="<?php echo $d['factura']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Placas</label>
                                                <input type="text" name="txtPlaca" id="" value="<?php echo $d['placas']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Serie</label>
                                                <input type="text" name="txtSerie" id="" value="<?php echo $d['serie']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Modelo</label>
                                                <input type="text" name="txtModelo" id="" value="<?php echo $d['modelo']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Fecha factura</label>
                                                <input type="text" name="txtFecha" id="" value="<?php echo $d['fecha_factura']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Estado de uso</label>
                                                <input type="text" name="txtIdEstado" value="<?php echo $d['estado_uso']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Proveedor</label>
                                                <input type="text" name="txtIdProveedor" value="<?php echo $d['proveedor']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Tipo de unidad</label>
                                                <input type="text" name="txtIdProveedor" value="<?php echo $d['tipo_bien']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Economico</label>
                                                <input type="text" value="<?php echo $d['ECO']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Marca y submarca</label>
                                                <input type="text" name="txtSubmarca" value="<?php echo $d['marca'] . ' ' . $d['submarca']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Región</label>
                                                <input type="text" name="txtIdRegion" value="<?php echo $d['region']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Sector</label>
                                                <input type="text" name="txtSector" id="" value="<?php echo $d['sector']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Cuadrante</label>
                                                <input type="text" name="txtCuadrante" id="" value="<?php echo $d['cuadrante']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Observaciones</label>
                                                <textarea name="txtObservacion" id="" cols="30" rows="10"><?php echo $d['observaciones']; ?></textarea>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                                if ($opcion === '2') {
                                    $sql = "SELECT u.id_progresivo AS id, u.no_placas AS placas, u.no_factura AS factura, IFNULL(u.fecha_factura,'SIN FECHA') AS fecha_factura, u.costo AS costo, u.inventario AS inventario, t.descripcion AS tipo_bien, e.descripcion AS estado_uso, p.nombre_proveedor AS proveedor, m.descripcion as marca, s.descripcion AS submarca, u.modelo AS modelo, ec.descripcion as ECO, u.serie as serie, IFNULL(u.observaciones,'No hay observaciones') AS observaciones, u.motor as motor, r.descripcion as region, IFNULL(u.sector,'NO HAY DATOS') AS sector, IFNULL(u.cuadrante,'NO HAY DATOS') AS cuadrante
                                FROM registro_unidades u JOIN tipo_unidad t ON u.id_tipo = t.id_tipo INNER JOIN estado_uso e ON u.id_estado = e.id_estado
                                INNER JOIN proveedor p ON u.id_proveedor = p.id_proveedor INNER JOIN submarca s ON u.id_submarca = s.id_submarca
                                INNER JOIN marca_vehiculos m ON s.id_marca = m.id_marca INNER JOIN marca_unidades mu ON  mu.id_tipo_unidad = t.id_tipo AND mu.id_marca = m.id_marca
                                INNER JOIN eco ec ON u.id_eco = ec.id_eco INNER JOIN registro_regiones rr
                                ON rr.id_progresivo = u.id_progresivo  INNER JOIN region r ON rr.id_region = r.id_region
                                AND u.serie='$valor' ORDER BY u.id_progresivo ASC";
                                    $datos = $obj->obtenerDatos($sql);

                                    foreach ($datos as $d) {
                                    ?>
                                        <div class="fila" style="grid-template-columns: repeat(4, 1fr);">
                                            <div class="columnna">
                                                <label for="">Progresivo</label>
                                                <input type="text" name="txtProgresivo" id="" value="<?php echo $d['id']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Motor</label>
                                                <input type="text" name="txtMotor" id="" value="<?php echo $d['motor']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Costo</label>
                                                <input type="text" name="txtCosto" id="" value="<?php echo $d['costo']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Inventario</label>
                                                <input type="tel" name="txtInventario" id="" value="<?php echo $d['inventario']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Factura</label>
                                                <input type="email" name="txtFactura" id="" value="<?php echo $d['factura']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Placas</label>
                                                <input type="text" name="txtPlaca" id="" value="<?php echo $d['placas']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Serie</label>
                                                <input type="text" name="txtSerie" id="" value="<?php echo $d['serie']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Modelo</label>
                                                <input type="text" name="txtModelo" id="" value="<?php echo $d['modelo']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Fecha factura</label>
                                                <input type="text" name="txtFecha" id="" value="<?php echo $d['fecha_factura']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Estado de uso</label>
                                                <input type="text" name="txtIdEstado" value="<?php echo $d['estado_uso']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Proveedor</label>
                                                <input type="text" name="txtIdProveedor" value="<?php echo $d['proveedor']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Tipo de unidad</label>
                                                <input type="text" name="txtIdProveedor" value="<?php echo $d['tipo_bien']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Economico</label>
                                                <input type="text" value="<?php echo $d['ECO']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Marca y submarca</label>
                                                <input type="text" name="txtSubmarca" value="<?php echo $d['marca'] . ' ' . $d['submarca']; ?>" readonly>
                                            </div>
                                            <div class="columnna">
                                                <label for="">Región</label>
                                                <input type="text" name="txtIdRegion" value="<?php echo $d['region']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Sector</label>
                                                <input type="text" name="txtSector" id="" value="<?php echo $d['sector']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Cuadrante</label>
                                                <input type="text" name="txtCuadrante" id="" value="<?php echo $d['cuadrante']; ?>" readonly>
                                            </div>
                                            <div class="columna">
                                                <label for="">Observaciones</label>
                                                <textarea name="txtObservacion" id="" cols="30" rows="10"><?php echo $d['observaciones']; ?></textarea>
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
</body>
<?php
include '../Clases/footer.php';
?>

</html>