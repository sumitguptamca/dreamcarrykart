 <?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>


<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Shipped Order</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>User Name</th>
                                            <th>User Mobile</th>
                                            <th>User Email</th>
                                            <th>Total Price</th>
                                             <th>Order Status</th>
                                            <th>Payment Status</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($order as $ord) { if( $ord['status'] == 2){ ?>
                                          <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ord['booking_id']?></td>
                                            <td><?= $ord['name'] ?></td>
                                            <td><?= $ord['mobile'] ?></td>
                                            <td><?= $ord['email']?></td>
                                            <td><?= $ord['total_price']?></td>
                                            <td><?= $ord['statusname']?></td>
                                            <td><?= $ord['pay_status']?></td>
                                            <td><?= $ord['mobile']?></td>

                                        </tr>
                                       <?php $i++; }} ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->










       <?php include('includes/footer.php')?>
