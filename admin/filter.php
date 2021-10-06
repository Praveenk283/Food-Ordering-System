<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
     // require("database_connectivity.php");
     $conn=new
         mysqli("localhost","root","","aminos");
if  ($conn->connect_errno)
{
  echo"failed to contact".$conn->connect_errno;
}  
      $output = '';  
      $query = "  
           SELECT * FROM customer_invoice ci , customer c
           WHERE ci.cus_id=c.cus_id AND ci.ci_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                               <th width="10%">Sl. No.</th>  
                               <th width="18%">Date</th>  
                               <th width="15%">Order No.</th>  
                               <th width="20%">Customer</th>  
                               <th width="20%">Payment Mode</th>  
                                 
                                 <th width="20%">Grand Total</th> 
                          </tr>  
      ';  
      $sl=1;
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'.  $sl++ .'</td>  
                          <td>'. $row["ci_date"] .'</td>  
                          <td>'. $row["ci_order_no"] .'</td>  
                          <td> '. $row["cus_name"] .'</td>  
                          <td>'. $row["ci_payment_mode"] .'</td>  
                          
                          <td>'. $row["ci_grand_total"] .'</td>
                          

                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="7">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>