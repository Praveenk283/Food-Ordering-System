<nav class="navbar header-navbar pcoded-header  " header-theme="theme4" >
<div class="navbar-wrapper">
<div class="navbar-logo">

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
<a class="mobile-menu" id="mobile-collapse" href="#!">
<i class="ti-menu"></i>
</a>
<a class="mobile-search morphsearch-search" href="#">
<i class="ti-search"></i>
</a>
<a href="index-2.html">
<img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" />
</a>
<a class="mobile-options">
<i class="ti-more"></i>
</a>
</div>
<div class="navbar-container container-fluid">
<div>
<ul class="nav-left">
<li>
<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
</li>
<li>
<a class="main-search morphsearch-search" href="#">

<i class="ti-search"></i>
</a>
</li>
<li>
<a href="#!" onclick="javascript:toggleFullScreen()">
<i class="ti-fullscreen"></i>
</a>
</li>
<!-- <li class="mega-menu-top">
<a href="#">
Mega
<i class="ti-angle-down"></i>
</a>
<ul class="show-notification row">
<li class="col-sm-3">
<h6 class="mega-menu-title">Popular Links</h6>
<ul class="mega-menu-links">
<li><a href="form-elements-component.html">Form Elements</a></li>
<li><a href="button.html">Buttons</a></li>
<li><a href="map-google.html">Maps</a></li>
<li><a href="user-card.html">Contact Cards</a></li>
<li><a href="user-profile.html">User Information</a></li>
<li><a href="auth-lock-screen.html">Lock Screen</a></li>
</ul>
</li>
<li class="col-sm-3">
<h6 class="mega-menu-title">Mailbox</h6>
<ul class="mega-mailbox">
<li>
<a href="#" class="media">
<div class="media-left">
<i class="ti-folder"></i>
</div>
<div class="media-body">
<h5>Data Backup</h5>
<small class="text-muted">Store your data</small>
</div>
</a>
</li>
<li>
<a href="#" class="media">
<div class="media-left">
<i class="ti-headphone-alt"></i>
</div>
<div class="media-body">
<h5>Support</h5>
<small class="text-muted">24-hour support</small>
</div>
</a>
</li>
<li>
<a href="#" class="media">
<div class="media-left">
<i class="ti-dropbox"></i>
</div>
<div class="media-body">
<h5>Drop-box</h5>
<small class="text-muted">Store large amount of data in one-box only
</small>
</div>
</a>
</li>
<li>
<a href="#" class="media">
<div class="media-left">
<i class="ti-location-pin"></i>
</div>
<div class="media-body">
<h5>Location</h5>
<small class="text-muted">Find Your Location with ease of use</small>
</div>
</a>
</li>
</ul>
</li>
<li class="col-sm-3">
<h6 class="mega-menu-title">Gallery</h6>
<div class="row m-b-20">
<div class="col-sm-4"><img class="img-fluid img-thumbnail" src="assets/images/mega-menu/01.jpg" alt="Gallery-1">
</div>
<div class="col-sm-4"><img class="img-fluid img-thumbnail" src="assets/images/mega-menu/02.jpg" alt="Gallery-2">
</div>
<div class="col-sm-4"><img class="img-fluid img-thumbnail" src="assets/images/mega-menu/03.jpg" alt="Gallery-3">
</div>
</div>
<div class="row m-b-20">
<div class="col-sm-4"><img class="img-fluid img-thumbnail" src="assets/images/mega-menu/04.jpg" alt="Gallery-4">
</div>
<div class="col-sm-4"><img class="img-fluid img-thumbnail" src="assets/images/mega-menu/05.jpg" alt="Gallery-5">
</div>
<div class="col-sm-4"><img class="img-fluid img-thumbnail" src="assets/images/mega-menu/06.jpg" alt="Gallery-6">
</div>
</div>
<button class="btn btn-primary btn-sm btn-block">Browse Gallery</button>
</li>
<li class="col-sm-3">
<h6 class="mega-menu-title">Contact Us</h6>
<div class="mega-menu-contact">
<div class="form-group row">
<label for="example-text-input" class="col-3 col-form-label">Name</label>
<div class="col-9">
<input class="form-control" type="text" placeholder="Artisanal kale" id="example-text-input">
</div>
</div>
<div class="form-group row">
<label for="example-search-input" class="col-3 col-form-label">Email</label>
<div class="col-9">
<input class="form-control" type="email" placeholder="Enter your E-mail Id" id="example-search-input">
</div>
</div>
<div class="form-group row">
<label for="example-search-input" class="col-3 col-form-label">Contact</label>
<div class="col-9">
<input class="form-control" type="number" placeholder="+91-9898989898" id="example-search-input">
</div>
</div>
<div class="form-group row">
<label for="exampleTextarea" class="col-3 col-form-label">Message</label>
<div class="col-9">
<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
</div>
</div>
 </div>
