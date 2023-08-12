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
    <main class="contenedor">
        <div class="contenedor2">
            <div class="contenedor2__section">
                <img src="../logos/piedrapochotes.png" alt="">
            </div>
            <div class="contenedor2__section contenedor2__sectionForm">
                <form action="#" id="formFiltro" class="formFiltro">
                    <div class="fila">
                        <div class="columna">
                            <label for="">¿Que desea registrar?</label>
                            <select name="cbOpcion" id="cbOpcion" onchange="validarSeleccion();">
                                <option value="0">Elige una opcion</option>
                                <option value="1">Color</option>
                                <option value="2">Marca</option>
                                <option value="3">Material</option>
                                <option value="4">Modelo</option>
                                <option value="5">Mueble</option>
                                <option value="6">Serie</option>                                                                
                            </select>
                            <p class="alert" id="alert"></p>
                        </div>
                    </div>
                </form>
                <br>
                <form action="../CRUD/insertarColorCasco.php" method="POST" id="form1">
                    <h1 class="h1-form">Color</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Ingresa la descripción</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Descripcion</label>
                                <input type="text" name="txtDescripcion" id="">
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarMarcaCasco.php" method="POST" id="form2">
                    <h1 class="h1-form">Marca</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Ingresa la descripción</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Descripcion</label>
                                <input type="text" name="txtDescripcion" id="">
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarMaterialCasco.php" method="POST" id="form3">
                    <h1 class="h1-form">Material</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Ingresa la descripción</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Descripcion</label>
                                <input type="text" name="txtDescripcion" id="">
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarModeloCasco.php" method="POST" id="form4">
                    <h1 class="h1-form">Modelo</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Ingresa la descripción</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Descripcion</label>
                                <input type="text" name="txtDescripcion" id="">
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarMueble.php" method="POST" id="form5">
                    <h1 class="h1-form">Mueble</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Ingresa la descripción</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Descripción</label>
                                <input type="text" name="txtDescripcion" id="">
                            </div>
                        </div>
                        <br> <br>
                        <div>
                            <input type="submit" value="Registrar" class="boton" name="btnRegistrar">
                        </div>
                        <br>
                    </fieldset>
                </form>
                <form action="../CRUD/insertarSerieCasco.php" method="POST" id="form6">
                    <h1 class="h1-form">Serie</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Ingresa la descripción</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Número de empleado</label>
                                <input type="text" name="txtDescripcion" id="">
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
    <script src="../JS/opcionesCascos.js"></script>  
</body>
<?php
include '../Clases/footer.php';
?>
</html>