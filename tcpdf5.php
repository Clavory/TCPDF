<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


$pdf->AddPage();

$pdf->setFontSubsetting(false);

$pdf->SetFont('times', 'B', 45);

$pdf->Write(0, 'Font Types', '', 0, 'C', 1, 0, false, false, 0);

$pdf->Ln(10);

$pdf->SetFont('courier', '', 28);
$html = <<<EOD
<h3>"Your powers... are hidden deep within your heart... Like a god or devil, it is "another self"... Like a god, filled with love... Like a demon, merciless... Humans... go through life with many faces... Your current appearance is just another face... And so is your Persona... one of many..."</h3>
<p>-Philemon(Persona 2)</p>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Ln(20);


$pdf->SetFont('helvetica', 'I', 18);
$html = <<<EOD
<h3>"Do you know what the most convenient phrase in the world is? It's "I'm sorry." Anyone who hears that is obligated to forgive, no matter how hurt or angry they may be... There's no more disgusting phrase in all the world. It's used to displace your suffering onto others so you can escape your sins... The moment you employ it, your suffering becomes the other person's. A thing can be unforgivable, but oh, if they apologize... I say there's no reason to accept that suffering. You don't have to forgive them. Cast aside the mask of your conscience."</h3>
<p>-Shadow Maya</p>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output();