</li>
</ul>
</li> -->
</ul>
<ul class="nav-right">
<li class="header-notification lng-dropdown">
<a href="#" id="dropdown-active-item">
<i class="flag-icon flag-icon-gb m-r-5"></i> English
</a>

</li>

<li class="dropdown notifications-menu"> 
          <a  href="stock_view.php">

          <button class="btn btn-sm btn-danger">OUT OF STOCK <sup style="font-size:15px;">&nbsp;<?php echo $count1;?></sup></button>
          </a>   
                    </li>


<li class="header-notification">
<a href="customer_order_placed.php">
<i class="ti-bell"></i>
<span class="badge"><b style="font-size:15px;"><?php echo $count;?></b></span>
</a>


</li>

<li class="user-profile header-notification">
<a href="#!">
<img src="assets/images/user.png" alt="User-Profile-Image">
<span>Aminos </span>
<i class="ti-angle-down"></i>
</a>
<ul class="show-notification profile-notification">
<!-- <li>
<a href="#!">
<i class="ti-settings"></i> Settings
</a>
</li> -->
<li>
<a href="emp_profile.php">
<i class="ti-user"></i> Profile
</a>
</li>
<li>
<a href="emp_password_form.php">
<i class="ti-email"></i> Password
</a>
</li>
<!-- <li>
<a href="auth-lock-screen.html">
<i class="ti-lock"></i> Lock Screen
</a>
</li> -->
<li>
<a href="logout.php">
<i class="ti-layout-sidebar-left"></i> Logout
</a>
</li>
</ul>
</li>
</ul>

<div id="morphsearch" class="morphsearch">
<form class="morphsearch-form">
<input class="morphsearch-input" type="search" placeholder="Search..." />
<button class="morphsearch-submit" type="submit">Search</button>
</form>
<div class="morphsearch-content">
<div class="dummy-column">
<h2>People</h2>
<a class="dummy-media-object" href="#!">
<img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&amp;d=identicon&amp;r=G" alt="Sara Soueidan" />
<h3>Sara Soueidan</h3>
</a>
<a class="dummy-media-object" href="#!">
<img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&amp;d=identicon&amp;r=G" alt="Shaun Dona" />
<h3>Shaun Dona</h3>
</a>
</div>
<div class="dummy-column">
<h2>Popular</h2>
<a class="dummy-media-object" href="#!">
<img src="assets/images/avatar-1.png" alt="PagePreloadingEffect" />
<h3>Page Preloading Effect</h3>
</a>
<a class="dummy-media-object" href="#!">
<img src="assets/images/avatar-1.png" alt="DraggableDualViewSlideshow" />
<h3>Draggable Dual-View Slideshow</h3>
</a>
</div>
<div class="dummy-column">
<h2>Recent</h2>
<a class="dummy-media-object" href="#!">
<img src="assets/images/avatar-1.png" alt="TooltipStylesInspiration" />
<h3>Tooltip Styles Inspiration</h3>
</a>
<a class="dummy-media-object" href="#!">
<img src="assets/images/avatar-1.png" alt="NotificationStyles" />
<h3>Notification Styles Inspiration</h3>
</a>
</div>
</div>

<span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
</div>

</div>
</div>
</div>
</nav>