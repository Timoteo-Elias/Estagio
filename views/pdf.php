<?php
require_once '../conexao.php';
require_once '../pdf/fpdf.php';
$pdf = new FPDF('P', 'mm', array(90,120));
$pdf->AddPage();
$pdf->SetMargins(3, 0, 0);
$pdf->SetTitle("Matricula");
$pdf->SetFont('Arial', 'B', 12);
$id = $_GET['v'];
$idcliente = $_GET['cl'];
$clientes = mysqli_query($con, "SELECT * FROM matricular WHERE id = $idcliente");
$datosC = mysqli_fetch_assoc($clientes);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(20, 5, utf8_decode(''), 0, 1, 'L');
$pdf->Cell(20, 5, utf8_decode(''), 0, 1, 'L');
$pdf->Cell(20, 1, utf8_decode('Estamos localizando no município de viana, distrito do Zango'), 0, 2, 'L');
$pdf->Cell(35, 5, utf8_decode('Contactos; 935725857.'), 0, 0, 'L');
$pdf->Cell(20, 5, utf8_decode('Email: ginasiozango@gmail.com'), 0, 3, 'L');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(80, 5, utf8_decode("Informações do ginasio"), 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(30, 5, utf8_decode('Nome do aluno'), 0, 0, 'L');
$pdf->Cell(20, 5, utf8_decode('Sessão'), 0, 0, 'L');
$pdf->Cell(20, 5, utf8_decode('Mensalidade'), 0, 1, 'L');

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(30, 5, utf8_decode($datosC['nome']), 0, 0, 'L');
$pdf->Cell(20, 5, utf8_decode($datosC['aula']), 0, 0, 'L');
$pdf->Cell(20, 5, utf8_decode($datosC['valor']), 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, utf8_decode('Modelo'), 0, 0, 'L');
$pdf->Cell(40, 5, utf8_decode('Descrição'), 0, 1, 'L');
$pdf->SetFont('Arial', '', 7);

$pdf->Cell(20, 5, utf8_decode($datosC['modelo']), 0, 0, 'L');
$pdf->Cell(40, 5, utf8_decode($datosC['tipo']), 0, 1, 'L');
$pdf->Ln(3);


$pdf->Output("matricula.pdf", "I");

?>