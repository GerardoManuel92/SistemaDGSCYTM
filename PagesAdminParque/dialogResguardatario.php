<?php
require_once '../Conexion/Conexion.php';
require_once '../Metodos/MetodosAdmin.php';
$obj = new MetodosAdmin();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Modificar datos</title>
</head>

<body class="body_dialog">
    <dialog open class="body_dialog--form" style="height: 80%;">
        <div class=" body_dialog2">
            <div class="div_dialog">
                <img src="../logos/direccion-administrativa.png" alt="">
                <h1>Modificar datos de resguardatario</h1>
            </div>
            <br>
            <div class="dialog_form" style="height: 80%;">
                <div class="dialog-fila">
                    <form action="../CRUD/updateResguardatario.php" method="POST">
                        <?php
                        $sql = "SELECT * FROM resguardatarios WHERE id_resguardatario='$id'";
                        $datos = $obj->obtenerDatos($sql);
                        foreach ($datos as $data) {
                        ?>
                            <div class="dialog-column">
                                <label for="">Id resguardatario</label>
                                <input type="text" name="txtId" id="" value="<?php echo $data['id_resguardatario']; ?>" readonly>
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
                                <label for="">Región</label>
                                <select name="cbRegion" id="">
                                    <option value="<?php echo $data['region']; ?>">
                                    <?php
                                    $region = $data['region'];
                                    $sql2 = "SELECT r.descripcion as region FROM region r JOIN resguardatarios resg ON r.id_region = resg.region AND r.id_region='$region' GROUP BY(r.descripcion)"; 
                                    $region = $obj->obtenerDatos($sql2);
                                    foreach($region as $reg){
                                        echo $reg['region'];
                                    } 
                                    ?>
                                    </option>
                                    <?php
                                    $idResg = $data['id_resguardatario'];
                                    $sql3 = "SELECT r.id_region as id, r.descripcion as region from region r WHERE r.id_region NOT IN
                                    (SELECT resg.region as resgId FROM resguardatarios resg JOIN region r ON resg.region = r.id_region
                                    AND resg.id_resguardatario='$idResg')";
                                    $regiones = $obj->obtenerDatos($sql3);
                                    foreach($regiones as $regs){
                                        ?>
                                        <option value="<?php echo $regs['id'];?>"><?php echo $regs['region']; ?></option>
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
            <a href="listaResguardatarios.php">Salir</a>
            <?php include '../Clases/footer.php'; ?>
        </div>
    </dialog>
</body>

</html>