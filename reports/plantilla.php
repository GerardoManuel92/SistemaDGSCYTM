<?php


require_once 'fpdf/fpdf.php';

class PDF extends FPDF { 

    function Header(){
        // $this->Image('img/logo.png',10,8,30);
        $imgFile = dirname(__File__) . '/img/log.png';
        $imgDirec = dirname(__File__) . '/img/escudo.png';
        $imDrc = dirname(__File__) . '/img/dreccion.png';
        $this->Image($imgFile, 10, 2, 34);
        $this->image($imgDirec, 320, 5, 34);
        $this->image($imDrc, 150, 5, 54);
        $this->SetFont('Arial','B',15);

        // $this->Cell(80);
        // $this->Cell(30,10,'Reporte',1,0,'C');
        $this->Ln(20);
    }

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '. $this->PageNo().' Reporte-Vehicular',0,0,'C');
    }

 
}



?>