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
                                <option value="1">Grado/Cargo</option>
                                <option value="2">Modelo chaleco</option>
                                <option value="3">Modelo placa delantera</option>
                                <option value="4">Modelo placa trasera</option>
                                <option value="5">Número de ECO</option>
                                <option value="6">Número de empleado</option>
                                <option value="7">Región</option>
                                <option value="8">Serie chaleco</option>
                                <option value="9">Serie placa delantera</option>
                                <option value="10">Serie placa trasera</option>                                
                            </select>
                            <p class="alert" id="alert"></p>
                        </div>
                    </div>
                </form>
                <form action="#" method="POST" id="form1">
                    <h1 class="h1-form">Cargo / Grado</h1>
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
                <form action="#" method="POST" id="form2">
                    <h1 class="h1-form">Modelo chaleco</h1>
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
                <form action="#" method="POST" id="form3">
                    <h1 class="h1-form">Modelo placa delantera</h1>
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
                <form action="#" method="POST" id="form4">
                    <h1 class="h1-form">Modelo placa trasera</h1>
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
                <form action="#" method="POST" id="form5">
                    <h1 class="h1-form">Modelo chaleco</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Para generar un nuevo Id ECO solo dar clic en Registrar</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">ID (Automático)</label>
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
                <form action="#" method="POST" id="form6">
                    <h1 class="h1-form">Número de empleado</h1>
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
                <form action="#" method="POST" id="form7">
                    <h1 class="h1-form">Región</h1>
                    <br>
                    <fieldset>
                        <br>
                        <legend>Ingresa el nombre de la región</legend>
                        <div class="fila">
                            <div class="columnna">
                                <label for="">Nombre</label>
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
                <form action="#" method="POST" id="form8">
                    <h1 class="h1-form">Serie chaleco</h1>
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
                <form action="#" method="POST" id="form9">
                <h1 class="h1-form">Serie placa delantera</h1>
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
                <form action="#" method="POST" id="form10">
                <h1 class="h1-form">Serie placa trasera</h1>
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
            </div>
        </div>
    </main>  
    <script src="../JS/opcionesChalecosAdmin.js"></script>  
</body>
<?php
include '../Clases/footer.php';
?>
</html>