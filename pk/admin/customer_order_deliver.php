<?php
    require("database_connectivity.php");

    $customer_invoice_id=$_POST['ci_id'];
    $customer_id=$_POST['cus_id'];
    $order_date=$_POST['ci_date'];
    $order_no=$_POST['ci_order_no'];

    $order_status="ORDER DELIVERED";

    $sql=$conn->prepare("SELECT * FROM product_cart_details WHERE cus_id=? AND pcd_order_no=? AND pcd_date=?");
    $sql->bind_param("iis",$customer_id,$order_no,$order_date);
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
        
//        $msg="$customer_name (Order No.: $order_no) your order has been delivered successfully.";
//        $data=urlencode($msg);
//        $sms="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=1234567890&sender=INVSIT&phone=$customer_contact&text=$data&priority=ndnd&stype=normal";
        // $content = file_get_contents($sms);
        
        while($row=$result->fetch_assoc())
        {
            $prod_cart_id=$row["pcd_id"];
            $sql1=$conn->prepare("UPDATE product_cart_details SET pcd_status=? WHERE pcd_id=? ");
            $sql1->bind_param("si",$order_status,$prod_cart_id);
            $sql1->execute();
        }
        
        $sql1=$conn->prepare("UPDATE customer_invoice SET ci_status=? WHERE ci_id=? ");
        $sql1->bind_param("si",$order_status,$customer_invoice_id);
        $sql1->execute();
        echo"<script type='text/javascript'>
    alert('Order Delivered!');
   window.location='customer_order_placed.php';
    </script>";
    }
    else
    {
        echo"<script type='text/javascript'>
    alert('Order Not Delivered!');
    window.location='customer_order_placed.php';
    </script>";
    }
?>