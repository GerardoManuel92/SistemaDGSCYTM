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
    <title>Galeria de imagenes</title>
</head>
<?php
include '../Clases/header.php';
include '../Clases/navUser.php';
include '../Clases/seccionUsuario.php';
?>
<br>

<body>
    <h2>Catálogo de fotografías del parque vehicular</h1>
        <main class="contenedor">
            
       
            <br>
            <div class="contenedor3">
                <?php
                $obj = new MetodosAdmin();
                $sql = "SELECT ru.id_progresivo AS id, mv.descripcion AS marca, sub.descripcion AS submarca, e.descripcion AS eco, eu.descripcion AS estado_uso, ru.imagen AS imagen FROM marca_vehiculos mv
            JOIN submarca sub ON sub.id_marca=mv.id_marca JOIN registro_unidades ru ON ru.id_submarca = sub.id_submarca JOIN eco e
            ON ru.id_eco = e.id_eco JOIN estado_uso eu ON ru.id_estado = eu.id_estado";
                $datos = $obj->obtenerDatos($sql);
                foreach ($datos as $d) {
                ?>
                    <form action="#" method="POST">
                        <div class="contenedor3__contenido">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($d['imagen']); ?>" alt="">
                            <input type="text" name="txtId" value="<?php echo $d['id']; ?>" hidden>
                            <div class="fila">
                                <div class="columna">
                                    <label for="">Marca y modelo:</label>
                                    <p><?php
                                        if ($d['marca'] == $d['submarca']) {
                                            echo $d['submarca'];
                                        } else {
                                            echo $d['marca'] . ' ' . $d['submarca'];
                                        } ?></p>
                                </div>
                                <div class="columna">
                                    <label for="">Economico:</label>
                                    <p><?php echo $d['eco']; ?></p>
                                </div>
                                <div class="columna">
                                    <label for="">Estado de uso: </label>
                                    <p><?php echo $d['estado_uso']; ?></p>
                                </div>
                            </div>
                            <a href="dialogCatalogo.php?id=<?php echo base64_encode($d['id']); ?>">Ver fotos</a>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </main>
</body>
<?php
include '../Clases/footer.php';
?>

</html>