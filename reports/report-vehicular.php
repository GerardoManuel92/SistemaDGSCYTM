<?php


include('../reports/plantilla.php');
include('../conexion.php');


$query = "SELECT uni.id_progresivo, uni.no_factura, uni.no_placas, uni.costo, uni.inventario, 
uso.descripcion AS Estado, tu.descripcion AS Tipo,  uni.id_proveedor, sbm.descripcion AS Submarca ,
 uni.modelo,uni.id_eco, uni.serie, uni.observaciones, uni.motor
FROM registro_unidades uni, tipo_unidad tu , estado_uso uso, proveedor pvb , submarca sbm
WHERE uni.id_estado = uso.id_estado 
 AND uni.id_proveedor = pvb.id_proveedor
  AND uni.id_submarca = sbm.id_submarca
  AND uni.id_tipo = tu.id_tipo
 order by id_progresivo ASC
";
$resultado = mysqli_query($conn, $query);

ob_end_clean();
$pdf = new PDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 25);
$pdf->SetTitle('Reporte de Vehiculos');
$pdf->Cell(100); 
$pdf->Cell(30, 10, 'Reporte de Vehiculos', 0, 0, );
$pdf->Ln(15);

$vehiculos = array(

    "# ID",
    "# Factura",
    "# Placas",
    "Costo",
    "Inventario",
    "Tipo",
    "Estado",
    "Proveedor",
    "Sub Marca",
    "Modelo",
    "Eco",
    "Serie",
    "Observaciones",
    "Motor",

);

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(10, 10, '# ID', 1, 0, 'C');
$pdf->Cell(20, 10, '# Factura', 1, 0, 'C');
$pdf->Cell(20, 10, '# Placas', 1, 0, 'C');
$pdf->Cell(15, 10, 'Costo', 1, 0, 'C');
$pdf->Cell(27, 10, 'Inventario', 1, 0, 'C');
$pdf->Cell(20, 10, 'Tipo', 1, 0, 'C');
$pdf->Cell(20, 10, ' Estado', 1, 0, 'C');
$pdf->Cell(15, 10, 'Proveedor', 1, 0, 'C');
$pdf->Cell(20, 10, 'Sub Marca', 1, 0, 'C');
$pdf->Cell(15, 10, 'Modelo', 1, 0, 'C');
$pdf->Cell(15, 10, 'Eco', 1, 0, 'C');
$pdf->Cell(30, 10, 'Serie', 1, 0, 'C');
$pdf->Cell(40, 10, 'Observaciones', 1, 0, 'C');
$pdf->Cell(15, 10, 'Motor', 1, 0, 'C');
$pdf->Ln();




$pdf->SetTopMargin(20);

while ($row = $resultado->fetch_assoc()) {
    # code...
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(10, 10, $row['id_progresivo'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['no_factura'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['no_placas'], 1, 0, 'C');
    $pdf->Cell(15, 10, $row['costo'], 1, 0, 'C');
    $pdf->Cell(27, 10, $row['inventario'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['Tipo'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['Estado'], 1, 0, 'C');
    // $pdf->Cell(20,10, '', 1,0);
    $pdf->Cell(15, 10, $row['id_proveedor'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['Submarca'], 1, 0, 'C');
    $pdf->Cell(15, 10, $row['modelo'], 1, 0, 'C');
    $pdf->Cell(15, 10, $row['id_eco'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['serie'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['observaciones'], 1, 0, 'C');
    $pdf->Cell(15, 10, $row['motor'], 1, 1, 'C');


}
$fechaActual = date('d-m-Y');

$pdf->Output('Reporte-vehicular' . $fechaActual .'.pdf' , 'D');


?>