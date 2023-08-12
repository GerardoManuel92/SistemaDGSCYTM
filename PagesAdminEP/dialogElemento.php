<?php
require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdminEP.php';
$obj = new MetodosAdmin();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Modificar datos del elemento</title>
</head>

<body class="body_dialog">
    <dialog open class="body_dialog--form" style="height: 80%;">
        <div class=" body_dialog2">
            <div class="div_dialog">
                <img src="../logos/direccion-administrativa.png" alt="">
                <h1>Modificar datos del elemento</h1>
            </div>
            <br>
            <div class="dialog_form" style="height: 80%;">
                <div class="dialog-fila">
                    <form action="../CRUD/updateElemento.php" method="POST">
                        <?php
                        $sql = "SELECT id_empleado, nombre, paterno, materno, estatus FROM empleado WHERE id_empleado='$id'";
                        $datos = $obj->obtenerDatosChalecos($sql);
                        foreach ($datos as $data) {
                        ?>
                            <div class="dialog-column">
                                <label for="">Id elemento</label>
                                <input type="text" name="txtId" id="" value="<?php echo $data['id_empleado']; ?>" readonly>
                            </div>
                            <div class="dialog-column">
                                <label for="">Nombre</label>
                                <input type="text" name="txtNombre" id="" value="<?php echo $data['nombre']; ?>">
                            </div>
                            <div class="dialog-column">
                                <label for="">Apellido Paterno</label>
                                <input type="text" name="txtPaterno" id="" value="<?php echo $data['paterno']; ?>">
                            </div>
                            <div class="dialog-column">
                                <label for="">Apellido Materno</label>
                                <input type="text" name="txtMaterno" id="" value="<?php echo $data['materno']; ?>">
                            </div>
                            <div class="columna">
                                <label for="">Estatus</label>
                                <select name="cbEstatus" id="">
                                    <option value="<?php echo $data['estatus']; ?>">
                                    <?php
                                    $estatus = $data['estatus'];
                                    $sql2 = "SELECT ele.descripcion as estatus FROM estatus_elemento ele JOIN empleado e ON ele.id_estatus = e.estatus AND e.estatus='$estatus' GROUP BY(ele.descripcion)"; 
                                    $estatus = $obj->obtenerDatosChalecos($sql2);
                                    foreach($estatus as $est){
                                        echo $est['estatus'];
                                    } 
                                    ?>
                                    </option>
                                    <?php
                                    $idElemento = $data['id_empleado'];
                                    $sql3 = "SELECT ele.id_estatus as id, ele.descripcion as estatus from estatus_elemento ele WHERE ele.id_estatus NOT IN
                                    (SELECT e.estatus as estat FROM empleado e JOIN estatus_elemento ele ON e.estatus = ele.id_estatus
                                    AND e.id_empleado='$idElemento')";
                                    $status = $obj->obtenerDatosChalecos($sql3);
                                    foreach($status as $st){
                                        ?>
                                        <option value="<?php echo $st['id'];?>"><?php echo $st['estatus']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="dialog-column">
                                <br><br>
                                <input type="submit" name="btnModificar" class="boton" value="Modificar" id="">
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
            <a href="listEmpleados.php">Salir</a>
            <?php include '../Clases/footer.php'; ?>
        </div>
    </dialog>
</body>

</html>