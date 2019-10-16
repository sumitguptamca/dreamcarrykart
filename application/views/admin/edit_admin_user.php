 <?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>



        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">

                    <!--/.col-->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit User</strong>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo base_url(); ?>admins/adminuser/updateadminuser" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="<?= $user['name'] ?>">
                        <input type="hidden" name="id" value="<?=  $user['id'] ?>">
                        <small class="form-text text-muted"></small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mobile</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="mobile" name="mobile" placeholder="Mobile" class="form-control" value="<?= $user['mobile'] ?>"><small class="form-text text-muted"></small></div>
                </div>


                     <div class="card-footer">
                                                        <input  type="submit" name="submit" class="btn btn-primary btn-sm" value="Submit">
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                </form>

                                    </div><!-- .content -->

                                <?php include('includes/footer.php')?>
