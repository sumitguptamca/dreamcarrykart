<?php
// if (isset($_SESSION['admin_email'])) {
//     redirect('admin/dashboard');
//     exit;
// }
?>
<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seller | Register</title>
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
                        <strong class="align-content"><h2>SELLER SIGNUP</h2></strong>
                    </a>
                </div>
                <div class="login-form">
              
                 <form action="<?php  echo base_url(); ?>seller/signup" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required placeholder="Please Enter Name" name="sname">
                            <?php echo form_error('sname');?>
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" required placeholder="Please Enter Email" name="semail">
                            <?php echo form_error('semail');?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" required placeholder="Please Enter Password" name="spassword">
                            <?php echo form_error('spassword');?>
                        </div>
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" class="form-control" required placeholder="Please Enter Contact No." name="smob">
                            <?php echo form_error('smob');?>
                        </div>
                        <div class="form-group">
                            <label>GST No.</label>
                            <input type="text" class="form-control" required placeholder="Please Enter GST No." name="gst">
                            <?php echo form_error('gst');?>
                        </div>
                         <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" required placeholder="Please Enter Company Name" name="cname">
                            <?php echo form_error('cname');?>
                        </div>
                       
                        <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit" value="SignUp"/>
                        <h6 style="text-align: center;margin-top: 20px">Existing User?<a href="<?php echo base_url();?>seller">Sign IN</a></h6>

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
