<?php
include('common/header.php');
$basepath = base_url('assets/');

?>

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>home">Home</a></li>
				  <li class="active">Booking</li>
				</ol>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item Name</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="quantity">Size</td>
							<td class="total">Total</td>

						</tr>
					</thead>
					<tbody>

							<?php foreach($cartdetails as $cart){?>
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
									<p><i class="fa fa-inr"></i> <?php echo $cart['p_price']?></p>
									<input type="hidden" name="p_price[]" value="<?php echo $cart['p_price'];?>">
								</td>
								<td class="cart_quantity">

									<p><?php echo $cart['quantity']?></p>
								</td>
								<td class="cart_size">
									<p><?php echo $cart['size']?></p>
								<input type="hidden" name="size[]" value="<?php echo $cart['size']?>">
								</td>
								<td class="cart_total">
									<p class="cart_total_price">
										<?php
										$total =  $cart['quantity']*$cart['p_price'];
										echo '<i class="fa fa-inr"></i> '.$total;
										?>
									</p>
									<input type="hidden" name="gst[]" value="<?php $tt = ($total*'18')/'100' ;echo $tt;  ?>">
								</td>

								</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>

		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<!-- <div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			 --><div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead style="font-size:15px;color: #FE980F;font-weight:bold">
									<tr class="cart_menu">
										<td></td>
										<td></td>
										<td style="width:90px;">Name</td>
										<td style="width:220px;">Address</td>
										<td>Zip Code</td>
										<td>Mobile No.</td>
									</tr>
								</thead>
								<tbody style="font-size: 13px;">
									<?php foreach ($address as $add) {?>
									<tr>
										<td></td>
										<td><input type="radio" name="chooseaddress" onchange="window.location = '<?php echo base_url() ?>home/setAddress?id=<?php echo $bookingd['booking_id'] ?>&address=<?php echo $add['id']?>'" value="<?php echo $add['id'] ?>" <?php if($bookingd['bill_address'] == $add['id']){echo "checked";} ?>>
										</td>
										<td><?= $add['fname']; ?></td>
										<td><?php echo $add['address1'] .", ".$add['address2'].", ". $add['city'] .", ".$add['state'].", ".$add['country']; ?></td>
										<td><?php echo $add['zipcode'];?></td>
										<td><?= $add['mobile'] ?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>

					<a href="#ex1" rel="modal:open" class="btn btn-default update">Add New Address</a>
					</div>

				</div>

				<div class="col-sm-6">
					<div class="total_area">
						<form name="upcatecart" method="POST" action="<?php echo base_url(); ?>home/booking_payment">
						<ul>

							<li>Sub Total <span><i class="fa fa-inr"></i> <?php echo $bookingd['subtotal'];  ?></span></li>
							<li>CGST/SGST 18% <span><i class="fa fa-inr"></i> <?php  echo $bookingd['gst'] ?></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span><i class="fa fa-inr"></i> <?php echo $bookingd['total_price']; ?></span></li>
							<input type="hidden" name="price" value="<?php echo $bookingd['total_price']; ?>">
							<input type="hidden" name="bid" value="<?php echo $bookingd['booking_id']; ?>">
							 <?php //echo "<pre>"; print_r($_SESSION) ?>

						</ul>
						<?php  if(count($address)>0){?>
							<input type="submit" class="btn btn-default update" name="payment" value="Payment">
						<?php  } ?>
						<input type="submit" class="btn btn-default update" name="cancel" value="Cancel Order">
							</form>
							<!-- <a class="btn btn-default check_out" href="">Check Out</a> -->
					</div>
				</div>
			</div>
		</div>
<div id="ex1" class="modal">
  <div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one" style="width: 100%">
					<form name="billadress" method="POST" action="<?php echo base_url(); ?>home/billadress">
									<input type="text" name="cname" placeholder="Company Name">
									<input type="text" name="fname" placeholder="Enter Full Name *">
									<input type="text" name="mobile" placeholder="Mobile Number">
									<input type="text" name="address1" placeholder="Address 1 *">
									<input type="text" name="address2" placeholder="Address 2">
									<input type="text" name="city" placeholder="City">
									<input type="text" name="state" placeholder="State">
									<input type="text" name="country" placeholder="Country">
									<input type="text" name="zipcode" placeholder="Zip / Postal Code *">
									<input type="submit" style="background-color: green"  name="submit" value="SAVE">
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
</div>
	</section><!--/#do_action-->


<?php
include('common/footer.php');
?>
