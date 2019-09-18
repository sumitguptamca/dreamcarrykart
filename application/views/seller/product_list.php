<?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>
		<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Product Category List</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <!-- <th>Status</th> -->
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $i = 1; foreach ($category as $cat) { ?>

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $cat['cat_name']; ?></td>

                                            <td>

                                                 <a href="<?php echo base_url(); ?>seller/addproduct?id=<?php echo $cat['id']?>"><button type="button" class="btn btn-primary">Add Item</button></a>
                                                <a href="<?php echo base_url(); ?>seller/showproduct?id=<?php echo $cat['id'] ?>&sid=<?php echo $_SESSION['sellerid']?>"><button type="button" class="btn btn-primary">Show Item</button></a>
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
