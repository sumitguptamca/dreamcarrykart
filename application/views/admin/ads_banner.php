 <?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>


<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Start Date<br>End Date</th>
                                            <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($banner as $row) {
                                           ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['ad_name'] ?></td>
                                            <td>
                                                <img src="<?php  echo base_url().'/'.$row['image_path'] ?>" height=75 width=100>
                                               
                                                    
                                                </td>
                                                <td>
                                                    <?php echo $row['start_date'].'<br>'. $row['end_date']; ?>
                                                </td>
                                            <td>
                                                <label class="switch switch-3d switch-primary mr-3">
                                        <input type="checkbox" class="switch-input" onchange="window.location = '<?php echo base_url() ?>admins/ads_banner/changestatus?id=<?php echo $row['id'] ?>&status=<?php echo $row['status'] == 1 ? '0' : '1'?>'" <?php if($row['status'] != 0){echo'checked="true"';} ?>> 
                                                    <span class="switch-label"></span> 
                                                    <span class="switch-handle"></span>
                                                </label>
                                             </td>
                                            <td>
                                                  <a href="<?php echo base_url(); ?>admin/ads_banner/editadsbanner?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-primary">Edit</button> </a> &nbsp;
                                                 <!-- <a href="#"><button type="button" class="btn btn-danger">Delete</button></a> &nbsp; -->
                                                 <a href="<?php echo base_url(); ?>admins/ads_banner/deleteadsbanner?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->










       <?php include('includes/footer.php')?>