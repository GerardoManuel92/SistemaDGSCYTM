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
include '../EquipamientoPolicial/navUser.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <div class="container2" style="height: auto;">
        <div class="container__element">
            <h1 class="h1" style="text-align: center; color: #631133;">Listado de Elementos</h1>
            <form action="#" method="POST" id="formFiltro" style="margin-left: auto; width: 75%;">
                <fieldset style="height: 150px; display: flex; flex-direction: row; width: 70%;">
                    <legend>Por favor llene el formulario</legend>
                    <div class="formContenido" style="display: flex; flex-direction: row; margin: auto;">
                        <div class="formContenido__field">
                            <label for="" style="font-size: 24px; color:#631133;">Ingrese el número de empleado o elemento</label>
                            <input type="text" id="" name="txtValor" style=" width: 40%;">
                        </div>
                        <div class="formContenido__field" style="margin: auto;">
                            <input type="submit" value="Buscar" name="btnBuscar" class="boton" id="boton">
                        </div>
                    </div>
                </fieldset>
            </form>
            <br>
            <form action="#" method="POST" id="form1">
                <h1 class="h1" style="font-size: 24px; text-align: center; color:#631133">Resultados de la búsqueda</h1>
                <div class="tble" style="margin-bottom: 5rem;">
                    <div class="outer-wrapper" style="height: 100%; width: 65%; margin: auto;">
                        <div class="table-wrapper">
                            <table style="margin: auto;">
                                <thead class="tbl">
                                    <tr>
                                        <th class="th-datos" colspan="6">Datos generales</th>                                        
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Paterno</th>
                                        <th>Materno</th>
                                        <th>Id de empleado</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $busqueda = $_POST['btnBuscar'];
                                        if (isset($busqueda)) {
                                            $empleado = $_POST['txtValor'];
                                            $sql = "SELECT emp.*, est.descripcion as estatus FROM empleado emp, estatus_elemento est
                                        WHERE emp.estatus = est.id_estatus AND emp.id_numero_de_empleado='$empleado' ORDER BY(id_empleado) ASC";
                                            $query = $conn->obtenerDatosChalecos($sql);
                                            foreach ($query as $row) {
                                    ?>
                                                <tr class="tabla-registros--fila">
                                                    <td class="tabla-registros--columna"><?php echo $row['id_empleado']; ?></td>
                                                    <td class="tabla-registros--columna"><?php echo $row['nombre']; ?></td>
                                                    <td class="tabla-registros--columna"><?php echo $row['paterno']; ?></td>
                                                    <td class="tabla-registros--columna"><?php echo $row['materno']; ?></td>
                                                    <td class="tabla-registros--columna"><?php echo $row['id_numero_de_empleado']; ?></td>
                                                    <td class="tabla-registros--columna"><?php echo $row['estatus']; ?></td>
                                                </tr>
                                </tbody>
                    <?php
                                            }
                                        }
                                    }
                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
            <form action="#" method="POST" id="form2">
                <h1 class="h1" style="font-size: 24px; text-align: center; color:#631133">Listado de todos los elementos</h1>
                <div class="tble" style="margin-bottom: 5rem;">
                    <div class="outer-wrapper" style="height: 100%; width: 65%; margin: auto;">
                        <div class="table-wrapper">
                            <table style="margin: auto;">
                                <thead class="tbl">
                                    <tr>
                                        <th class="th-datos" colspan="6">Datos generales</th>                                        
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Paterno</th>
                                        <th>Materno</th>
                                        <th>Id de empleado</th>
                                        <th>Estatus</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT emp.*, est.descripcion as estatus FROM empleado emp, estatus_elemento est
                                        WHERE emp.estatus = est.id_estatus ORDER BY(id_empleado) ASC";
                                    $query = $conn->obtenerDatosChalecos($sql);
                                    foreach ($query as $row) {
                                    ?>
                                        <tr class="tabla-registros--fila">
                                            <td class="tabla-registros--columna"><?php echo $row['id_empleado']; ?></td>
                                            <td class="tabla-registros--columna"><?php echo $row['nombre']; ?></td>
                                            <td class="tabla-registros--columna"><?php echo $row['paterno']; ?></td>
                                            <td class="tabla-registros--columna"><?php echo $row['materno']; ?></td>
                                            <td class="tabla-registros--columna"><?php echo $row['id_numero_de_empleado']; ?></td>
                                            <td class="tabla-registros--columna"><?php echo $row['estatus']; ?></td>                                            
                                        </tr>
                                </tbody>
                            <?php }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
include '../Clases/footer.php';
?>

</html>