<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rental Bay | Rentals for Every Occasion.
</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
  ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/font-awesome/css/font-awesome.min.css');
  ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/Ionicons/css/ionicons.min.css');
  ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/dist/css/AdminLTE.min.css');
  ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/dist/css/skins/_all-skins.min.css');
  ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/morris.js/morris.css');
  ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/jvectormap/jquery-jvectormap.css');
  ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
  ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css');
  ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
  ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('Demo')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ERS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rental Bay</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>      
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">   
      <li class="header" style="text-align: center;color: pink;letter-spacing: 2px;">MAIN &nbsp;NAVIGATION &nbsp;MENUS</li>    
        <!-- <li><a href=""><i class="fa fa-book"></i> <span>Simple</span></a></li>   -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php //echo base_url('Product/super_category')?>"><i class="fa fa-circle-o"></i>Super Category</a></li>
            <li><a href="<?php //echo base_url('product/category');  ?>"><i class="fa fa-circle-o"></i>Category</a></li>
            <li><a href="<?php //echo base_url('product/product');  ?>"><i class="fa fa-circle-o"></i>Product</a></li> 
          </ul>
        </li>  --> 
        <?php
          if (!($this->session->userdata('admin_login') == true))
    {
    redirect('login/admin_auth');
    }
    else{
        ?>
         <li>
          <a href="<?php echo base_url('supercategory/super_categories')?>">
            <i class="fa fa-sitemap"></i>
            <span>Super Category</span>
          </a>         
        </li>
        <li>
          <a href="<?php echo base_url('category/categories')?>">
            <i class="fa fa-tag"></i>
            <span>Category</span>
          </a>         
        </li>
        <li>
          <a href="<?php echo base_url('product/products')?>">
            <i class="fa fa-shopping-cart"></i>
            <span>Product</span>
          </a>         
        </li>
       <!--  <li>
          <a href="<?php //echo base_url('booking/productBooking')?>">
            <i class="fa fa-shopping-cart"></i>
            <span>Rent/Booking Management</span>
          </a>         
        </li> -->
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Booking Management</span>
           <!--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>         
            <li><a href="<?php echo base_url('booking/productBooking')?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-opencart"></i>&nbsp;&nbsp;&nbsp;Add Booking</a></li>
            <li><a href="<?php echo base_url('booking/manageBooking')?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-line-chart"></i>&nbsp;&nbsp;&nbsp;Booking Report</a></li>         
        </li>
        <!-- <li>
          <a href="<?php //echo base_url('stock/addStock')?>">
            <i class="fa fa-cubes"></i>
              <span>Stock Management</span>
          </a>             </li> -->
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Stock Management</span>           
          </a>         
            <li><a href="<?php echo base_url('stock/addStock')?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-opencart"></i>&nbsp;&nbsp;&nbsp;Add Stock</a></li>
            <li><a href="<?php echo base_url('stock/stockReport')?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-line-chart"></i>&nbsp;&nbsp;&nbsp;Stock Report</a></li>         
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-users"></i> <span>Contact Management</span>           
          </a>         
            <li><a href="<?php echo base_url('Contact/contact_query')?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus"></i>&nbsp;&nbsp;&nbsp;Contacted Users Details</a></li>
                     
        </li>
        <li>
          <a href="<?php echo base_url('login/logout')?>">
            <i class="fa fa-sign-out"></i>
            <span>Log Out</span>
          </a>         
        </li> 
        <?php
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>



