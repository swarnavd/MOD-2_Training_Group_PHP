<?php
    use Fpdf\Fpdf;
    require 'vendor/autoload.php';
    $pdf = new Fpdf();
    $pdf -> AddPage();
    $pdf -> SetFont('Arial', 'B', 18);
    $pdf -> Cell(20, 10, 'Report', 0, 1, 'C');
    // $pdf->Output();
    $pdf->Output('D','report.pdf');
?>

