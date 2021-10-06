<?php 
require('database_connectivity.php');
session_start();
require("4_customer_session_data.php");//CONTAINS USER SESSION DATA
    
 if(isset($_POST["pcd_qty"]))
 {

$pd_id=$_POST["pd_id"];
$pd_name=$_POST["pd_name"];   
$cart_qty=$_POST["pcd_qty"];
$unit_price=$_POST["sd_unit_price"]; 
//$discount=$_POST["sd_discount"];
$discount_price=$_POST["sd_discount_price"];
$sale_price=$_POST["sd_sale_price"];   
$cart_page=$_POST["cart_page"];
// $pcd_order_no=8745765;

$cart_qty1=floatval($cart_qty);

$order_date=date('d-m-Y');
$total_price=$sale_price*$cart_qty1;
$cart_status="CART";    

//CHECK IF ITEM EXISTS IN CART OR NOT
$sql1=$conn->prepare("SELECT * FROM product_cart_details WHERE cus_id=? AND pd_id=? AND pcd_status=?");
$sql1->bind_param("iis",$cus_id,$pd_id,$cart_status);
$sql1->execute();
$result=$sql1->get_result();
$count=$result->num_rows;
if($count>=1)
{
    if($cart_page == "1")
    {
        echo "<script type='text/javascript'>
        alert('Item Exists in Cart!');
        window.history.back();
        </script>"; 
    }
    else
    {
        echo "<script type='text/javascript'>
    alert('Item Exists in Cart!');
    window.location='index.php';
    </script>"; 
    }
       
}
else
{
    //INSERT ITEM INTO CART

    // echo $pd_id; echo "<br>"; echo $pd_name; echo "<br>"; echo $cart_quantity; echo "<br>"; echo $unit_price; echo "<br>"; echo $discount; echo "<br>"; echo $discount_price; echo "<br>"; echo $sale_price;
    // echo "<br>"; echo "<br>"; echo "<br>";
    // echo $cus_id; echo "<br>"; echo $total_price; echo "<br>"; echo $pcd_order_no; echo "<br>"; echo $cart_status;


    $sql=$conn->prepare("INSERT INTO product_cart_details(pd_id,cus_id,pcd_name,pcd_qty,pcd_price,pcd_total_amount,pcd_status,pcd_date)VALUES(?,?,?,?,?,?,?,?)");
    $sql->bind_param("iisiddss",$pd_id,$cus_id,$pd_name,$cart_qty,$sale_price,$total_price,$cart_status,$order_date);
    if($sql->execute())
    {
        if($cart_page == "1")
        {
            echo "<script type='text/javascript'>
            alert('Item Added to Cart!');        
            window.history.back();
            </script>";
            }
        else
        {
            echo "<script type='text/javascript'>
            alert('Item Added to Cart!');
            window.location='index.php';
            </script>"; 
        }
    }
    else
    {
         if($cart_page == "1")
        {
        echo "<script type='text/javascript'>
        alert('Item Not Added to Cart!');        
        window.history.back();
        </script>"; 
         }
         else
        {
            echo "<script type='text/javascript'>
            alert('Item Not Added to Cart!');
            window.location='index.php';
            </script>"; 
        }
    }
}

}
else
{
    echo "not working";
}

?>