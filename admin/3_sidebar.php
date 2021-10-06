<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
    <!-- class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav" -->
    <!-- Brand Logo -->
    <a href="./index.php" class="brand-link">
      <img src="./dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>amino's</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../images/amino/2_bg.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./hotel_view.php" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Branches
              </p>
            </a>
          </li>
           
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="nav-icon fas fa-hamburger"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./product_category_view.php" class="nav-link">
                  <i class="nav-icon fas fa-square"></i>
                  <p>Product Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./product_sub_category_view.php" class="nav-link">
                  <i class="nav-icon fas fa-th-large"></i>
                  <p>Product Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./product_details_view.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Product Details</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="./stock_view.php" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Stock
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./emp_view.php" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Employee
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./customer_view.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Customer
              </p>
            </a>
          </li>

          <li class="nav-header">OTHERS</li>
          <li class="nav-item">
            <a href="./customer_order_placed.php" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Customer Orders
                <span class="badge badge-info right"><?php echo $count;?></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./customer_order_report.php" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Order Report
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="./gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="./error_404.php" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
              </p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="./examples/contacts.html" class="nav-link">
              <i class="nav-icon far fa-address-book"></i>
              <p>
                Contacts
              </p>
            </a>
          </li> -->

        </ul>
      </nav>
    </div>
  </aside>

  