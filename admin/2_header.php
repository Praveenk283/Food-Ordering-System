  <!-- Navbar -->
  <nav class="main-header navbar fixed-top navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link" target="blank">Home</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
    
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

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="stock_view.php">
          <i class="far fa-bell" style="font-size:25px"><sup style="font-size:15px;">&nbsp;<?php echo $count1;?></sup> </i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>

        <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a> -->

          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a> -->

         
<!--
         <li class="dropdown notifications-menu"> 
          <a  href="stock_view.php">

          <button class="btn btn-sm btn-danger">OUT OF STOCK <sup style="font-size:15px;">&nbsp;<?php echo $count1;?></sup></button>
          </a>   
                    </li>
-->


          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div> -->
      </li>

      &emsp;

      <!-- Profile Start -->
      <li>
        
        <div class="user-area dropdown float-right">
                        <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../images/amino/2_bg.png" height="40" width="40" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="admin_profile.php"><i class="fa fa-user"></i> Edit Profile</a>

                            <a class="nav-link" href="admin_password_form.php"><i class="fa fa-lock"></i> Change Password</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
                        </div>
          </div>
        

      </li>
      <!-- Profile End -->
      
    </ul>
  </nav>
  <!-- /.navbar -->
