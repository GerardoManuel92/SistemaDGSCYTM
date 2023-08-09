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
    <title>Registro de Usuarios</title>
</head>
<?php
include '../Clases/header.php';
include '../Clases/navAdmin.php';
include '../Clases/seccionUsuario.php';
?>

<body>
    <main class="contenedor">
        <div class="contenedor2">
            <div class="contenedor2__section">
                <img src="../logos/piedrapochotes.png" alt="">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm">
                <form action="#" id="formFiltro" class="formFiltro">
                    <div class="fila">
                        <div class="columna">
                            <label for="">¿Que registro desea realizar?</label>
                            <select name="cbOpcion" id="cbOpcion" onchange="validarOpcFiltro();">
                                <option value="0">Elige una opcion</option>
                                <option value="1">Proveedor</option>
                                <option value="2">Region</option>
                                <option value="3">Tipo de unidad</option>
                                <option value="4">Marca de vehiculo</option>
                                <option value="5">Submarca de vehiculo</option>
                                <option value="6">Marca de unidades</option>
                            </select>
                            <p class="alert" id="alert"></p>
                        </div>
                    </div>
                </form>
                <form action="../CRUD/insertarProveedor.php" method="POST" id="form1">
                    <h1 class="h1-form">Proveedor</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Nombre de proveedor</label>
                                <input type="text" name="txtProveedor" id="">
                            </div>                            
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarRegion.php" method="POST" id="form2">
                    <h1 class="h1-form">Región</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Nombre región</label>
                                <input type="text" name="txtRegion" id="">
                            </div>                            
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarUnidad.php" method="POST" id="form3">
                    <h1 class="h1-form">Tipo de unidad</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Descripción de la unidad</label>
                                <input type="text" name="txtTipo" id="">
                            </div>                            
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarMarca.php" method="POST" id="form4">
                    <h1 class="h1-form">Marca de vehiculos</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Nombre de la marca</label>
                                <input type="text" name="txtUnidad" id="">
                            </div>                            
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarSubmarca.php" method="POST" id="form5">
                    <h1 class="h1-form">Submarca de vehiculos</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Nombre de la submarca</label>
                                <input type="text" name="txtSubmarca" id="">
                            </div>  
                            <div class="columnna">
                                <label for="">Marca del propietario</label>
                                <select name="cbMarcaPropietario" id="">
                                    <?php
                                        $conexion = new MetodosAdmin();
                                        $sql = "SELECT * FROM marca_vehiculos";
                                        $marca = $conexion->obtenerDatos($sql);
                                        foreach($marca as $mark){
                                            ?>
                                            <option value="<?php echo $mark['id_marca'];?>"><?php echo $mark['descripcion'];?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>                            
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarMarcaUnidad.php" method="POST" id="form6">
                    <h1 class="h1-form">Marca de unidades</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Complete el formulario</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Tipo de unidad</label>
                                <select name="cbTipo" id="">
                                <?php
                                        $conexion = new MetodosAdmin();
                                        $sql = "SELECT * FROM tipo_unidad";
                                        $tipo = $conexion->obtenerDatos($sql);
                                        foreach($tipo as $t){
                                            ?>
                                            <option value="<?php echo $t['id_tipo'];?>"><?php echo $t['descripcion'];?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div> 
                            <div class="columnna">
                                <label for="">Marca de unidad</label>
                                <select name="cbMarca" id="">
                                <?php
                                        $conexion = new MetodosAdmin();
                                        $sql = "SELECT * FROM marca_vehiculos";
                                        $marca = $conexion->obtenerDatos($sql);
                                        foreach($marca as $mark){
                                            ?>
                                            <option value="<?php echo $mark['id_marca'];?>"><?php echo $mark['descripcion'];?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>                           
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
</body>
<script src="../JS/validaFormMultiregistro.js"></script>
<?php
include '../Clases/footer.php';
?>
</html>