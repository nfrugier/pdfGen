<?php

/**
 *
 *
 *
 */

require "vendor/autoload.php";

use \setasign\Fpdi\Fpdi;

$pdf = new FPDI('P', 'cm', 'A4');

//render the new pdf
$pdf->Output('I', 'blank.pdf', true);

?>