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
$tpl = $pdf->importpage(1);

$count = count(file("assets/test.csv",FILE_SKIP_EMPTY_LINES));
$pdf->SetFont('Courier');

$row = 1;
if(($handle = fopen("assets/test.csv","r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000,";")) !== FALSE) {
        $num = count($data);
        $pdf->AddPage('P','A4');
        $pdf->useTemplate($tpl);

        for($i = 0; $i <$num;$i++){
            for($j = 1; $j < $count; $j++){
                if($i==0){
                    //$pdf->Image("assets/images/".$data[$i], 2,2,10,0,'PNG'); -- au cas où
                    $pdf->Image("assets/images/".$data[$i], 2,2,10,0);

                }else {
                    $pdf->Text(2, 12+$i,utf8_decode($data[$i]));
                }
            }
        }
        $row++;
    }
    fclose($handle);
}



//render the new pdf
$pdf->Output('I', 'csvPdf.pdf', true);

?>