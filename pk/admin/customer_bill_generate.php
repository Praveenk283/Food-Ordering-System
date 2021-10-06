<?php
    require("database_connectivity.php");
    //call the FPDF library
    require('fpdf/fpdf.php');


$customer_id=$_POST['cd_id'];
$order_date=$_POST['ci_date'];
$order_no=$_POST['ci_order_no'];
$date = date('d-m-Y', strtotime($order_date));


    
$sql=$conn->prepare("SELECT * FROM customer_invoice,customer WHERE customer_invoice.cus_id=? AND customer_invoice.ci_date=? AND customer_invoice.ci_order_no=? AND customer_invoice.cus_id=customer.cus_id");
$sql->bind_param("isi",$customer_id,$order_date,$order_no);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();

    //A4 width : 219mm
    //default margin : 10mm each side
    //writable horizontal : 219-(10*2)=189mm
    //create pdf object
    $pdf = new FPDF('P','mm','A4');
    //add new page
    $pdf->AddPage();
    //set font to arial, bold, 14pt
    $pdf->SetFont('Arial','B',14);
    //Cell(width , height , text , border , end line , [align] )
    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(59 ,5,'INVOICE',0,1);//end of line
    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial','B',12);
//    $pdf->Image('images/logo.png',20,10,0);// logo of your company
    $pdf->Cell(20,10,'SUDHA TEA AND COFFEE',0,0);// logo of your company
    $pdf->Cell(59 ,5,'',0,1);//end of line
    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,'Date',0,0);
    $pdf->Cell(34 ,5,$date,0,1);//end of line
    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,'Order No.',0,0);
    $pdf->Cell(34 ,5,$order_no,0,1);//end of line
//    $pdf->Cell(130 ,5,'',0,0);
//    $pdf->Cell(25 ,5,'Invoice #',0,0);
//    $pdf->Cell(34 ,5,'Invoice #',0,1);//end of line
//    $pdf->Cell(130 ,5,'',0,0);
//    $pdf->Cell(25 ,5,'Customer ID ',0,0);
//    $pdf->Cell(34 ,5,'Customer ID',0,1);//end of line
    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(89 ,15,'',0,1);//end of line
    //billing address
    $pdf->Cell(100 ,5,'Bill To',0,1);//end of line
    //add dummy cell at beginning of each line for indentation
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,$row["cus_name"],0,1);
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,$row["ci_shipping_address"],0,1);
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,$row["ci_landmark"],0,1);
//    $pdf->Cell(10 ,5,'',0,0);
//    $pdf->Cell(90 ,5,'city',0,1);
//    $pdf->Cell(10 ,5,'',0,0);
//    $pdf->Cell(90 ,5,'pincode',0,1);
//    $pdf->Cell(10 ,5,'',0,0);
//    $pdf->Cell(90 ,5,'state',0,1);
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,'Mob : '.$row["cus_contact"],0,1);
//    $pdf->Cell(10 ,5,'',0,0);
//    $pdf->Cell(90 ,5,'Email : '.$row["cd_email_id"],0,1);
    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189 ,10,'',0,1);//end of line

    //invoice contents
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(15 ,10,'Sl No.',1,0);
    $pdf->Cell(85 ,10,'Product Name',1,0);
    $pdf->Cell(25 ,10,'Unit Price',1,0);
    $pdf->Cell(20 ,10,'Discount',1,0);
    $pdf->Cell(15 ,10,'QTY',1,0,'C');
    $pdf->Cell(29 ,10,'Amount',1,1,'C');//end of line

    $pdf->SetFont('Arial','',12);
    //Numbers are right-aligned so we give 'R' after new line parameter



$sql1=$conn->prepare("SELECT * FROM product_cart_details,stock_details WHERE product_cart_details.cus_id=? AND product_cart_details.pcd_order_no=? AND product_cart_details.pcd_date=? AND product_cart_details.pd_id=stock_details.pd_id");
$sql1->bind_param("iss",$customer_id,$order_no,$order_date);
$sql1->execute();
$result1=$sql1->get_result();
$total=0;                               
$sl=0;
while($row1=$result1->fetch_assoc())
{
    $total+=$row1['pcd_total_amount'];
    $sl=$sl+1;
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(15 ,10,$sl,1,0);
    $pdf->Cell(85 ,10,$row1['pcd_name'],1,0);
    $pdf->Cell(25 ,10,$row1['pcd_price'],1,0,'R');
    $pdf->Cell(20 ,10,$row1['sd_discount'],1,0,'R');
    $pdf->Cell(15 ,10,$row1['pcd_qty'],1,0,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(29 ,10,$row1['pcd_total_amount'],1,1,'R');//end of line
}
    //summary
//    $pdf->Cell(125 ,10,'',0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(160 ,10,'Subtotal',1,0,'R');
    $pdf->Cell(29 ,10,$total,1,1,'R');//end of line
    $pdf->Cell(160 ,10,'CGST( '.$row['ci_cgst_percent'].' %)',1,0,'R');
    $pdf->Cell(29 ,10,$row['ci_cgst'],1,1,'R');
    $pdf->Cell(160 ,10,'SGST( '.$row['ci_sgst_percent'].' %)',1,0,'R');
    $pdf->Cell(29 ,10,$row['ci_sgst'],1,1,'R');
    $pdf->Cell(160 ,10,'Delivery Charge',1,0,'R');
    $pdf->Cell(29 ,10,$row['ci_delivery_charges'],1,1,'R');
    $pdf->Cell(160 ,10,'Grnad Total',1,0,'R');
    $pdf->Cell(29 ,10,$row['ci_total_price'],1,1,'R');

    
    //output the result
    $pdf->Output();
?>

