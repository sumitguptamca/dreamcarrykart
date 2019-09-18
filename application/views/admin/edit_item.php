 <?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>



        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">

                    <!--/.col-->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit  Product Item</strong>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo base_url(); ?>admins/category/updateitem" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_name" name="p_name" placeholder="Product Name" class="form-control" value="<?= $item['p_name'] ?>" >
                        <input type="hidden" name="cat_id" value="<?php echo $_GET['cid']; ?>">
                         <input type="hidden" name="item_id" value="<?php echo $_GET['itemid']; ?>">
                        <input type="hidden" name="p_id" value="<?php echo $item['p_id']; ?>">
                         <input type="hidden" name="seller_id" value="<?php echo $item['seller_id']; ?>">
                        <small class="form-text text-muted"></small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_description" name="p_description" placeholder="Product Description" value="<?= $item['p_description'] ?>" class="form-control"><small class="form-text text-muted"></small></div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price <i class="fa fa-inr"></i></label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_price" name="p_price" placeholder="Product Price" class="form-control" value="<?= $item['p_price'] ?>" ><small class="form-text text-muted"></small></div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Offer Price  <i class="fa fa-inr"></i></label></div>

                     <div class="col-12 col-md-6">

                        <input type="text" id="p_offerprice" name="p_offerprice" placeholder="Offer Price" class="form-control" value="<?= $item['p_offerprice'] ?>"><small class="form-text text-muted"></small></div>

                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_brand" name="p_brand" placeholder="Brand" class="form-control" value="<?= $item['p_brand'] ?>"><small class="form-text text-muted"></small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Material/Fabricand</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_material" name="p_material" placeholder="Material/Fabricand" value="<?= $item['p_material'] ?>" class="form-control"><small class="form-text text-muted"></small></div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Size </label></div>
                    <div class="col-12 col-md-6">
                      <div class="form-check">
                      <div class="checkbox">
                          <label for="checkbox1" class="form-check-label ">
                              <input type="checkbox" id="checkbox1" name="p_xs" value="XS" <?php if($item['p_xs'] == 'XS'){echo "checked";} ?> class="form-check-input">XS
                          </label>
                      </div>
                      <div class="checkbox">
                          <label for="checkbox2" class="form-check-label ">
                              <input type="checkbox" id="checkbox2" name="p_s" value="S" <?php if($item['p_s'] == 'S'){echo "checked";} ?> class="form-check-input">S
                          </label>
                      </div>
                      <div class="checkbox">
                          <label for="checkbox3" class="form-check-label ">
                              <input type="checkbox" id="checkbox3" name="p_m" <?php if($item['p_m'] == 'M'){echo "checked";} ?> value="M" class="form-check-input">M
                          </label>
                      </div>
                       <div class="checkbox">
                          <label for="checkbox1" class="form-check-label ">
                              <input type="checkbox" id="checkbox1" name="p_l" <?php if($item['p_l'] == 'L'){echo "checked";} ?> value="L" class="form-check-input">L
                          </label>
                      </div>
                      <div class="checkbox">
                          <label for="checkbox2" class="form-check-label ">
                              <input type="checkbox" id="checkbox2" name="p_xl" <?php if($item['p_xl'] == 'XL'){echo "checked";} ?> value="XL" class="form-check-input">XL
                          </label>
                      </div>
                      <div class="checkbox">
                          <label for="checkbox3" class="form-check-label ">
                              <input type="checkbox" id="checkbox3" name="p_xxl" <?php if($item['p_xxl'] == 'XXL'){echo "checked";} ?> value="XXL" class="form-check-input">XXL
                          </label>
                      </div>
                  </div>
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Availability</label></div>
                    <div class="col-12 col-md-6">

                            <select name="p_availability" id="p_availability" class="form-control">
                               <option value="1" <?php if($item['p_availability'] == 1){echo "selected";} ?>>In Stock</option>
                                <option value="2" <?php if($item['p_availability'] == 2){echo "selected";} ?>>Out of Stock</option>

                            </select>

                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Condition</label></div>
                    <div class="col-12 col-md-6">
                        <select name="p_condition" id="p_condition" class="form-control">
                               <option value="New"<?php if($item['p_condition'] == "New"){echo "selected";} ?>>New</option>
                               <option value="Fresh"<?php if($item['p_condition'] == "Fresh"){echo "selected";} ?>>Fresh</option>
                               <option value="Discount"<?php if($item['p_condition'] == "Discount"){echo "selected";} ?>>Discount</option>

                            </select>

                      </div>
                </div>
               <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Image</label></div>
                    <?php  $query = $this->db->query("SELECT * FROM `product_image` WHERE `p_id`='" . $item['p_id'] . "'");  $tt =  $query->result_array(); ?>
                    <div class="col-12 col-md-6">
                        <?php  //echo "<pre>"; print_r($tt);?>
                        <?php foreach ($tt as $row) { ?>
                          <img src="<?php  echo base_url().'/'.$row['image_path'] ?>" height=75 width=100> <a href="<?php echo base_url() ?>admins/category/deleteitemimage?image_id=<?=$row['id'] ?>&itemid=<?=$_GET['itemid'] ?>&cid=<?=$_GET['cid'] ?>" alt="delete image"><i class="fa fa-arrows-alt"></i></a>

                       <?php } ?>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Image</label></div>
                    <div class="col-12 col-md-6"><input type="file" multiple="" id="file" name="file[]" class="form-control-file"><small class="form-text text-muted"></small></div>
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
