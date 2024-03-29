<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 // if (!isset($_SESSION['user_email'])) {
 //     redirect('home');
 //    exit;
 //    }
$basepath = base_url('assets/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dream Carrykart</title>
    <link href="<?=$basepath?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$basepath?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=$basepath?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=$basepath?>css/price-range.css" rel="stylesheet">
    <link href="<?=$basepath?>css/animate.css" rel="stylesheet">
	<link href="<?=$basepath?>css/main.css" rel="stylesheet">
	<link href="<?=$basepath?>css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?=$basepath?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$basepath?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$basepath?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$basepath?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=$basepath?>images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="<?=$basepath?>/dist/jquery.litebox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?=$basepath?>/dist/jquery.litebox.gallery.css" type="text/css" media="screen" />
<style type="text/css">
	.litebox overlay img{
		width: 500px

	}

</style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +91-7295860655</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@dreamcarrykart.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="<?php echo base_url();?>home"><img src="<?=$basepath?>images/home/logo-new.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								  <?php if($_SESSION['userid']){ ?>
								  	 <?php $itemcount=$this->Users_model->getAllitemCount($_SESSION['userid']);?>
							  <li><a href="<?php echo base_url();?>cart" style="font-weight: bold;font-size:15px;"><i class="fa fa-shopping-cart"></i> Cart (<?php print_r($itemcount['count']) ?>)</a></li>
							  <?php $wal=$this->Users_model->getAllwalletbyID($_SESSION['userid']);?>

							  <li><a href="#ex1" rel="modal:open" class="btn btn-default update"><i class="fa fa-money"></i> Add Wallet ( <i class="fa fa-inr"></i> <?php if(wal['amount']){echo $wal['amount'];}else{echo '0';} ?>)</a></li>
							<?php } ?>


								
							</ul>
						</div>
					</div>
					<div id="ex1" class="modal">
  					<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12">
						<div class="bill-to">
							<p>ADD AMOUNT</p>
							<div class="form-one" style="width: 100%">
					<form name="addAmount" method="POST" action="<?php echo base_url(); ?>home/addwallet">
									<input type="text" name="cname" placeholder="Enter Amount">
									<input type="submit" style="background-color: green"  name="submit" value="ADD AMOUNT">
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<?php if ($_SESSION['userid']) { ?>
									<li><a href="" class="active"><?php echo $_SESSION['user_name'];?></a></li>
									<li class="dropdown"><a href="#">My Account<i class="fa fa-angle-down"></i></a>
		                                <ul role="menu" class="sub-menu">
		                                   <li><a href=""><i class="fa fa-user"></i>&nbsp&nbsp My Account</a></li>
											<li><a href="<?php echo base_url()?>order"><i class="fa fa-crosshairs"></i>&nbsp&nbsp My Order</a></li>
											<!-- <li><a href=""><i class="fa fa-money"></i>&nbsp&nbsp Add Wallet</a></li> -->
											<li><a href="<?php echo base_url();?>home/logout"><i class="fa fa-power-off"></i>&nbsp&nbsp Logout</a></li>

		                                </ul>
		                            </li>
                           		<?php } else{?>
                                <li><a href="<?php echo base_url();?>login" class="active">Login & Signup</a></li>
                           		<?php } ?>
								<li><a href="contact-us.html">Contact Us</a></li>
							</ul>
						</div>
					</div>
					<!-- <div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div> -->
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	

