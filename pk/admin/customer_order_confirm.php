<?php
    require("database_connectivity.php");

    $customer_invoice_id=$_POST['ci_id'];
    $customer_id=$_POST['cus_id'];
    $order_date=$_POST['ci_date'];
    $order_no=$_POST['ci_order_no'];
    $total_amount=$_POST['ci_grand_total'];

    $order_status="ORDER CONFIRMED";

    $sql=$conn->prepare("SELECT * FROM product_cart_details WHERE cus_id=? AND pcd_date=?");
    $sql->bind_param("is",$customer_id,$order_date);
    $sql->execute();
    $result=$sql->get_result();
    if($result->num_rows > 0 )
    {
        $sql11=$conn->prepare("SELECT * FROM customer WHERE cus_id = ? ");
        $sql11->bind_param("i",$customer_id);
        $sql11->execute();
        $result11=$sql11->get_result();
        $row11=$result11->fetch_assoc();
        $customer_name = $row11["cus_name"];
        $customer_contact = $row11["cus_contact"];
        
        // $msg="$customer_name, your order has been confirmed of Rs. $total_amount (Order No.: $order_no). It will be delivered soon.";
        // $data=urlencode($msg);
        // $sms="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=1234567890&sender=INVSIT&phone=$customer_contact&text=$data&priority=ndnd&stype=normal";
        // $content = file_get_contents($sms);
        
        $sql1=$conn->prepare("UPDATE customer_invoice SET ci_status=? WHERE ci_id=? ");
        $sql1->bind_param("si",$order_status,$customer_invoice_id);
        $sql1->execute();
        
        while($row=$result->fetch_assoc())
        {
            $prod_cart_id=$row["pcd_id"];
            $sql1=$conn->prepare("UPDATE product_cart_details SET pcd_status=? WHERE pcd_id=? ");
            $sql1->bind_param("si",$order_status,$prod_cart_id);
            $sql1->execute();
            
            $sql2=$conn->prepare("SELECT * FROM product_cart_details WHERE pcd_id=?");
            $sql2->bind_param("i",$prod_cart_id);
            $sql2->execute();
            $result2=$sql2->get_result();
            $row2=$result2->fetch_assoc();
            $prod_det_id=$row2["pd_id"];
            $prod_cart_qty=$row2["pcd_qty"];
            
            $sql3=$conn->prepare("SELECT * FROM stock_details WHERE pd_id=?");
            $sql3->bind_param("i",$prod_det_id);
            $sql3->execute();
            $result3=$sql3->get_result();
            $row3=$result3->fetch_assoc();
            $stock_id=$row3["sd_id"];
            $stock_qty=$row3["sd_qty"];
            // $min_stock_qty=3;
            
            $quantity=$stock_qty - $prod_cart_qty;
            
            // $sql4=$conn->prepare("SELECT * FROM extra_charges");
            // $sql4->execute();
            // $result4=$sql4->get_result();
            // $row4=$result4->fetch_assoc();
            // $min_stock_qty=$row4["min_stock_qty"];
            
            if($quantity <= 1)
            {
                $stock_status = "OUT OF STOCK";
            }
            else
            {
                $stock_status = "IN STOCK";
            }
            
            $sql5=$conn->prepare("UPDATE stock_details SET sd_qty=?,sd_status=? WHERE sd_id=? ");
            $sql5->bind_param("isi",$quantity,$stock_status,$stock_id);
            $sql5->execute();
        }
        
        echo"<script type='text/javascript'>
    alert('Order Confirmed!');
    window.location='customer_order_placed.php';
    </script>";
    }
    else
    {
        echo"<script type='text/javascript'>
    alert('Order Not Confirmed!');
    window.location='customer_order_placed.php';
    </script>";
    }
        

    
?>