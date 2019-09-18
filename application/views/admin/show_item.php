 <?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Product List &nbsp; <a href="<?php echo base_url(); ?>admin/category">Back to Category</a></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Availability <br> Condition <br> Brand</th>
                                            <th>Price</th>
                                            <th>Offer Price</th>
                                            <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($product as $row) {
                                           ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['p_name'] ?></td>
                                            <td><?= $row['p_description'] ?> </td>
                                            <td><?php if($row['p_availability'] != 1){ echo "Out of Stock";} else {echo "In Stock";} ?>
                                            <br> <?php echo $row['p_condition']; ?><br>
                                            <?=  $row['p_brand']; ?>
                                             </td>
                                             <td><?= $row['p_price'] ?>
                                                <?php ?>
                                             </td>
                                                <td><?= $row['p_offerprice'] ?> </td>
                                            <td>

                                                <label class="switch switch-3d switch-primary mr-3">
                                        <input type="checkbox" class="switch-input" onchange="window.location = '<?php echo base_url() ?>admins/category/changeitemstatus?id=<?php echo $row['id'] ?>&cat_id=<?php echo $_GET['cid']; ?>&status=<?php echo $row['status'] == 1 ? '0' : '1'?>'" <?php if($row['status'] != 0){echo'checked="true"';} ?>>
                                                    <span class="switch-label"></span> 
                                                    <span class="switch-handle"></span>
                                                </label>
                                             </td>
                                            <td>
                                                 <a href="<?php echo base_url(); ?>admin/category/edititem?itemid=<?php echo $row['id'] ?>&cid=<?php echo $_GET['cid'] ?>"><button type="button" class="btn btn-primary">Edit</button> </a> &nbsp;
                                                 <!-- <a href="#"><button type="button" class="btn btn-danger">Delete</button></a> &nbsp; -->
                                                 <a href="<?php echo base_url(); ?>admins/banner/deleteitem?itemid=<?php echo $row['id'] ?>&cid=<?php echo $_GET['cid'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
