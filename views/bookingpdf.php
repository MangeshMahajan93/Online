<?php
$pdf = new FPDF();
$pdf->AddPage("L","","A4");
//$pdf->SetFont('Arial','B',16);
$pdf->SetFont('Arial','B',10);

 $a="RK.Nashik.Ph.:0253 00000000";
     $pdf->Rect(5,5,287,200, 'D');
    $pdf->Ln(20);
     $pdf->Image(APPPATH.'../assets/uploads/RentalBay_Logo.png',110,10,90,30);  
     
     $pdf->Cell(195,7,'Booking Date :'.$booking_result->booking_date);
     $pdf->Ln();
     $pdf->Cell(195,7,'Customer Name :'.$booking_result->customer_name);
     $pdf->Cell(195,7,'Mobile Number :'.$booking_result->mobile_number);
     $pdf->Cell(195,7,'Aadhar Card Number :'.$booking_result->aadhar_number);
     $pdf->Ln();
     foreach ($booking_details_result as $val) {}
      $pdf->Cell(195,7,'Booking Start Date :'.$val->booking_start_date);
     $pdf->Cell(195,7,'Booking Start Date :'.$val->booking_end_date);
     $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(12,7,'Sr.',1,0,'C');
    $pdf->Cell(40,7,'Super Category',1,0,'C');
    $pdf->Cell(40,7,'Category',1,0,'C');
    $pdf->Cell(100,7,'Product',1,0,'C');
    $pdf->Cell(25,7,'Rent Duration',1,0,'C');
    $pdf->Cell(20,7,'Quantity',1,0,'C');
    $pdf->Cell(20,7,'Rent Price',1,0,'C');
    $pdf->Cell(20,7,'Amount',1,0,'C');
    $pdf->Ln();
     $j=1;
    $total=0;
     foreach ($booking_details_result as $value) {
         # code...
        $pdf->Cell(12,7,$j,1);
        $pdf->Cell(40,7,$value->super_category_name,1);
    $pdf->Cell(40,7,$value->category_name,1);
    $pdf->Cell(100,7,$value->product_name,1);
    $pdf->Cell(25,7,$value->rent_duration,1);
    $pdf->Cell(20,7,$value->quantity,1);
    $pdf->Cell(20,7,$value->rent_price,1);
    $pdf->Cell(20,7,$value->amount,1);
        $pdf->Ln();
        $j++;
    }
     $pdf->Cell(250,7,'Total',1,0,'L');
     $pdf->Cell(27,7,$booking_result->total,1);
     $pdf->Ln();
     $pdf->Cell(250,7,'Discount',1,0,'L');
     $pdf->Cell(27,7,$booking_result->discount,1);
     $pdf->Ln();
     $pdf->Cell(250,7,'Discount Obtained Amount',1,0,'L');
     $pdf->Cell(27,7,$booking_result->discount_obtained_amount,1);
     $pdf->Ln();
     $pdf->Cell(250,7,'Security Deposit Amount',1,0,'L');
     $pdf->Cell(27,7,$booking_result->deposit_amount ,1);
     $pdf->Ln();
     $pdf->Cell(250,7,'Grand Total',1,0,'L');
     $pdf->Cell(27,7,$booking_result->grand_total ,1);
     $pdf->Ln();


$pdf->Output();
?>