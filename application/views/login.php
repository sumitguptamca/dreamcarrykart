<?php 
include('common/header.php');
$basepath = base_url('assets/');
?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="<?php  echo base_url(); ?>login" method="post">
							<input type="email" placeholder="Email Address" name="uemail"/>
							<?php echo form_error('uemail');?>
							<input type="password" placeholder="Password" name="upassword"/>
							<?php echo form_error('upassword');?>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
								 <input type="submit" name="submit" class="btn btn-md btn-primary full-width" value="Login">
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-5">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<?php if ($_SESSION['TYPE'] != 'success'){ ?>
							<h5 style="color: green"><?php echo  $_SESSION['MESSAGE'];?></h5>
						 <?php  } ?>
						<form action="<?php  echo base_url(); ?>home/signup" method="post">
							<input type="text" placeholder="Name" name="name"/>
							<?php echo form_error('name');?>
							<input type="email" placeholder="Email Id" name="email"/>
							<?php echo form_error('email');?>
							<input type="password" placeholder="Password" name="password"/>
							<?php echo form_error('password');?>
							<input type="text" placeholder="Mobile" name="mobile"/>
							<?php echo form_error('mobile');?>
							 <input type="submit" name="submit" class="btn btn-md btn-primary full-width" value="Sign Up!">
							<!-- <button type="submit" class="btn btn-default">Signup</button> -->
					  </form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

<?php
include('common/footer.php');
?>

