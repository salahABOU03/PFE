<?php
    //include('sauvegarde_pdf.php') ; 
    include('config.php');
    use setasign\Fpdi\Fpdi;

    require_once('fpdf/fpdf.php'); 
    require_once('fpdi2/src/autoload.php'); 
    require_once('mis_variables_pdf.php'); 

    ob_start(); // start output buffering

    $pdf = new FPDI();

    # Page 1
    $pdf->AddPage(); 
    //$pdf->setSourceFile($archivo); 
    $pdf->setSourceFile('Files_Pdf/PDF.pdf'); 
    $tplIdx = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx); 
   /* $pdf->SetFont('Arial', 'B', '15'); 
    $pdf->SetXY(90,50);
    $pdf->Write(10,$nombreEncargado);


    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(10,220);
    $pdf->Write(10,$Cargo);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(100,220);
    $pdf->Write(10,$nametecnico1);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(180,220);
    $pdf->Write(10,$tiempo1); 

  
   
    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(10,224);
    $pdf->Write(10,$tecnico2);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(100,224);
    $pdf->Write(10,$nametecnico2);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(180,224);
    $pdf->Write(10,$tiempo2);*/

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(80,250);
    $pdf->Write(10,$nombreFirma);
    $pdf->Image('firmas/one.png', 90, 248, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    //p   $pdf->Image('firmas/one.png', 10, 10, 50, 0, 'PNG', '', false, 0, -50);
    $archivo='Files_Pdf/PDF.pdf' ; 
    unlink($archivo); 


/*
    # Pagina 2
    $pdf->AddPage(); 
    $tplIdx1 = $pdf->importPage(2); 
    $pdf->useTemplate($tplIdx1);     
    $pdf->SetFont('Arial', 'B', '12'); 
    $pdf->SetXY(60,95);
    $pdf->Write(10,$trabajoRealizar." - ".$posicion." - ".$dimension);


    $pdf->SetFont('Arial', 'B', '12'); 
    $pdf->SetXY(10,140);
    $pdf->Write(10,$materiales);

    $pdf->SetFont('Arial', 'B', '12'); 
    $pdf->SetXY(10,145);
    $pdf->Write(10,$id." - ".$codigo." - ".$descripcion." - ".$cantidad);

    $pdf->SetFont('Arial', 'B', '12'); 
    $pdf->SetXY(10,150);
    $pdf->Write(10,$id1." - ".$codigo1." - ".$descripcion1." - ".$cantidad1);


    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(107,200);
    $pdf->Write(10,$textosupervisor);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(107,205);
    $pdf->Write(10,$namesupervisor);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(80,250);
    $pdf->Write(10,$nombreFirma);
    $pdf->Image('firmas/one.png', 90, 248, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);*/


// $pdf->Output('VYWQ_15_12_20200.pdf', 'I'); //SALIDA DEL PDF
      //$pdf->Output('original_uuuoouuupp.pdf', 'F');
      
        //$pdf->Output('original_update.pdf', 'I'); //PARA ABRIL EL PDF EN OTRA VENTANA
        ob_end_clean(); // clear output buffer
        //$pdf->Output('original_updklkate.pdf', 'D'); //PARA FORZAR LA DESCARGA
        $pdf->Output('D', 'my_document.pdf');
        

?>