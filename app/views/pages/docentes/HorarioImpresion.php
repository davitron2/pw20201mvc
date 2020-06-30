<?php


$pdf=new PDF_MC_Table();

$pdf->AddPage('L');
$pdf->SetFont('arial','B',16);

    $pdf->SetFillColor(90,90,90);
    $pdf->SetTextColor(255);
    $pdf->SetXY(35,17.5);
    $pdf->Cell(240,10,utf8_decode('NOO'),1,1,'C',1);
    $pdf->SetY(38);
    $pdf->SetTextColor(0);
    
    $pdf->Cell(270,7,'Horario',0,1,'C');
    $pdf->SetFont('arial','B',12);
    $pdf->Cell(270,7, utf8_decode( $datos['Docente'] )   ,0,1,'C');
    $pdf->Ln(2);
    #encabezado
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(35,40,40,40,40,40,40));
$pdf->Row(array( 'Materia','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'             ));
$pdf->SetFont('arial','',10);
foreach($datos['Horarios'] as $key=>$horario){
    $pdf->Row(array(  utf8_decode( $horario['Materia'] )   ,  utf8_decode($horario['Lunes']), utf8_decode($horario['Martes']), utf8_decode($horario['Miercoles']), utf8_decode($horario['Jueves']), utf8_decode($horario['Viernes']), utf8_decode($horario['Sabado']  )            ));
}
$pdf->Output();
?>
