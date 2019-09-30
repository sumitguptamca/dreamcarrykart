<?php
include('common/header.php');
$basepath = base_url('assets/');
?>

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="<?php echo base_url();?>home">Home</a></li>
			  <li class="active">Order</li>
			</ol>
		</div>
		<!-- <p>ORDER NO: <?= $bookingid['booking_id']?></p> -->
		<?php foreach($orderall as $od){
			// echo "<pre>";print_r($od['p_id']);
			$orderall=$this->Users_model->getAllOrderBooking($od['booking_id']);
			// echo "<pre>";print_r($orderall);

			$status=$this->Users_model->getOrderStatus($od['status']);
		?>
		<div class="table-responsive order_info">

			<?php foreach ($orderall as $odd) {
				$image=$this->Users_model->getImageForOrder($odd['p_id']);
				?>
			<table class="table table-condensed" >
				<tbody>

					<tr>
						<td class="order_image"><img src="<?php  echo base_url().'/'.$image['image_path'] ?>" alt=""/>
						</td>
						<td class="order_content">
							<ul>
								<li><?=$od['booking_id']?></li>
								<li><?=$odd['p_name']?></li>
								<li>Size: <?=$odd['size']?> | Quantity: <?=$odd['quantity']?></li>
								<li><i class="fa fa-inr"></i>  <?=$odd['p_price']?></li>
								<li>
									<?php if($od['transaction_id']){
										echo '<span style="color:green"> Paid </span>' .'  |  '. '<span style="color:green">'.$status['name'].'</span>';
									}
										else{
										echo '<a href="" style="color:red">Pay Again</a>';
									}?>

								</li>

							</ul>
						</td>
					</tr>

				</tbody>
			</table><hr>
		<?php } ?>

		</div>
		<?php } ?>

	</div>
</section>
<?php
include('common/footer.php');
?>
