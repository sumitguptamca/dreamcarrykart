 <?php include('includes/header.php')?>
    <?php include('includes/nav.php')?>
 


        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    
                    <!--/.col-->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Add  Product Item</strong>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo base_url(); ?>admin/category/saveitem" method="post" enctype="multipart/form-data" class="form-horizontal">
                
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_name" name="p_name" placeholder="Product Name" class="form-control">
                        <input type="hidden" name="cat_id" value="<?php echo $_GET['id']; ?>">
                        <small class="form-text text-muted"></small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_description" name="p_description" placeholder="Product Description" class="form-control"><small class="form-text text-muted"></small></div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_price" name="p_price" placeholder="Product Price" class="form-control"><small class="form-text text-muted"></small></div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Offer Price</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_offerprice" name="p_offerprice" placeholder="Offer Price" class="form-control"><small class="form-text text-muted"></small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="p_brand" name="p_brand" placeholder="Brand" class="form-control"><small class="form-text text-muted"></small></div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Availability</label></div>
                    <div class="col-12 col-md-6">
                        
                            <select name="p_availability" id="p_availability" class="form-control">
                               <option value="1">In Stock</option>
                                <option value="2">Out of Stock</option>
                                
                            </select>
                       
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Condition</label></div>
                    <div class="col-12 col-md-6">
                        <select name="p_condition" id="p_condition" class="form-control">
                               <option value="New">New</option>
                               <option value="Fresh">Fresh</option>
                               <option value="Discount">Discount</option>
                                
                            </select>
                      
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