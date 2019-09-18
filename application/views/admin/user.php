 <?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>


<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">User List</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($user as $row) {?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['name']?></td>
                                            <td><?= $row['email']?></td>
                                            <td><?= $row['mobile']?></td>
                                            <td>
                                                <label class="switch switch-3d switch-primary mr-3">
                                        <input type="checkbox" class="switch-input" onchange="window.location = '<?php echo base_url() ?>admins/adminuser/changeadminuserstatus?id=<?php echo $row['id'] ?>&status=<?php echo $row['status'] == 1 ? '0' : '1'?>'" <?php if($row['status'] != 0){echo'checked="true"';} ?>>
                                                    <span class="switch-label"></span>
                                                    <span class="switch-handle"></span>
                                                </label>
                                             </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/adminuser/editadminuser?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-primary">Edit</button> </a>
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
