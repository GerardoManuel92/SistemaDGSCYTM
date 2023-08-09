<?php
include '../Conexion/Conexion.php';
include '../Metodos/MetodosAdmin.php';
$obj = new MetodosAdmin();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Admin/styles/styles.css">
    <title>Document</title>
</head>

<body>
    <h1 style="font-size: 20px; text-align: center; font-family: Arial, Helvetica, sans-serif;">LISTA DE RESGUARDO DE UNIDADES</h1>
    <table style="border: 2px solid #631133; border-collapse: collapse; font-size: 8px; font-family: Arial, Helvetica, sans-serif;">
        <thead>
            <tr style="border: 2px solid #631133; border-collapse: collapse;">
                <td style="border: 2px solid #631133; border-collapse: collapse;">#</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Inventario</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Bien</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Marca</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Submarca</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Estado uso</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Proveedor</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Eco</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Placas</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Región</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Factura</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Motor</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Serie</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Resguardatario</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Sector</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Cuadrante</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Imagen1</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Imagen2</td>
                <td style="border: 2px solid #631133; border-collapse: collapse;">Imagen3</td>                
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT ru.id_progresivo AS id, ru.inventario AS inventario, tu.descripcion AS tipo_unidad,
            mv.descripcion as marca, sub.descripcion as submarca, eu.descripcion as estado_uso,
            prov.nombre_proveedor as proveedor, ec.descripcion as eco, ru.no_placas as placas,
            rg.descripcion AS region, ru.no_factura as factura, ru.motor as motor, ru.serie as serie,
            IFNULL(resg.nombre,'SIN RESGUARDATARIO') as nombre, IFNULL(resg.paterno,'') as paterno, 
            IFNULL(resg.materno,'') as materno, ru.sector as sector,
            ru.cuadrante AS cuadrante, ru.imagen as imagen1, ru.imagen2 as imagen2, ru.imagen3 as imagen3
            FROM registro_unidades ru JOIN tipo_unidad tu ON ru.id_tipo = tu.id_tipo
            JOIN submarca sub ON ru.id_submarca = sub.id_submarca JOIN marca_vehiculos mv ON sub.id_marca = mv.id_marca
            JOIN estado_uso eu ON ru.id_estado = eu.id_estado JOIN proveedor prov ON ru.id_proveedor = prov.id_proveedor
            JOIN eco ec ON ru.id_eco = ec.id_eco JOIN registro_regiones rr ON ru.id_progresivo = rr.id_progresivo
            JOIN region rg ON rr.id_region = rg.id_region LEFT OUTER JOIN resguardatarios resg ON resg.region = rg.id_region
            JOIN marca_unidades mu ON mu.id_tipo_unidad = tu.id_tipo AND mu.id_marca = mv.id_marca
            ORDER BY(ru.id_progresivo) ASC";
            $datos = $obj->obtenerDatos($sql);
            foreach($datos as $array){
            ?>
            <tr style="border: 2px solid #631133; border-collapse: collapse;">
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['id']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['inventario']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['tipo_unidad']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['marca']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['submarca']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['estado_uso']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['proveedor']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['eco']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['placas']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['region']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['factura']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['motor']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['serie']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['nombre'].' '. $array['paterno'].' '. $array['materno']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['sector']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><?php echo $array['cuadrante']; ?></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><img src="data:image/jpg;base64, <?php echo base64_encode($array['imagen1']); ?>" alt="Imagen1" style="width: 100px; height: 65px;"></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><img src="data:image/jpg;base64, <?php echo base64_encode($array['imagen2']); ?>" alt="Imagen1" style="width: 100px; height: 65px;"></td>
                <td style="border: 2px solid #631133; border-collapse: collapse;"><img src="data:image/jpg;base64, <?php echo base64_encode($array['imagen3']); ?>" alt="Imagen1" style="width: 100px; height: 65px;"></td>
                
            </tr>
            <?php }?>
        </tbody>
    </table>

</body>

</html>
