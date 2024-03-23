<?php
use Fpdf\Fpdf;
require './vendor/autoload.php';
$tableData = [];
$tableMarks = [];
$pdf = new Fpdf();
$pdf->AddPage();
$pdf->Rect(5, 5, 200, 287);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Fullname:', 0, 0, 'L', false, '');
$pdf->Cell(100, 10, $fullName, 0, 0, 'L', false, '');

$pdf->Image($fileDestination, 150, 30, 50, 55, '', '');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50, 10, 'Subjects', 1, 0, 'C', false, '');
$pdf->Cell(50, 10, 'Score', 1, 0, 'C', false, '');
$pdf->Ln();

foreach ($subjectArray as $x) {
  $subjectMarks = explode('|', $x);
  $subjectActual = current($subjectMarks);
  $marksActual = end($subjectMarks);
  $tid = [$subjectActual,$marksActual];
  array_push($tableData,$tid);
}
foreach ($tableData as $x) {
  $pdf->Cell(50, 10, $x[0], 1, 0, 'C', false, '');
  $pdf->Cell(50, 10, $x[1], 1, 0, 'C', false, '');
  $pdf->Ln();
}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50, 10, 'Phone Number:', 0, 0, 'L', false, '');
$pdf->Cell(50, 10, $phoneNumber, 0, 0, 'L', false, '');
$pdf->Ln();
$pdf->Cell(50, 10, 'Email Id:', 0, 0, 'L', false, '');
$pdf->Cell(50, 10, $_POST['email'], 0, 0, 'L', false, '');
$pdf->Output();







