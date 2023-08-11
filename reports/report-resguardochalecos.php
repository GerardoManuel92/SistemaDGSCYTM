<?php


include('../reports/plantilla.php');
include('../Conexion/Conexion.php');
include('../Metodos/MetodosAdminEP.php');
$obj = new MetodosAdmin();

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
$resultado = $obj->obtenerDatosChalecos($sql);

ob_end_clean();
$pdf = new PDF('L', 'mm', 'Legal');
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 25);
$pdf->SetTitle('Reporte de Vehiculos');
$pdf->Cell(100); 
$pdf->Cell(30, 10, 'Reporte de Vehiculos', 0, 0, );
$pdf->Ln(15);

$vehiculos = array(

    "Matricula",
    "Modelo chaleco",
    "Serie chaleco",
    "Modelo placa delantera",
    "Serie placa delantera",
    "Modelo placa trasera",
    "Serie placa trasera",
    "Elemento",
    "Región",
    "Talla",
    "Genero",
    "Cargo",
    "Numero empleado"
);

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(13, 10, "Matricula", 1, 0, 'C');
$pdf->Cell(20, 10, "Modelo chaleco", 1, 0, 'C');
$pdf->Cell(20, 10, "Serie chaleco", 1, 0, 'C');
$pdf->Cell(30, 10, "Modelo placa delantera", 1, 0, 'C');
$pdf->Cell(20, 10, "Serie delantera", 1, 0, 'C');
$pdf->Cell(35, 10, "Modelo placa trasera", 1, 0, 'C');
$pdf->Cell(17, 10, "Serie trasera", 1, 0, 'C');
$pdf->Cell(52, 10, "Elemento", 1, 0, 'C');
$pdf->Cell(45, 10, "Region", 1, 0, 'C');
$pdf->Cell(20, 10, "Talla", 1, 0, 'C');
$pdf->Cell(15, 10, "Genero", 1, 0, 'C');
$pdf->Cell(30, 10, "Cargo", 1, 0, 'C');
$pdf->Cell(20, 10, "# Empleado", 1, 0, 'C');
$pdf->Ln();




$pdf->SetTopMargin(20);

foreach($resultado as $row) {
    # code...
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(13, 10, $row['matricula'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['modchaleco'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['serieChaleco'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['modpldel'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['seriepldel'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['modpltr'], 1, 0, 'C');
    $pdf->Cell(17, 10, $row['serpltr'], 1, 0, 'C');   
    $pdf->Cell(52, 10, $row['nombre'].' '.$row['paterno'].' '.$row['materno'], 1, 0, 'C');
    $pdf->Cell(45, 10, $row['region'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['talla'], 1, 0, 'C');
    $pdf->Cell(15, 10, $row['sexo'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['cargo'], 1, 0, 'C');    
    $pdf->Cell(20, 10, $row['numEmp'], 1, 1, 'C');


}
$fechaActual = date('d-m-Y');

$pdf->Output('Resguardo chalecos' . $fechaActual .'.pdf' , 'D');


?>