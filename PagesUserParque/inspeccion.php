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
    <title>Regsitro Vehicular</title>
</head>
<?php
include '../Clases/header.php';
include '../Clases/navUser.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <main class="contenedor" style="height: auto;">
        <div class="contenedor2">
            <div class="contenedor2__section" style="width: 35%;">
                <img src="../logos/piedrapochotes.png" alt="" style="height: 700px; width: 550px;">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm" style="width: 65%;">
                <form action="" id="formFiltro" class="formFiltro" method="POST">
                    <div class="fila">
                        <div class="columna">
                            <label for="">Seleccione el numero economico</label>
                            <select name="cbEco" id="">
                                <?php
                                $obj = new MetodosAdmin();
                                $sql = "SELECT * FROM eco ORDER BY(id_eco) ASC";
                                $economico = $obj->obtenerDatos($sql);
                                foreach ($economico as $eco) {
                                ?>
                                    <option value="<?php echo $eco['id_eco'] ?>"><?php echo $eco['descripcion'] ?></option>
                                <?php
                                }
                                ?>
                            </select>                            
                        </div>
                        <div class="columna">
                            <label for="">.</label>
                        <input type="submit" value="Buscar" class="boton" name="btnBuscar">
                        </div>
                    </div>
                </form>  
                <br>            
                <form action="../CRUD-User/insertarInspeccion.php" method="POST" enctype="multipart/form-data" id="formInspeccion">
                    <h1>Registro Vehicular</h1>
                    <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        $btnBusqueda = $_POST['btnBuscar'];
                        if(isset($btnBusqueda)){
                            $eco = $_POST['cbEco'];
                            $obj = new MetodosAdmin();
                            $sql = "SELECT ru.id_eco as eco, mv.descripcion as marca, ru.id_submarca as idsubmarca, sub.descripcion as submarca, ru.modelo as modelo
                                from registro_unidades ru join submarca sub on ru.id_submarca = sub.id_submarca join marca_vehiculos mv
                                on sub.id_marca = mv.id_marca join estado_uso e on ru.id_estado = e.id_estado join eco ec on ru.id_eco = ec.id_eco
                                and ru.id_eco = '$eco'"; 
                            $info = $obj->obtenerDatos($sql);
                            foreach($info as $i){                    
                ?>
                    <fieldset>
                        <legend>Complete el formulario</legend>
                        <div class="fila" style="grid-template-columns: repeat(3, 1fr);">
                            <div class="columnna">
                                <label for="">Economico</label>
                                <input type="text" value="<?php echo $i['eco']; ?>" name="txtIdEco" id="" readonly>
                            </div>
                            <div class="columnna">
                                <label for="">Marca</label>
                                <input type="text" value="<?php echo $i['marca']; ?>" name="txtMarca" id="" readonly>
                            </div>
                            <div class="columnna">
                                <label for="">Submarca</label>
                                <input type="text" name="txtIdSubmarca" id="" value="<?php echo $i['idsubmarca']?>" hidden>
                                <input type="text" value="<?php echo $i['submarca']; ?>" name="txtSubmarca" id="" readonly>
                            </div>
                            <div class="columnna">
                                <label for="">Modelo</label>
                                <input type="text" value="<?php echo $i['modelo']; ?>" name="txtModelo" id="" readonly>
                            </div>
                            <div class="columnna">
                                <label for="">Fecha</label>
                                <input type="date" name="txtFecha" id="">
                            </div>                           
                            <div class="columnna">
                                <label for="">Estado de uso</label>
                                <select name="cmbEstadoUso" id="">
                                    <?php
                                    $obj = new MetodosAdmin();
                                    $sql = "SELECT * FROM estado_uso ORDER BY(id_estado) ASC";
                                    $rolUser = $obj->obtenerDatos($sql);
                                    foreach ($rolUser as $rol) {
                                    ?>
                                        <option value="<?php echo $rol['id_estado']; ?>"><?php echo $rol['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>                            
                            <div class="columna">
                                <label for="">Imagen 1</label>
                                <input type="file" name="imagen1" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 2</label>
                                <input type="file" name="imagen2" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 3</label>
                                <input type="file" name="imagen3" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 4</label>
                                <input type="file" name="imagen4" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 5</label>
                                <input type="file" name="imagen5" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Imagen 6</label>
                                <input type="file" name="imagen6" id="" accept="image/*">
                            </div>
                            <div class="columna">
                                <label for="">Observaciones</label>
                                <textarea name="txtObservacion" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                    </fieldset>
                    <?php
                            }
                        }
                    }
                ?>
                </form>                
            </div>
        </div>
    </main>
</body>
<?php
include '../Clases/footer.php';
?>

</html>