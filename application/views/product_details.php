<?php
include('common/header.php');
$basepath = base_url('assets/');
?>
	<section>
		<div class="container">
			<div class="row">
			<!-- 	<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian">
							<?php foreach($category as $row){?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="<?php echo $row['id'];?>" data-toggle="tab"><?php echo $row['cat_name'];?></a></h4>
									</div>
								</div>
							<?php } ?>
						</div>

						<?php foreach($adsbanner as $row){?>
							<div class="shipping text-center">
								<img src="<?php  echo base_url().'/'.$row['image_path'] ?>" alt="" />
							</div>
						<?php } ?>
					</div>
				</div> -->
				<?php foreach ($itemdetails as $item) {?>
				<div class="col-sm-12 padding-right">

					<div class="product-details"><!--product-details-->
						<div class="col-sm-4">
							<div class="view-product">
								<img src="<?php  echo base_url().'/'.$item['image_path'] ?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
								    	<?php
								    		$count=count($images);
								    		 $counter = 0;
								    		 if ($counter == 0) {
								    	?>
												<div class="item active">
													<?php
														 foreach($images AS $row){
								    		  			$image = base_url($row['image_path']);
													?>
												  	<a href=""><img src="<?=$image?>" alt=""></a>
													<?php } ?>
											    </div>
									<?php } else{ ?>
												<div class="item">
													<?php
														 foreach($images AS $row){
								    		  			$image = base_url($row['image_path']);
													?>
													 	 <a href=""><img src="<?=$image?>" alt=""></a>
												  <?php } ?>
												</div>
										<?php } ?>
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-8">
							<form action="<?php  echo base_url(); ?>home/save_cart" method="post">
							<input type="hidden" name="p_name" value="<?php echo $item['p_name']?>">
							<input type="hidden" name="p_id" value="<?php echo $item['p_id']?>">
							<input type="hidden" name="p_price" value="<?php echo $item['p_price']?>">
							<div class="product-information"><!--/product-information-->
								<img src="<?=$basepath?>images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $item['p_brand']?></h2>
								<h3><?php echo $item['p_name']?></h3>
								<p>Product Code: <?php echo $item['p_id']?></p>
								<hr>
								<span>
									<label style="font-weight: 600px;font-size: 30px;color:#FE980F;"><i class="fa fa-inr"></i> <?php echo $item['p_offerprice'];?></label>
									<label  style="text-decoration: line-through;">
									<i class="fa fa-inr"></i> <?php echo $item['p_price'];?></label>
									&nbsp;
									&nbsp;
									<label style="font-size: 15px;"><b>Quantity:</b></label>
									<input type="text" value="1" name="quantity"/>
								</span>

								<h4>SELECT SIZE: &nbsp&nbsp&nbsp
									<?php foreach($size as $s){?>
										<input type="radio" name="size" value="<?php echo $s['name'];?>"checked="true">
									<?php echo $s['name']."&nbsp&nbsp&nbsp"; } ?>

								</h4>
								<p><b>Availability:</b> <?php echo $item['p_availability']?></p>
								<p><b>Condition:</b> <?php echo $item['p_condition']?></p>

									<input type="submit" class="btn btn-fefault cart pull-right" value="ADD TO CART"/>
								</p>

							</div><!--/product-information-->
						</form>
						</div>

					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<h5>Material & Fabric :</h5><p> <?php echo $item['p_material'];?></p>
								<h5>About Product</h5><p> <?php echo $item['p_description'];?></p>
							</div>
						</div>
					</div><!--/category-tab-->


				</div>
				<?php } ?>
			</div>
		</div>
	</section>

<?php
include('common/footer.php');
?>
