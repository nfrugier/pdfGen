<?php

/**
 *
 *
 *
 */

require "vendor/autoload.php";

use \setasign\Fpdi\Fpdi;

$pdf = new FPDI('P', 'cm', 'A4');

$pagecount = $pdf->setSourceFile('blank.pdf');

$tpl = $pdf->importPage(1);
$pdf->AddPage();

$pdf ->useTemplate($tpl);

//set and insert stuff
$pdf->SetFont('Courier');

$pdf->SetFontSize('20');
$pdf->Text(2,1.5,"Cute Pikachu is here !");
$pdf->Image('pika.jpg', 2, 2, 10, 0,'JPG');
$pdf->Text(2, 12, "Hello !");

//render the new pdf
$pdf->Output("I", "pikachu.pdf", true);

?>