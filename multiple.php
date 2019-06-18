<?php

/**
*
*
*
*/

require "vendor/autoload.php";

use \setasign\Fpdi\Fpdi;

set_time_limit(45);

$pdf = new FPDI('P', 'cm', 'A4');

$pagecount = $pdf->setSourceFile('blank.pdf');

$counter = $_POST["nb"];

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

$tpl = $pdf->importPage(1);

if($counter <0 || $counter == 0 || ($counter > 200)){
    header("HTTP/1.1 404 Not Found");
    header("Refresh:0; url=404.html");
}
else {
    for($i = 1; $i <= $counter; $i ++){
        $pdf->AddPage('P','A4');

        $pdf->useTemplate($tpl);

        $pdf->SetFont('Courier');

        $pdf->Text(2,1.5,"Cute Pikachu is here !");
        $pdf->Image('pika.jpg', 2, 2, 10, 0,'JPG');
        $pdf->Text(2, 12, "Page ". $i . "/".$counter);
    }
}

//render the new pdf
$pdf->Output('I', 'multiple.pdf', true);

?>