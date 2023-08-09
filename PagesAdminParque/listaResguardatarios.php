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
    <title>Registro Vehicular</title>
</head>
<?php
include '../Clases/header.php';
include '../Clases/navAdmin.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <main class="contenedor" style="height: auto;">
        <div class="contenedor2">
            <div class="tble">
                <div class="outer-wrapper">
                    <div class="table-wrapper">
                        <table style="width: 100%">
                            <thead class="tbl">
                                <tr class="tabla-registros--fila__header">
                                    <th colspan="6">Resguardatarios registrados</th>
                                </tr>
                                <tr class="tabla-registros--fila__header">
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Paterno</th>
                                    <th>Materno</th>
                                    <th>Región asignada</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $obj = new MetodosAdmin();
                                $sql = "SELECT res.id_resguardatario AS resguardatario, res.nombre AS nombre, res.paterno AS paterno,
                                res.materno AS materno, reg.descripcion AS region FROM resguardatarios res JOIN region reg
                                ON res.region = reg.id_region";
                                $registros = $obj->obtenerDatos($sql);
                                foreach($registros as $row){
                                ?>
                                    <tr class="tabla-registros--fila">
                                        <td class="tabla-registros--columna"><?php echo $row['resguardatario']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['nombre']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['paterno']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['materno']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['region']; ?></td>
                                        <td class="tabla-registros--columna_icon"><a href="../PagesAdminParque/dialogResguardatario.php?id=<?php echo $row['resguardatario']; ?>"><img src="../logos/editar.png" alt=""></td>
                                    </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<?php
include '../Clases/footer.php';
?>

</html>