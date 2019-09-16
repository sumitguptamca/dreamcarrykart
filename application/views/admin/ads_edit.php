 <?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>
 


        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    
                    <!--/.col-->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Advertise  Banner</strong>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo base_url(); ?>admin/banner/updateadvertise" method="post" enctype="multipart/form-data" class="form-horizontal">
                
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ads Banner Name</label></div>
                    <div class="col-12 col-md-4"><input type="text" id="name" name="banner_name" placeholder="Banner Name" class="form-control" value="<?= $banner['ad_name'] ?>">
<input type="hidden" name="id" value="<?=  $banner['id'] ?>">
                        <small class="form-text text-muted"></small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Strat Date</label></div>
                    <div class="col-12 col-md-4"><input type="text" id="startdate" name="startdate" placeholder="Start Date" class="form-control" value="<?= $banner['start_date'] ?>"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">End Date </label></div>
                    <div class="col-12 col-md-4"><input type="text" id="enddate" name="enddate" placeholder="End Date" class="form-control" value="<?= $banner['end_date'] ?>"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Banner Image</label></div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file" name="file" class="form-control-file">
                         <input type="hidden" name="imagefile" value="<?=  $banner['image_path'] ?>">
                        <small class="form-text text-muted"></small></div>
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