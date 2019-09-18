<?php
   if (!isset($_SESSION['admin_email'])) {
     redirect('admin');
    exit;
    }
$basepath = base_url('assets_admin/');

?>
<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin|DreamCarrykart</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/chosen/chosen.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>vendors/jqvmap/dist/jqvmap.min.css"> -->
    <link rel="stylesheet" href="<?=$basepath?>css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
</head>
<body>

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"> <strong>Welcome <?php echo $_SESSION['adminname']  ?> </strong></a>

            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url(); ?>admin/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <!-- <h3 class="menu-title">UI elements</h3>-->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Banner Management</a>
                         <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo base_url();?>admin/banner">Banner List</a></li>
                            <li><a href="<?php echo base_url();?>admin/banner/add">Add Banner</a></li>

                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-md"></i>Ads Banner</a>
                         <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo base_url();?>admin/ads_banner">Ads List</a></li>
                            <li><a href="<?php echo base_url();?>admin/ads_banner/add">Add </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-plus"></i>Product Catagory </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo base_url();?>admin/category">Catagory List</a></li>
                          
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-credit-card-alt"></i>Order</a>
                         <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo base_url();?>admin/order">All Order</a></li>
                            <li><a href="<?php echo base_url();?>admin/order/c_order">Confirm Order</a></li>
                            <li><a href="<?php echo base_url();?>admin/order/p_order">Pending Order</a></li>
                            <li><a href="<?php echo base_url();?>admin/order/cancel_order">Cancel Order</a></li>
                        </ul>
                    </li>
                  
                 
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Users</a>
                         <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo base_url();?>admin/adminuser">User List</a></li>

                        </ul>
                    </li>
                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Seller</a>
                         <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo base_url();?>admin/adminseller">Seller List</a></li>

                        </ul>
                    </li>
                       <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-o"></i>Report</a>

                    </li>

                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-question-circle"></i>Enquiry</a>
                    </li>
                     <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-question-circle"></i>Subscribers</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Setting </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="#">Language</a></li>
                            <li>
                                <a href="#">Tell Us What You Love</a>
                            </li>
                            <li>
                                <a href="#">Agency Name</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
