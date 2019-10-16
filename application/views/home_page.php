<?php 
include('common/header.php');
$basepath = base_url('assets/');
// echo "<pre>"; print_r($_SERVER['SERVER_NAME']);
?>
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							 <?php echo $indicators; ?>
						</ol>
						
						<div class="carousel-inner">
							 <?php echo $slides; ?>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="<?php echo base_url()?>home">ALL</a></h4>
									</div>
									<?php foreach($category as $row){ if($row['status'] == 1){?>
									<div class="panel-heading">
										<!-- data-toggle="tab" -->

										<h4 class="panel-title"><a href="<?php echo base_url()?>home?id=<?php echo $row['id']; ?>"><?php echo $row['cat_name'];?></a></h4>

									</div>
									<?php } } ?>
								</div>

						</div><!--/category-products-->

						<?php  foreach($adsbanner as $row){ if( $row['status'] ==1){?>
							<div class="shipping text-center"><!--shipping-->
								<img src="<?php  echo base_url().'/'.$row['image_path'] ?>" alt="" />
							</div>
						<?php } }?>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">All Items</h2>
						<?php if($product){foreach ($product as $item) {  if($item['status'] == 1){?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="<?=base_url()?>product-details?id=<?= $item['p_id'];?>"><img src="<?php  echo base_url().'/'.$item['image_path'] ?>" alt="" /></a>
											<p style="margin-top: 10px"><i class="fa fa-inr"></i> <span style="text-decoration: line-through;"><?php echo $item['p_price'];?></span>  &nbsp;<i class="fa fa-inr"></i><?php echo $item['p_offerprice'];?> </p>
											<!-- <h4>Offer Price Rs. </h4> -->
											<p><?php echo $item['p_name']?></p>
											<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
										</div>
										 <div class="product-overlay">
											<div class="overlay-content">
												<p><i class="fa fa-inr"></i> <span style="text-decoration: line-through;"><?php echo $item['p_price'];?></span> &nbsp;<i class="fa fa-inr"></i><?php echo $item['p_offerprice'];?> </p>
											<p><?php echo $item['p_name']?></p>

												<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
												<a href="<?=base_url()?>product-details?id=<?= $item['p_id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>View</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<!-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li> -->
										<li><a href="<?=base_url()?>product-details?id=<?= $item['p_id'];?>"><i class="fa fa-plus-square"></i>View</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php }}}else{ ?>
							<h5>No Record Found</h5>
						<?php } ?>
						<!-- <ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul> -->
					</div><!--features_items-->

				</div>
			</div>
		</div>
	</section>

<?php
include('common/footer.php');
?>

