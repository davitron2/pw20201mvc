<?php 

    $pdf=new FPDF;
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
    $pdf->Cell(270,7,  $datos['Docente']    ,0,1,'C');
    $pdf->Ln(2);
    #encabezado
    
    $pdf->Cell(25,5,'Materia','LT',0,'C');
    $pdf->Cell(43,5,'Lunes','LT',0,'C');
    $pdf->Cell(43,5,'Martes','LT',0,'C');
    $pdf->Cell(43,5,'Miercoles','LT',0,'C');
    $pdf->Cell(43,5,'Jueves','LT',0,'C');
    $pdf->Cell(43,5,'Viernes','LT',0,'C');
    $pdf->Cell(43,5,'Sabado','LTR',1,'C');
    $pdf->SetFont('arial','',10);

        foreach($datos['Horarios'] as $key=>$horario){
            $pdf->Cell(25,10, $horario['Materia'],'LTB',0,'C');
            $pdf->Cell(43,10, $horario['Lunes'],'LTB',0,'C');
            $pdf->Cell(43,10, $horario['Martes'],'LTB',0,'C');
            $pdf->Cell(43,10, $horario['Miercoles'],'LTB',0,'C');
            $pdf->Cell(43,10, $horario['Jueves'],'LTB',0,'C');
            $pdf->Cell(43,10, $horario['Viernes'],'LTB',0,'C');
            $pdf->Cell(43,10, $horario['Sabado'],'LTBR',1,'C');
      
        }

        $pdf->SetY(-30);
        $pdf->Cell(260,5,'Derechos reservados'. date(' Y'),0,0,'R');
        $pdf->OutPut('usuarios'.time().'.pdf','I');


?>