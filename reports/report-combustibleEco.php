<?php

include('../reports/plantilla.php');
include('../Conexion/Conexion.php');
include('../Metodos/MetodosAdmin.php');

$obj = new MetodosAdmin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $GenerarReporte = $_POST['btnGenerar'];

    if (isset($GenerarReporte)) {
        $eco = $_POST['cbEco'];
        $dia_1 = $_POST['txtFInicio'];
        $dia_2 = $_POST['txtFTermino'];

        $query = "SELECT cc.id_control AS id, tg.descripcion AS tipoGasolina, u.descripcion AS ubicacion, cc.kilometraje as kilometraje, 
        cc.tanque as tanque, cc.precio_litro as precio_litro, cc.litros_gasolina as litros, cc.costo as costo, cc.no_bomba as bomba, cc.folio_ticket as folio_ticket,
        cc.observaciones as observaciones, cc.fecha as fecha, reg.descripcion as region, resg.nombre as nombre, resg.paterno as paterno, resg.materno as materno        
        FROM control_combustible cc JOIN tipo_gasolina tg ON cc.id_tipo_gasolina = tg.id_gasolina
        JOIN ubicacion u ON cc.id_ubicacion = u.id_ubicacion JOIN resguardatarios resg 
        ON cc.resguardatario = resg.id_resguardatario JOIN region reg ON resg.region = reg.id_region 
        AND cc.id_eco='$eco' AND cc.fecha BETWEEN '$dia_1' AND '$dia_2' ORDER BY(id) ASC;";
        $datos = $obj->obtenerDatos($query);              
        ob_end_clean();

        $pdf = new PDF('L', 'mm', 'Legal');
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'B', 25);
        $pdf->SetTitle('Reporte de Combutible por Número de Económico');
        $pdf->Cell(90);

        $pdf->Cell(18, 10, 'Reporte de Combustible', 0, 0,);
        $pdf->Ln(10);

        $pdf->SetLeftMargin(15);


        $pdf->SetFont('Arial', 'B', 7);

        $pdf->Cell(18, 10, "Id", 1, 0, 'C');
        $pdf->Cell(18, 10, "Gasolina", 1, 0, 'C');        
        $pdf->Cell(18, 10, "Ubicacion", 1, 0, 'C');
        $pdf->Cell(18, 10, "Kilometraje", 1, 0, 'C');
        $pdf->Cell(18, 10, "Tanque", 1, 0, 'C');
        $pdf->Cell(18, 10, "Precio litro", 1, 0, 'C');
        $pdf->Cell(18, 10, "Litros", 1, 0, 'C');
        $pdf->Cell(18, 10, "Costo", 1, 0, 'C');
        $pdf->Cell(18, 10, "Bomba", 1, 0, 'C');
        $pdf->Cell(18, 10, "Folio ticket", 1, 0, 'C');
        $pdf->Cell(40, 10, "Observaciones", 1, 0, 'C');
        $pdf->Cell(18, 10, "Fecha", 1, 0, 'C');
        $pdf->Cell(18, 10, "Region", 1, 0, 'C');
        $pdf->Cell(40, 10, "Resguardatario", 1, 1, 'C');


        foreach($datos as $row) {

            $pdf->Cell(18, 10, $row['id'], 1, 0, 'C');
            $pdf->Cell(18, 10, $row['tipoGasolina'], 1, 0, 'C');            
            $pdf->Cell(18, 10, $row['ubicacion'], 1, 0, 'C');
            $pdf->Cell(18, 10, $row['kilometraje'], 1, 0, 'C');
            $pdf->Cell(18, 10, $row['tanque'], 1, 0, 'C');
            $pdf->Cell(18, 10, $row['precio_litro'], 1, 0, 'C');
            $pdf->Cell(18, 10, $row['litros'], 1, 0, 'C');
            $pdf->Cell(18, 10, $row['costo'], 1, 0, 'C');
            $pdf->Cell(18, 10, $row['bomba'], 1, 0, 'C');
            $pdf->Cell(18, 10, $row['folio_ticket'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['observaciones'], 1, 0, 'C');
            $pdf->Cell(18, 10, $row['fecha'], 1, 0, 'C');
            $pdf->Cell(18, 10, utf8_decode($row['region']), 1, 0, 'C');
            $pdf->Cell(40, 10, $row['nombre'] . ' ' . $row['paterno'] . ' ' . $row['materno'], 1, 1, 'C');
            # code...
        }
        $pdf->Ln(10);       

        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(50, 10, "Fecha de inicio", 1, 0, 'C');
        $pdf->Cell(50, 10, "Fecha de término", 1, 0, 'C');
        $pdf->Cell(50, 10, "Total de litros", 1, 0, 'C');
        $pdf->Cell(50, 10, "Monto total", 1, 1, 'C');

        $query2="SELECT SUM(litros_gasolina) as total_litros, 
        SUM(costo) AS monto_total FROM control_combustible WHERE id_eco='$eco'";
        $datos2 = $obj->obtenerDatos($query2); 
        foreach($datos2 as $row2){
            $pdf->Cell(50, 10, $dia_1, 1, 0, 'C');
            $pdf->Cell(50, 10, $dia_2, 1, 0, 'C');
            $pdf->Cell(50, 10, $row2['total_litros'], 1, 0, 'C');
            $pdf->Cell(50, 10, '$ '.$row2['monto_total'], 1, 0, 'C');
        }

        $fechaActual = date('d-m-Y');
        $pdf->Output('Reporte de Combustible del ' . $dia_1 . ' al '. $dia_2 .'. economico '. $eco. 'pdf' . $fechaActual, 'D');
        // $pdf->Output();
    }
}
