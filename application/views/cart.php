<?php
include('common/header.php');
$basepath = base_url('assets/');
?>
<form name="upcatecart" method="POST" action="<?php echo base_url(); ?>home/update_cart">
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>home">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"></td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="quantity">Size</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							if($cartdetails){
								foreach($cartdetails as $cart){?>
								<tr>
								<td class="cart_product">
									<a href=""><img src="<?= base_url().'/'.$cart['image_path']?>" alt="" style="width: 100px;height: 100px;"></a>
								</td>
								<td class="cart_description">
									<h4><a href="<?=base_url()?>product-details?id=<?= $cart['p_id'];?>"><?php echo $cart['p_name'];?></a></h4>
									<p><?php echo $cart['p_id'];?></p>
							<input type="hidden" name="p_id[]" value="<?php echo $cart['p_id'];?>">
							<input type="hidden" name="p_name[]" value="<?php echo $cart['p_name'];?>">
								</td>
								<td class="cart_price">
									<p>Rs. <?php echo $cart['p_price']?></p>
									<input type="hidden" name="p_price[]" value="<?php echo $cart['p_price'];?>">
								</td>
								<td class="cart_quantity">

									<div class="cart_quantity_button">
										<input class="cart_quantity_input" type="text" name="quantity[]" value="<?php echo $cart['quantity']?>" autocomplete="off" size="2">

									</div>
								</td>
								<td class="cart_size">
									<p><?php echo $cart['size']?></p>
								<input type="hidden" name="size[]" value="<?php echo $cart['size']?>">
								</td>
								<td class="cart_total">
									<p class="cart_total_price">
										<?php
										$total =  $cart['quantity']*$cart['p_price'];
										echo 'Rs. '.$total;
										?>
									</p>
									<input type="hidden" name="gst[]" value="<?php $tt = ($total*'18')/'100' ;echo $tt;  ?>">
								</td>
								<td class="cart_delete">
										<a class="cart_quantity_delete" href="<?php echo base_url(); ?>home/delete_cart_item?p_id=<?php echo $cart['p_id'] ?>"><i class="fa fa-times"></i></a>
								</td>
								</tr>
							<?php } } else{?>
								<tr>
									<td colspan="6"><h4 style="text-align: center;">Missing Cart Items? </h4></td>
								</tr>

							<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="heading">
				<div class="col-sm-8"></div>
				<div class="col-sm-4" style="margin-top: -55px;">
				<?php
					if($cartdetails){?>
					<input type="submit" class="btn btn-default update" name="update" value="Update">
				<?php } ?>
					<a class="btn btn-default update" href="<?php echo base_url(); ?>home" >Continue Shopping</a>
			</div>
			</div>

		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6"></div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>

							<li>Sub Total <span>Rs.<?php $tt = ($totalprice['totalprice']*'18')/'100' ;echo $totalprice['totalprice']-$tt;  ?></span>
							<input type="hidden" name="subtotal" value="<?php echo $totalprice['totalprice']-$tt; ?>"></li>
							<li>CGST/SGST 18% <span>Rs.<?php  echo ($totalprice['totalprice']*18)/100 ?></span>
								<input type="hidden" name="cgst" value="<?php  echo ($totalprice['totalprice']*18)/100 ?>">
							</li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>Rs.<?php if($totalprice['totalprice']){echo $totalprice['totalprice'];} else{echo '0';} ?></span>
								<input type="hidden" name="totalprice" value="<?php  echo $totalprice['totalprice'] ?>">
							</li>

						</ul>
						<?php if($totalprice['totalprice']){ ?>
							<input type="submit" class="btn btn-default update" name="booking" value="Check Out">
						<?php } ?>
							<!-- <a class="btn btn-default check_out" href="">Check Out</a> -->
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	</form>
<?php
include('common/footer.php');
?>
