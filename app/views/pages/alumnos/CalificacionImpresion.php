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
    $pdf->Cell(270,7, utf8_decode( $datos['alumno'] )   ,0,1,'C');
    $pdf->Cell(270,7,utf8_decode('Calificaciones'),0,1,'C');
    $pdf->SetFont('arial','B',12);

    $pdf->Ln(2);
    #encabezado
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,16,32,32,32,32,32,32,32));
$pdf->Row(array( 'Materia','Grupo','Unidad 1','Unidad 2','Unidad 3','Unidad 4','Unidad 5','Unidad 6','Unidad 7'          ));
$pdf->SetFont('arial','',13);
foreach($datos['materias'] as $key=>$horario){
    $pdf->Row(array(  utf8_decode( $horario['materia'] )    ,utf8_decode( $horario['grupo'] )   , utf8_decode( $horario['unidad1'] )   ,  utf8_decode($horario['unidad2']), utf8_decode($horario['unidad3']), utf8_decode($horario['unidad4']), utf8_decode($horario['unidad5']), utf8_decode($horario['unidad6']), utf8_decode($horario['unidad7']  )            ));
}
$pdf->Output();
?>
