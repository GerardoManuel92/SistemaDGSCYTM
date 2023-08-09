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
    <title>Modificar datos</title>
</head>
<body class="body_dialog">
    <dialog open class="body_dialog--form"">
        <div class=" body_dialog2">
        <div class="div_dialog">
            <img src="../logos/direccion-administrativa.png" alt="">
            <h1>Modificar resguardo de económico</h1>
        </div>
        <br>
        <div class="dialog_form">
            <div class="dialog-fila">
                <form action="../CRUD/updateResguardoEco.php" method="POST">
                    <?php
                    $id = $_GET['id'];
                    $obj = new MetodosAdmin();
                    $sql = "SELECT * FROM resguardo_ecos WHERE id_resguardo='$id'";
                    $datos = $obj->obtenerDatos($sql);
                    foreach ($datos as $d) {
                    ?>
                        <div class="dialog-column">
                            <label for="">Id</label>
                            <input type="text" name="txtId" id="" value="<?php echo $d['id_resguardo']; ?>" readonly>
                        </div>
                        <div class="dialog-column">
                            <label for="">Eco</label>
                            <select name="cbEco" id="">
                                <option value="<?php echo $d['eco']; ?>"><?php echo $d['eco']; ?></option>
                                <?php
                                $id_eco = $d['eco'];
                                $obj = new MetodosAdmin();
                                $sql4 = "SELECT eco FROM resguardo_ecos WHERE eco NOT IN(select eco FROM resguardo_ecos WHERE eco='$id_eco')";
                                $eco = $obj->obtenerDatos($sql4);
                                foreach ($eco as $e) {
                                ?>
                                    <option value="<?php echo $e['eco']; ?>"><?php echo $e['eco']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="dialog-column">
                            <label for="">Resguardatario</label>
                            <select name="cbResguardatario" id="">
                                <option value="<?php echo $d['resguardatario']; ?>">
                                    <?php
                                    $id_res = $d['resguardatario'];
                                    $obj = new MetodosAdmin();
                                    $sql2 = "SELECT nombre, paterno, materno FROM resguardatarios WHERE id_resguardatario='$id_res'";
                                    $resg = $obj->obtenerDatos($sql2);
                                    foreach ($resg as $r) {
                                        echo $r['nombre'] . ' ' . $r['paterno'] . ' ' . $r['materno'];
                                    }
                                    ?>
                                </option>
                                <?php
                                $id_resg = $d['id_resguardo'];
                                $obj = new MetodosAdmin();
                                $sql3 = "SELECT resg.id_resguardatario as id, resg.nombre as nombre, resg.paterno as paterno, resg.materno as materno 
                                    FROM resguardatarios resg WHERE resg.id_resguardatario NOT IN(SELECT re.resguardatario FROM resguardo_ecos re JOIN resguardatarios resg 
                                    ON re.resguardatario = resg.id_resguardatario AND re.id_resguardo='$id_resg');";
                                $resg = $obj->obtenerDatos($sql3);
                                foreach ($resg as $r) {
                                ?>
                                    <option value="<?php echo $r['id'] ?>"><?php echo $r['nombre'] . ' ' . $r['paterno'] . ' ' . $r['materno'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="dialog-column">
                            <label for="">-</label>
                            <input type="submit" name="btnModificar" class="boton" value="Modificar" id="">
                        </div>
                        <br>
                    <?php } ?>
                </form>
            </div>
        </div>
        <a href="resguardoUnidades.php">Salir</a>
        <?php include '../Clases/footer.php'; ?>
        </div>
    </dialog>
</body>
</html>