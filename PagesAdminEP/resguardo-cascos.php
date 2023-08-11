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
            <div class="tble" style="margin-bottom: 5rem;">
                <div class="outer-wrapper">
                    <div class="table-wrapper">
                        <table style="width: 50%; margin: auto;">
                            <thead class="tbl">
                                <tr>
                                    <th class="th-datos" colspan="5">Datos generales</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Marca</th>
                                    <th>Serie</th>
                                    <th>Talla</th>
                                    <th>Imagen</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT a.id_casco AS id, b.descripcion AS marca, c.id_serie AS serie, d.descripcion AS talla, a.imagen as imagen
                                    FROM casco a JOIN marca b ON a.id_marca = b.id_marca JOIN serie c ON a.id_serie = c.id_serie JOIN talla d ON a.id_talla = d.id_talla
                                    ORDER BY(a.id_casco) ASC";
                                $query = $conn->obtenerDatosCascos($sql);
                                foreach ($query as $row) {
                                ?>
                                    <tr class="tabla-registros--fila">
                                        <td class="tabla-registros--columna"><?php echo $row['id']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['marca']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['serie']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['talla']; ?></td>
                                        <td class="tabla-registros--columna"><img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>" alt="Imagen1"></td>                                        
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