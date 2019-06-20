<?php 

    $fundacionRepresentante = 'Adolfo Lopez Mateos';
    $oscRepresentante = 'Sention Bours';
    $fechaDia = 25;
    $fechaMes = 'Enero';
    $fechaAnio = 2019;

    require "includes/fpdf/fpdf.php";

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    $pdf->Image("assets/darmas_logo.jpg", 25, 10, 25, 25, "jpg");
    $pdf->SetY(15);
    $pdf->Cell(188, 10, 'Fundación Dar Más por Sonora', 0, 1, 'C');
    $y = $pdf->GetY();
    $pdf->SetFont("Arial", "", 12);
    $pdf->SetY($y+15);
    $pdf->Cell(188, 10, 'A quien corresponda: ', 0, 1, 'L');
    $pdf->MultiCell(188, 10, "Por medio de la presente se hace constatar que la organización social sin fines de lucro conocida como:", 0, "L", 0);
    $pdf->SetFont("Arial", "B", 14);
    $pdf->Cell(188, 10, 'Por un México con arboles', 0, 1, 'C');
    $pdf->SetFont("Arial", "", 12);
    $pdf->MultiCell(188, 10, "ha llegado a un convenio con Fundación Dar Más el día $fechaDia de $fechaMes de $fechaAnio en el cual se le estarán entregando por un periodo de 6 meses la cantidad mensual de:", 0, "L", 0);
    $pdf->SetFont("Arial", "B", 14);
    $pdf->Cell(188, 10, '150,000 (Cientocuenta mil) pesos mexicanos', 0, 1, 'C');
    $pdf->SetFont("Arial", "", 12);
    $pdf->MultiCell(188, 10, "con la condición de que en todo momento se cumplan con las metas que se establecieron y fueron aceptadas como validas por la fundación.", 0, "L", 0);
    
    $pdf->SetY(200);
    $pdf->Cell(188, 10, '__________________________                                        __________________________', 0, 1, 'C');
    $pdf->Cell(188, 10, "$fundacionRepresentante                                                                 $oscRepresentante", 0, 1, 'C');
    $pdf->Cell(188, 10, "Representante Fundación                                                         Representante OSC", 0, 1, 'C');
    
    $pdf->SetY(265);
    $pdf->Cell(188, 10, "Hermosillo, Sonora a $fechaDia de $fechaMes de $fechaAnio.", 0, 1, "R");
    $pdf->Output();

?>