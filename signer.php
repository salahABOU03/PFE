<?php
    //include('sauvegarde_pdf.php') ; 
    include('config.php');
    use setasign\Fpdi\Fpdi;

    require_once('fpdf/fpdf.php'); 
    require_once('fpdi2/src/autoload.php'); 
    //require_once('mis_variables_pdf.php'); 


    ob_start(); 

    $pdf = new FPDI();

    # Page 1
    $pdf->AddPage(); 
    $pdf->setSourceFile('Files_Pdf/PDF.pdf'); 
    $tplIdx = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx); 
        

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(80,250);
    $pdf->Write(10,$nombreFirma);
    $pdf->Image('one.png', 90, 248, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    //p   $pdf->Image('firmas/one.png', 10, 10, 50, 0, 'PNG', '', false, 0, -50);
    $archivo='Files_Pdf/PDF.pdf' ; 
    unlink($archivo); 



// $pdf->Output('VYWQ_15_12_20200.pdf', 'I'); //
      //$pdf->Output('original_uuuoouuupp.pdf', 'F');
      
        //$pdf->Output('original_update.pdf', 'I'); //
        ob_end_clean(); // clear output buffer
        //$pdf->Output('original_updklkate.pdf', 'D'); //
        $pdf->Output('D', 'my_document.pdf');
        

?>