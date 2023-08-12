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
    <div class="container2">
        <div class="container__element">            
            <div class="tble">
                <h1 style="font-size: 28px; color : #631133; text-align: center;">Resguardo de Chalecos</h1>
                <div class="outer-wrapper">
                    <div class="table-wrapper">
                        <table>
                            <thead class="tbl">
                                <tr>
                                    <th class="th-datos" colspan="13">Datos generales</th>                                    
                                </tr>
                                <tr>
                                    <th>Matricula</th>
                                    <th>Modelo Chaleco</th>
                                    <th>Serie Chaleco</th>
                                    <th>Modelo placa delantera</th>
                                    <th>Serie placa delantera</th>
                                    <th>Modelo placa trasera</th>
                                    <th>Serie placa trasera</th>
                                    <th>Elemento</th>
                                    <th>Region</th>
                                    <th>Talla</th>
                                    <th>Genero</th>
                                    <th>Cargo</th>
                                    <th>Numero_empleado</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT cg.matricula AS matricula, modch.descripcion as modchaleco, serch.descripcion AS serieChaleco,
                                modpd.descripcion AS modpldel, serpd.descripcion AS seriepldel, modpt.descripcion AS modpltr,
                                serpt.descripcion AS serpltr, IFNULL(el.nombre,'PENDIENTE DE ASIGNACION') AS nombre, IFNULL(el.paterno,'') AS paterno,
                                IFNULL(el.materno,'') AS materno, IFNULL(reg.descripcion,'') AS region, IFNULL(tch.descripcion,'') AS talla,
                                IFNULL(sx.descripcion,'') AS sexo, IFNULL(gd.descripcion,'') AS cargo, IFNULL(nem.descripcion,'') AS numEmp
                                FROM concentrado_general cg JOIN modelo_chaleco modch ON cg.model_chaleco = modch.id_modelo_chaleco
                                JOIN serie_chaleco serch ON cg.s_chaleco = serch.id_serie_chaleco JOIN modelo_placa_delantera modpd
                                ON cg.mod_placa_delantera = modpd.id_placa_delantera JOIN serie_placa_delantera serpd ON cg.s_placa_delantera = serpd.id_serie_placa_delantera
                                JOIN modelo_placa_trasera modpt ON cg.mod_placa_trasera = modpt.id_placa_trasera JOIN serie_placa_trasera serpt
                                ON cg.s_placa_trasera = serpt.id_serie_placa_trasera LEFT OUTER JOIN empleado el ON cg.elemento = el.id_empleado
                                LEFT OUTER JOIN regiones reg ON cg.region = reg.id_region LEFT OUTER JOIN talla_chaleco tch ON cg.talla = tch.id_talla_chaleco
                                LEFT OUTER JOIN sexo sx ON cg.genero = sx.id_sexo LEFT OUTER JOIN grado gd ON cg.cargo = gd.id_grado
                                LEFT OUTER JOIN numero_empleado nem ON el.id_numero_de_empleado = nem.id_numero_de_empleado ORDER BY(cg.matricula) ASC;";
                                $query = $conn->obtenerDatosChalecos($sql);
                                foreach($query as $row) {
                                ?>
                                    <tr class="tabla-registros--fila">
                                        <td class="tabla-registros--columna"><?php echo $row['matricula']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['modchaleco']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['serieChaleco']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['modpldel']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['seriepldel']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['modpltr']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['serpltr']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['nombre'].' '.$row['paterno'].' '.$row['materno']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['region']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['talla']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['sexo']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['cargo']; ?></td>
                                        <td class="tabla-registros--columna"><?php echo $row['numEmp']; ?></td>                                        
                                        </td>                                        
                                    </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include '../Clases/footer.php';
?>
</html>