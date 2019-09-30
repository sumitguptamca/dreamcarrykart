<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$basepath = base_url('assets/');
?>
<footer id="footer"><!--Footer-->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<?php if (!$_SESSION['userid']) { ?>
									<li><a href="<?php echo base_url();?>seller">Seller Account</a></li>
								<?php } ?>
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<?php foreach($category as $row){?>
									<li><a href="#"><?php echo $row['cat_name'];?></a></li>
								<?php } ?>
								<!-- <li><a href="#">Shirt</a></li>
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Shoes</a></li>
								<li><a href="#">Watch</a></li>
								<li><a href="#">Glass</a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="<?=$basepath?>js/jquery.js"></script>
	<script src="<?=$basepath?>js/bootstrap.min.js"></script>
	<script src="<?=$basepath?>js/jquery.scrollUp.min.js"></script>
	<script src="<?=$basepath?>js/price-range.js"></script>
    <script src="<?=$basepath?>js/jquery.prettyPhoto.js"></script>
    <script src="<?=$basepath?>js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
</body>
</html>
