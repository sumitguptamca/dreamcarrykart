 <?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>


<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Item Category List</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $i = 1; foreach ($category as $cat) {
                                           
                                         ?>
                                        
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $cat['cat_name']; ?></td>
                                            <td>
                                                <label class="switch switch-3d switch-primary mr-3">
                                        <input type="checkbox" class="switch-input" onchange="window.location = '<?php echo base_url() ?>admins/category/changestatus?id=<?php echo $cat['id'] ?>&status=<?php echo $cat['status'] == 1 ? '0' : '1'?>'" <?php if($cat['status'] != 0){echo'checked="true"';} ?>> 
                                                    <span class="switch-label"></span> 
                                                    <span class="switch-handle"></span>
                                                </label>
                                             </td>
                                            <td>
                                                 <a href="<?php echo base_url(); ?>admin/category/editcategory?id=<?php echo $cat['id'] ?>"><button type="button" class="btn btn-primary">Edit</button> </a> &nbsp;
                                                 <a href="<?php echo base_url(); ?>admins/category/additem?id=<?php echo $cat['id'] ?>"><button type="button" class="btn btn-primary">Add Item</button></a>
                                                <a href="<?php echo base_url(); ?>admin/category/showitem?cid=<?php echo $cat['id'] ?>"><button type="button" class="btn btn-primary">Show Item</button></a>
                                            </td>
                                        </tr>

                                    <?php $i++ ;} ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->










       <?php include('includes/footer.php')?>
