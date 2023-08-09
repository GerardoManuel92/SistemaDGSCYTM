<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf

require './dompdf/autoload.inc.php';
$html = file_get_contents("http://localhost/Parque-Vehicular/PHP/reports/resguardosPDF.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->setPaper("legal","landscape");
$dompdf->render();
$dompdf->stream();
?>