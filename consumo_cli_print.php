<?php
  $page_title = 'Estado ordenes';
  require_once('includes/load.php');
?>


<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logo.png', 5, 5, 25 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte de Estados de Ordenes',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>

<?php

$clientesCom = clientesCon();

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);

	$pdf->Cell(35,6,'Cliente',1,0,'C',1);
	$pdf->Cell(35,6,'Producto',1,0,'C',1);
	$pdf->Cell(35,6,'Tipo',1,0,'C',1);
	$pdf->Cell(35,6,'ID Orden',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha',1,1,'C',1);
	
    $pdf->SetFont('Arial','',10);
    
    foreach ($clientesCom as $orden):
		$pdf->Cell(35,6,$orden[0],1,0,'C');
		$pdf->Cell(35,6,$orden[1],1,0,'C');
		$pdf->Cell(35,6,$orden[2],1,0,'C');
		$pdf->Cell(35,6,$orden[3],1,0,'C');
		$pdf->Cell(35,6,date("d/m/Y", strtotime ($orden[4])),1,1,'C');       

    endforeach;
    
	$pdf->Output();
?>