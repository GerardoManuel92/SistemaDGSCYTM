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
    <div class="container2">
        <div class="container__element">
            <h1>Listado de Elementos</h1>
            <div class="tble" style="margin: auto;">
                <div class="outer-wrapper">
                    <div class="table-wrapper">
                        <table style="width: 100%;">
                            <thead class="tbl">
                                <tr>
                                    <th class="th-datos" colspan="11">Datos generales</th>                                
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Marca</th>
                                    <th>Serie</th>
                                    <th>Modelo</th>
                                    <th>Color</th>
                                    <th>Material</th>
                                    <th>Mueble</th>
                                    <th>Inventario</th>
                                    <th>Fecha habricacion</th>
                                    <th>Estado uso</th>
                                    <th>Observaciones</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT a.id_control AS control, b.descripcion AS marca, c.descripcion AS serie, d.descripcion AS modelo, e.descripcion AS color,
                                        f.descripcion AS material, g.descripcion AS mueble, IFNULL(a.numero_inventario,'') AS inventario, a.fecha_fabricacion AS fecha,
                                        IFNULL(h.descripcion,'') as estado, a.observacion AS observacion FROM control_casco a JOIN marca b ON a.id_marca = b.id_marca 
                                        JOIN serie c ON c.id_serie = a.id_serie JOIN modelo d ON a.id_modelo = d.id_modelo JOIN color e ON a.id_color = e.id_color
                                        JOIN material f ON a.id_material = f.id_material JOIN nombre_mueble g ON a.id_mueble = g.id_mueble LEFT OUTER JOIN estado_uso h
                                        ON a.estado_uso = h.id_estado ORDER BY(a.id_control) ASC";
                                $query = $conn->obtenerDatosCascos($sql);
                                foreach ($query as $row) {
                                ?>
                                    <tr class="tabla-registros--fila">
                                        <td class="tabla-registros--columna"><?php echo $row['control']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['marca']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['serie']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['modelo']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['color']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['material']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['mueble']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['inventario']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['fecha']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['estado']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['observacion']; ?></td>                                       
                                    </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include '../Clases/footer.php';
?>
</html>