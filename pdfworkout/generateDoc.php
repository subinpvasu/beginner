<?php
require('./pdfphp/fpdf.php');
require '../infobis.in/testfilepdf.php';

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
	$this->Image('info.png',10,15,50);
    $this->Image('../boy.png',160,25,30);
    $this->Ln(10);
    // Arial bold 15
    $this->SetFont('Arial','B',18); $this->Cell(80);
    $this->Cell(30,10,'SMART BUSINESS','center',0,'C'); $this->Ln(10);
    $this->SetFont('Arial','B',10);
   
    // Move to the right
    $this->Cell(80);
   
    // Title
   
    $this->Cell(30,10,'FRANCHISE REGISTRATION','center',0,'C');
    // Line break
    
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-25);
    // Arial italic 8
    $this->SetFont('Arial','',12);
    // Page number
    $this->Cell(0,10,'Gitacommunications '.date("Y"),0,0,'C');
}
}
/*
 * Necessary variables are those below and an image to be shown.
 */


$email 			= 'subinpvasu@gmail.com';
$mobile   		= '9495546474';
$landline 		= '04872335165';
$address  		= 'House name,Place name,pincode.';
$pincode  		= 680301;
$place 			= 'placename';
$district 		= 'Thrissur';
$state 			= 'Kerala';
$refferedby   	= 'subin';
$referenceid 	= '04';

/*
 * end.
 */


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);


$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Ln();$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'Name.................................... : ','',0,0);$pdf->Cell(52,10,$name,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'E-mail.................................. : ','',0,0);$pdf->Cell(52,10,$email,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'Mobile.................................. : ','',0,0);$pdf->Cell(52,10,$mobile,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'Landline................................ : ','',0,0);$pdf->Cell(52,10,$landline,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'Address................................. : ','',0,0);$pdf->Cell(52,10,$address,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'PinCode................................ : ','',0,0);$pdf->Cell(52,10,$pincode,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'Place..................................... : ','',0,0);$pdf->Cell(52,10,$place,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'District.................................. : ','',0,0);$pdf->Cell(52,10,$district,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'State...................................... : ','',0,0);$pdf->Cell(52,10,$state,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'Reffered By........................... : ','',0,0);$pdf->Cell(52,10,$refferedby,'',0,1);$pdf->Ln();
$pdf->Cell(10,10,'                                           ','',0,0);$pdf->Cell(80,10,'Reference ID......................... : ','',0,0);$pdf->Cell(52,10,$referenceid,'',0,1);$pdf->Ln();

$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Ln();$pdf->Ln();

$pdf->Cell(0,10,'Date :'.date("d-m-Y"),0,0);
$pdf->Ln();
$pdf->Cell(50,10,'Place :..........................',0,0);$pdf->Cell(100,10,'                                           ','',0,0);$pdf->Cell(250,10,'Signature.','right',0,1);

$pdf->Output($name.".pdf",'I');
 
?>
