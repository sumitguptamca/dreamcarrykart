<?php
if (isset($_SESSION['selleremail'])) {
    redirect('seller/dashboard');
    exit;
}
?>
<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seller | Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="<?php echo base_url()?>vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets_admin/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?php echo base_url();?>seller">
                        <!-- <img class="align-content" src="images/logo.png" alt=""> -->
                        <strong class="align-content"><h2>SELLER LOGIN</h2></strong>
                        <?php if($_SESSION['TYPE']=='error') {?>
                            <h6><?php echo $_SESSION['MESSAGE'];?></h6>
                        <?php } ?>
                    </a>
                </div>
                <div class="login-form">
              
                 <form action="<?php  echo base_url(); ?>sellers/seller_login/login" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" required placeholder="Please Enter Email" name="email">
                            <?php echo form_error('email');?>
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" required placeholder="Please Enter Password" name="password">
                                <?php echo form_error('password');?>
                             </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <!-- <a href="#">Forgotten Password?</a> -->
                            </label>

                                </div>
                                <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit" value="Sign In"/>
                                <h6 style="text-align: center;margin-top: 20px">New User?<a href="<?php echo base_url();?>seller/signup">Create an account</a></h6>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/js/main.js"></script>


</body>

</html>
