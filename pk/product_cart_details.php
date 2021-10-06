<!doctype html>
<html class="no-js" lang="zxx">
<?php require("1_metatags.php"); ?>
    <body>
        <!-- header start -->
        <?php require("2_header.php"); ?>
		<!-- header end -->
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-2 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>CART</h3>
<!--
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Cart</li>
                    </ul>
-->
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
         <!-- shopping-cart-area start -->
        <div class="cart-main-area ptb-100">
            <div class="container">
              
                <div class="row">
                   
 <?php 
require("database_connectivity.php");    
require("4_customer_session_data.php"); 

// $sql4=$conn->prepare("SELECT * FROM extra_charges");
// $sql4->execute();
// $result4=$sql4->get_result();
// $row4=$result4->fetch_assoc();
// $max_stock_qty=$row4["max_stock_qty"];

$cart_status="CART";    
$sql=$conn->prepare("SELECT * FROM product_cart_details pcd,customer c,product_details pd,stock_details s WHERE pd.pd_id=s.pd_id AND pcd.cus_id=c.cus_id AND pcd.pd_id=pd.pd_id AND c.cus_id=? AND pcd.pcd_status=?");
$sql->bind_param("is",$cd_id,$cart_status);
$sql->execute();
$result=$sql->get_result();
if($result->num_rows>0){
?>                  
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-content table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
<!--                        <th>Discout</th>-->
                        <th>Quantity(kg)</th>
                        <th>Total</th>
                        <th>UPDATE</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
                                    $total_amount=0;    
                                    $sl=1;    
                                    while($row=$result->fetch_assoc()){
                                    $total_amount=$total_amount+$row['pcd_total_amount'];
                                    ?>
                    <tr>
                       <td class="product-name">
                       <?php echo $sl++; ?>
                       </td>
                        <td class="product-thumbnail">
                            <img src="admin/photos/<?php echo $row["pd_image1"];?>" alt="" width="100" height="100">
                        </td>
                        <td class="product-name">
                        <?php echo $row["pcd_name"];?></td>
                        <td class="product-price-cart">
                        <span class="amount">&#8377; <?php echo $row["sd_unit_price"];?></span></td>
<!--
                         <td class="product-subtotal">
                        &#8377; <?php //echo $row["sd_discount"];?>
                        </td>
-->
                        <form method="post" action="product_add_cart_update.php">  
                        <td class="product-quantity">
                            <div class="pro-dec-cart">
                                <input class="cart-plus-minus-box" type="number" name="update_qty" id="update_qty" value="<?php echo $row["pcd_qty"];?>" min="5" max="<?php echo $max_stock_qty;?>">
                            </div>
                        </td>
                       
                        <td class="product-subtotal">
                        &#8377; <?php echo $row["pcd_total_amount"];?>
                        </td>
                        <td class="product-remove">
                            <input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row['pd_id'];?>"> 
                            <input type="hidden" name="pcd_id" id="pcd_id" value="<?php echo $row['pcd_id'];?>">   
                            <input type="hidden" name="sd_unit_price" id="sd_unit_price" value="<?php echo $row['sd_unit_price'];?>">
                            <input type="hidden" name="sd_discount" id="sd_discount" value="<?php echo $row['sd_discount'];?>">
                          <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-pencil"></i></button>
                            </td>
                        </form>  
                        <td class="product-remove">
                           <form method="post" action="product_add_cart_delete.php">
                                <input type="hidden" name="pcd_id" id="pcd_id" value="<?php echo $row['pcd_id'];?>">  
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                       </td>
                       
                                   
                    </tr>
                 <?php  }   ?>   
                   
                </tbody>
            </table>
        </div><br>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            
        </div>
        <div class="col-lg-4 col-md-6">
           
        </div>
        <div class="col-lg-4 col-md-12">
<?php 
$sql3=$conn->prepare("SELECT * FROM extra_charges");
$sql3->execute();
$result3=$sql3->get_result();
$row3=$result3->fetch_assoc();
$cgst=$row3['cgst'];
$sgst=$row3['sgst'];
$cgst_tot=$total_amount*$cgst/100;
$sgst_tot=$total_amount*$sgst/100;
$min_total_amount=$row3["minimum_amount"];
$delivery_charges=$row3["delivery_charges"];
$grand_total=$total_amount+$cgst_tot+$sgst_tot;
if($grand_total<$min_total_amount)
{
    $d_charges=$delivery_charges;
    $grand_total=$grand_total+$d_charges;
}
else
{
    $d_charges=0;
}
?>
            <div class="grand-totall">
                <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                </div>
                <h5>Subtotal<span>&#8377; <?php echo $total_amount;?></span></h5>
                <h5>CGST (<?php echo $cgst;?>%) <span>&#8377; <?php echo $cgst_tot;?></span></h5>
                <h5>SGST (<?php echo $sgst;?>%) <span>&#8377; <?php echo $sgst_tot;?></span></h5>
                 <?php 
        if($d_charges!=0)
        {
        ?>
                <h5>Delivery Charges <br>(Free Delivery Above <?php echo $min_total_amount;?>) <span>&#8377; <?php echo $delivery_charges;?></span>
                </h5>
        <?php
        }else{
        ?>
                <h5>Delivery Charges <span>Free Delivery</span></h5>
        <?php    
        }
        ?>
                <h4 class="grand-totall-title">Grand Total <span>&#8377; <?php echo $grand_total;?></span></h4>
                <form action="product_checkout.php" method="post">
        <input type="hidden" name="grand_total" id="grand_total" value="<?php echo $grand_total;?>">
        <input type="hidden" name="ci_sub_total" id="ci_sub_total" value="<?php echo $total_amount;?>">
        <input type="hidden" name="ci_delivery_charges" id="ci_delivery_charges" value="<?php echo $d_charges;?>">
        <input type="hidden" name="ci_cgst_percent" id="ci_cgst_percent" value="<?php echo $cgst;?>">
        <input type="hidden" name="ci_cgst" id="ci_cgst" value="<?php echo $cgst_tot;?>">
        <input type="hidden" name="ci_sgst_percent" id="ci_sgst_percent" value="<?php echo $sgst;?>">
        <input type="hidden" name="ci_sgst" id="ci_sgst" value="<?php echo $sgst_tot;?>"> <br>
        <center>
        <button type="submit" class="btn btn-lg btn-success" style="width:100%;">Proceed to Order</button>  
        </center>
    </form>
            </div>
        </div>
    </div>
</div>
  <?php 
}
else{
?>
           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                <center><h1>SHOPPING CART EMPTY..!</h1></center>
                
            </div>
        
           <?php    
}    
?>                  
                    
                    
                </div>
            </div>
        </div>
        <!-- Footer style Start -->
       <?php require("3_newsletter.php"); ?>
<?php require("4_footer.php"); ?>
<?php require("5_footerscripts.php"); ?>
    </body>
</html>
