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
    <link rel="stylesheet" href="../CSS/modalstyle.css">
    <title>Fotos</title>
</head>

<body class="body_dialog">
    <dialog open>
        <div class="body_dialog2">
            <div class="div_dialog">
                <img src="../logos/direccion-administrativa.png" alt="">
                <h1>Catalogo por económico</h1>
            </div>
            <div class="dialog_form" style="display: flex; flex-direction: column;">
                <form action="#" method="POST" style="height: 30%;">
                    <div class="dialog-fila" style=" display : flex; flex-direction: row; column-gap: 10px;">
                        <div class="dialog-columna" style="width: 50%;">
                            <label for="">Seleccione el numero económico</label>
                            <select name="cbEco" id="">
                                <?php
                                $obj = new MetodosAdmin();
                                $eco = "SELECT * FROM eco ORDER BY(id_eco) ASC";
                                $ec = $obj->obtenerDatos($eco);
                                foreach ($ec as $e) {
                                ?>
                                    <option value="<?php echo $e['id_eco']; ?>"><?php echo $e['descripcion']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="dialog-columna" style="width: 50%;">
                            <label for="">.</label>
                            <input type="submit" value="Buscar" name="btnBuscar" class="boton">
                        </div>
                    </div>
                </form>
                <form action="#" style="height: 70%;">
                    <div class="contenedor3" style="display: grid; grid-template-columns: repeat(3, 1fr); margin-left: 20px; justify-content: center;">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $btnBuscar = $_POST['btnBuscar'];
                            if (isset($btnBuscar)) {
                                $obj = new MetodosAdmin();
                                $idEco = $_POST['cbEco'];
                                $sql = "SELECT ru.id_progresivo AS id, mv.descripcion AS marca, sub.descripcion AS submarca, e.descripcion AS eco, eu.descripcion AS estado_uso, ru.imagen AS imagen FROM marca_vehiculos mv
                            JOIN submarca sub ON sub.id_marca=mv.id_marca JOIN registro_unidades ru ON ru.id_submarca = sub.id_submarca JOIN eco e
                            ON ru.id_eco = e.id_eco JOIN estado_uso eu ON ru.id_estado = eu.id_estado AND ru.id_eco='$idEco'";
                                $datos = $obj->obtenerDatos($sql);
                                foreach ($datos as $d) {

                        ?>
                                    <a href="dialogCatalogo.php?id=<?php echo base64_encode($d['id']); ?>">
                                        <div class="content" style="display: flex; flex-direction: column; border: .3px solid black; width : 200px; height: 250px;">
                                            <p style="font-size: 10px;"><?php
                                                                        if ($d['marca'] == $d['submarca']) {
                                                                            echo $d['submarca'];
                                                                        } else {
                                                                            echo $d['marca'] . ' ' . $d['submarca'];
                                                                        } ?> #Eco <?php echo $d['eco']; ?></p>

                                            <img src="data:image/jpg;base64, <?php echo base64_encode($d['imagen']); ?>" alt="" style="height: 150px; width: 99%;">
                                            <input type="text" name="txtId" value="<?php echo $d['id']; ?>" hidden>
                                            <div class="fila" style="display: flex; flex-direction: column;">
                                                <div class="columna">
                                                    <label for="" style="font-size: 12px;">Marca y modelo:</label>

                                                </div>
                                                <div class="columna" style="display: flex; flex-direction: row;">
                                                    <label for="" style="font-size: 12px;">Estado de uso: </label>
                                                    <p style="font-size: 10px;"><?php echo $d['estado_uso']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
            <a href="../ParqueVehicular/menuAdmin.php">Cerrar</a>
            <?php
            include '../Clases/footer.php'; ?>
        </div>

    </dialog>
</body>

</html>