<script>
function createcategory()
        {
          var categorySelected="supercategoryName";
          var selected=document.getElementById(categorySelected).value;
          var categoryName="#categoryName";
          $.ajax({
                        url: "<?php echo base_url('product/getCategoryBySupercategory/');?>",
                        method: "post",
                        data: {selected:selected},
                        success: function(data){

                            //$(output).append(data);
                            //alert(data);
                           $(categoryName).html(data);
                             
                       
                        }
});
        }    
      </script>
<!-- FOR CK EDITOR -->
<script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
<!-- Navbar Code -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">      
      <div class="row">
        <!-- Left col -->

        <section class="col-lg-12">   
          <div class="box box-info">
            <div class="box-header with-border">  
              <h3 class="box-title">PRODUCT</h3>                  
            </div>
            
            <p><div class="form-group">
                    <div class="col-sm-1" style="float: right;">                      
                      <a href="<?php echo base_url('product/products/');?>"><button class="btn btn-block btn-primary" type="button" name="Back">Back</button></a>
                    </div>
                  </div>
                </p>
                <br>
            <!-- /.box-header -->
            <!-- form start -->
            <form name ="productForm" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url('product/addproduct');?>" method="post">                    
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Super Category Name</label>
                    <div class="col-sm-7">
                      <select class="form-control" id="supercategoryName" name="supercategoryName" onchange="return createcategory();">
                        <option value="">Select Super Category</option>
                          <?php
                            foreach ($super_category_result as $value) 
                            {
                          ?>
                          <option value="<?php echo $value->super_category_name;?>"><?php echo $value->super_category_name;?></option>
                          <?php
                          }
                          ?>
                          </select>
                          <span style="color:red"><?php echo form_error('supercategoryName');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="categoryName" id="categoryName">
                        <option value="">Select Category</option>
                          </select>
                          <span style="color:red"><?php echo form_error('categoryName');?></span>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Product Name</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="productName" id="productName" placeholder="Enter Product Name" value="<?php echo @$_POST['productName']?>">
                      <span style="color:red"><?php echo form_error('productName');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Product Description</label>
                    <div class="col-sm-7">
                      <textarea name="productDescription" rows="7" cols="101" placeholder="Enter Product Description"><?php echo @$_POST['productDescription']?>  </textarea>                
                       <span style="color:red"><?php echo form_error('productDescription');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-2 control-label">Product Image 1</label>
                           <div class="col-sm-7">
                               <input type="file" class="form-control" name="image1" id="image1" placeholder="Select Image 1" value="<?php echo @$_POST['image1']?>">
                            <span style="color:red"><?php echo form_error('image1');?></span>
                    </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Product Image 2</label>
                           <div class="col-sm-7">
                               <input type="file" class="form-control" name="image2" id="image2" placeholder="Select Image 2" value="<?php echo @$_POST['image2']?>">
                           <span style="color:red"><?php echo form_error('image2');?></span>
                    </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Product Image 3</label>
                           <div class="col-sm-7">
                               <input type="file" class="form-control" name="image3" id="image3" placeholder="Select Image 3" value="<?php echo @$_POST['image3']?>">
                           <span style="color:red"><?php echo form_error('image3');?></span>
                    </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Product Image 4</label>
                           <div class="col-sm-7">
                               <input type="file" class="form-control" name="image4" id="image4" placeholder="Select Image 4" value="<?php echo @$_POST['image4']?>">
                           <span style="color:red"><?php echo form_error('image4');?></span>
                    </div>
                      </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Product Technical Specification</label>
                    <div class="col-sm-7">
                      <textarea name="productTechSpec" id="productTechSpec" rows="10" cols="80">
                        <?php echo @$_POST['productTechSpec']?> 
                      </textarea>  
                       <span style="color:red"><?php echo form_error('productTechSpec');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Product Features</label>
                    <div class="col-sm-7">
                      <textarea name="productFeatures" id="productFeatures" rows="10" cols="80">
                        <?php echo @$_POST['productFeatures']?>   
                      </textarea>
                       <span style="color:red"><?php echo form_error('productFeatures');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Product Price</label>
                       <div class="col-sm-7">
                           <input type="text" class="form-control" name="productRentPrice" id="productRentPrice" placeholder="Enter Product Price" value="<?php echo @$_POST['productRentPrice']?>">
                       <span style="color:red"><?php echo form_error('productRentPrice');?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-2 control-label"></div>
                    <div class="col-sm-3">
                  <button type="submit" name="productSubmit" value="SUBMIT" class="btn btn-block btn-primary">Submit</button> 

                  </div>
                  <div class="col-sm-3">                      
                      <button class="btn btn-block btn-primary" type="reset" value="Clear">Reset</button>
                  </div>
              </div>



            </div>
           
            </form>
          </div>

        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- FOR CK EDITOR -->
  <script>
 CKEDITOR.replace('productTechSpec');
  CKEDITOR.replace('productFeatures');
 </script>
 <!-- <script src="js/jquery-1.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script> -->
