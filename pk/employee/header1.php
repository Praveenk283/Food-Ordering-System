  <header class="main-header">
   <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>TC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b style="font-size:15px;">SUDHA TEA & COFFEE</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
 <?php
          require("database_connectivity.php");
          $status="ORDER PENDING";
          $sql=$conn->prepare("SELECT * FROM customer_invoice WHERE ci_status = ? ");
          $sql->bind_param("s",$status);
          $sql->execute();
          $result=$sql->get_result();
          $count=$result->num_rows;
          
          $sd_status="OUT OF STOCK";
          $sql1=$conn->prepare("SELECT * FROM stock_details WHERE sd_status = ? ");
          $sql1->bind_param("s",$sd_status);
          $sql1->execute();
          $result1=$sql1->get_result();
          $count1=$result1->num_rows;
          
          ?>
          <li class="dropdown notifications-menu"> 
          <a  href="stock_view.php">
          <button class="btn btn-sm btn-danger">OUT OF STOCK <sup style="font-size:15px;">&nbsp;<?php echo $count1;?></sup></button>
          </a>   
                    </li>
          <li class="dropdown notifications-menu">
            <a href="customer_order_placed.php">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><b style="font-size:15px;"><?php echo $count;?></b></span>
            </a>
           
          </li>

            <li><a href="admin_profile.php" class="tooltip-show" data-toggle="tooltip" title="profile" data-placement="bottom"><i class="fa fa-user"></i></a></li>
            <li><a href="admin_password_form.php" class="tooltip-show1" data-toggle="tooltip" title="password" data-placement="bottom"><i class="fa fa-key"></i></a></li>
            <li><a href="logout.php"class="tooltip-show2" data-toggle="tooltip" title="logout" data-placement="bottom"><i class="fa fa-sign-out"></i></a></li>
        </ul>
      </div>
    </nav>
 </header>