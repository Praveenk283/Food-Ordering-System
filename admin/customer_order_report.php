<?php  
  require("database_connectivity.php");
 $query = "SELECT * FROM customer_invoice ORDER BY ci_date desc";  
 $result = mysqli_query($conn, $query);  
 ?>  

 <!DOCTYPE html>
<html >
      <head>  
        <!-- <?php require("1_metatags.php"); ?> -->
       
           <!-- <title>Webslesson Tutorial | Ajax PHP MySQL Date Range Search using jQuery DatePicker</title> -->  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
           <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
        

<body >
<?php require("2_header.php"); ?>
<?php require("3_sidebar.php"); ?>

<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
<div class="content-overlay"></div>
<div class="content-wrapper">
<div class="content-header row">
<div class="content-header-left col-12 mb-2 mt-1">
<!-- 
  <div class="content-body"> -->
<!-- Basic Horizontal form layout section start -->
<!-- <section id="basic-horizontal-layouts">
<div class="row match-height">
<div class="col-md-2 col-12"></div>
<div class="col-md-8 col-12">
<div class="card">
<div class="card-header">
<center><h4 class="card-title">CUSTOMER INVOICE</h4></center>
</div>
<div class="card-content">
<div class="card-body">


</div>
</div>
</div>
</div>
<div class="col-md-2 col-12"></div>
</div>
</section> -->
<!-- // Basic Horizontal form layout section end -->

<!-- </div> -->

           <br /><br />  
           <div class="container" style="width:900px;">  
                <!-- <h2 align="center">Ajax PHP MySQL Date Range Search using jQuery DatePicker</h2>  
                <h3 align="center">Order Data</h3><br />  --> 
                <!-- <div class="col-md-3">  
                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div> -->  
                   <div class="form-body">
                   <div class="row">

                   <div class="col-md-12 form-group">
                   <label>From Date</label>
                   <input type="text" name="from_date" class="form-control" id="from_date">
                   <span id="from_date_error"></span>
                   </div>

               <!--  <div class="col-md-3">  
                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  --> 

                <div class="col-md-12 form-group">
                <label>To Date</label>
                <input type="text" class="form-control" name="to_date" id="to_date">
                <span id="to_date_error"></span>
                </div>

                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="SEARCH" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>
<!-- 
                 <div class="col-sm-12 d-flex justify-content-start">
                 <button type="submit" name="filter" id="filter" value="Filter" class="btn btn-info">GENERATE</button>
                 <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div> --> 

                 <!-- <div style="clear:both"></div>
                 <button type="reset" class="btn btn-primary mr-1 mb-1">Reset</button> -->
                <!-- <button type="button" class="btn btn-primary mr-1 mb-1" onclick="window.location.href='COR.php'">RESET</button> -->
                
            </div>

</div>
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <!-- <th width="5%">SL.NO</th>  
                               <th width="30%">DATE</th>  
                               <th width="43%">ORDER NO</th>  
                               <th width="10%">CUSTOMER NAME</th>  
                               <th width="12%">PAYMENT MODE</th>  
                                <th width="12%">SUB TOTAL</th> 
                                 <th width="12%">GRAND TOTAL</th>  -->
                          </tr>  
                    <!--  <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["order_id"]; ?></td>  
                               <td><?php echo $row["order_customer_name"]; ?></td>  
                               <td><?php echo $row["order_item"]; ?></td>  
                               <td>$ <?php echo $row["order_value"]; ?></td>  
                               <td><?php echo $row["order_date"]; ?></td>  
                          </tr>  
                     <?php  
                     }  
                     ?>   -->
                     </table>  
                </div>  
         <!--   </div> -->  
         </div>
       </div>
     </div>
   </div>



<?php require("4_footer_name.php"); ?>

    
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'dd-mm-yy'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>

