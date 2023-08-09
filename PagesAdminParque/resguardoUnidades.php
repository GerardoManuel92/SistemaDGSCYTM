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
            <div class="contenedor2__section" style="width: 35%;">
                <img src="../logos/piedrapochotes.png" alt="">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm" style="width: 65%;">
                <form action="#" id="formFiltro" class="formFiltro">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Tipo de listado</label>
                            <select name="cbOpcion" id="cbOpcion" onchange="validarOpcFiltro();">
                                <option value="0">Elige una opcion</option>
                                <option value="1">Por economicos</option>
                                <option value="2">Por id progresivo</option>
                            </select>
                            <p class="alert" id="alert"></p>
                        </div>
                    </div>
                </form>
                <form action="#" method="POST" id="form1">
                    <div class="tble">
                        <div class="outer-wrapper">
                            <div class="table-wrapper">
                                <table style="width: 100%">
                                    <thead class="tbl">
                                        <tr class="tabla-registros--fila__header">
                                            <th colspan="5">Lista de ecos y resguardatarios</th>
                                        </tr>
                                        <tr class="tabla-registros--fila__header">
                                            <th>No.</th>
                                            <th>Eco</th>
                                            <th>Region</th>
                                            <th>Responsable</th>
                                            <th>Modificar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $obj = new MetodosAdmin();
                                        $sql = "SELECT re.id_resguardo AS resguardo, e.descripcion AS eco, reg.descripcion AS region,  resg.nombre as nombre, resg.paterno as paterno, resg.materno as materno
                                FROM resguardo_ecos re JOIN eco e ON re.eco = e.id_eco JOIN resguardatarios resg ON re.resguardatario = resg.id_resguardatario
                                JOIN region reg ON resg.region = reg.id_region ORDER BY(resguardo) ASC";
                                        $registros = $obj->obtenerDatos($sql);
                                        foreach ($registros as $row) {
                                        ?>
                                            <tr class="tabla-registros--fila">
                                                <td class="tabla-registros--columna"><?php echo $row['resguardo']; ?></td>
                                                <td class="tabla-registros--columna"><?php echo $row['eco']; ?></td>
                                                <td class="tabla-registros--columna"><?php echo $row['region']; ?></td>
                                                <td class="table-registros--columna"><?php echo $row['nombre'] . ' ' . $row['paterno'] . ' ' . $row['materno']; ?></td>
                                                <td class="tabla-registros--columna_icon"><a href="../PagesAdminParque/dialogResguardoEco.php?id=<?php echo $row['resguardo']?>"><img src="../logos/editar.png" alt="" style="width: 30px; height: 30px;"></td>
                                            </tr>
                                    </tbody>
                                <?php } ?>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="#" method="POST" id="form2">
                <div class="tble">
                        <div class="outer-wrapper">
                            <div class="table-wrapper">
                                <table style="width: 100%">
                                    <thead class="tbl">
                                        <tr class="tabla-registros--fila__header">
                                            <th colspan="5">Lista de progresivos y resguardatarios</th>
                                        </tr>
                                        <tr class="tabla-registros--fila__header">
                                            <th>No.</th>
                                            <th>Progresivo</th>
                                            <th>Region</th>
                                            <th>Responsable</th>
                                            <th>Modificar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $obj = new MetodosAdmin();
                                        $sql = "SELECT re.id_resguardo AS resguardo, ru.id_progresivo AS progresivo, reg.descripcion AS region,  resg.nombre as nombre, resg.paterno as paterno, resg.materno as materno
                                        FROM resguardo_progresivos re JOIN registro_unidades ru ON re.progresivo = ru.id_progresivo JOIN resguardatarios resg ON re.resguardatario = resg.id_resguardatario
                                        JOIN region reg ON resg.region = reg.id_region ORDER BY(resguardo) ASC";
                                        $registros = $obj->obtenerDatos($sql);
                                        foreach ($registros as $row) {
                                        ?>
                                            <tr class="tabla-registros--fila">
                                                <td class="tabla-registros--columna"><?php echo $row['resguardo']; ?></td>
                                                <td class="tabla-registros--columna"><?php echo $row['progresivo']; ?></td>
                                                <td class="tabla-registros--columna"><?php echo $row['region']; ?></td>
                                                <td class="table-registros--columna"><?php echo $row['nombre'] . ' ' . $row['paterno'] . ' ' . $row['materno']; ?></td>
                                                <td class="tabla-registros--columna_icon"><a href="../PagesAdminParque/dialogResguardoProgresivo.php?id=<?php echo $row['resguardo']?>"><img src="../logos/editar.png" alt="" style="width: 30px; height: 30px;"></td>
                                            </tr>
                                    </tbody>
                                <?php } ?>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>                                            
                </form>

            </div>
        </div>
    </main>
</body>
<script src="../JS/validaFormResguardos.js"></script>
<?php
include '../Clases/footer.php';
?>

</html>