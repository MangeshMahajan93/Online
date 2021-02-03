<script>
function createcategory(k)
        {
          var superCategorySelected="supercategoryName".concat(k);
          var SuperCategory=document.getElementById(superCategorySelected).value;
          var categoryName="#categoryName".concat(k);
          $.ajax({
                        url: "<?php echo base_url('booking/getCategory/');?>",
                        method: "post",
                        data: {SuperCategory:SuperCategory,k:k},
                        success: function(data){
                           $(categoryName).html(data);                      
                        }
});
        }    
      </script>
<script>
function createproduct(k)
        {
          var superCategorySelected="supercategoryName".concat(k);
          var SuperCategory=document.getElementById(superCategorySelected).value;

          var categorySelected="categoryName".concat(k);
          var category=document.getElementById(categorySelected).value;
          
          var productName="#productName".concat(k);
          $.ajax({
                        url: "<?php echo base_url('booking/getProduct/');?>",
                        method: "post",
                        data: {SuperCategory:SuperCategory,category:category,k:k},
                        success: function(data){
                           $(productName).html(data);                     
                        }
});
        }    
      </script>
      <script>
function createprice(k)
        {
          var superCategorySelected="supercategoryName".concat(k);
          var SuperCategory=document.getElementById(superCategorySelected).value;

          var categorySelected="categoryName".concat(k);
          var category=document.getElementById(categorySelected).value;

          var productSelected="productName".concat(k);
          var product=document.getElementById(productSelected).value;
          
          var price="#price".concat(k);
          $.ajax({
                        url: "<?php echo base_url('booking/getPrice/');?>",
                        method: "post",
                        data: {SuperCategory:SuperCategory,category:category,product:product,k:k},
                        success: function(data)
                        {
                          $(price).val(data);                                 
                        }
});
        }    
      </script>      
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
              <h3 class="box-title">Stock</h3> 
               <center>
                      <h1 class="box-title" style="color: #ff9999"><?php echo $this->session->flashdata('success_stock');?>
                    </h1>   
                  </center>           
            </div>            
            <!-- /.box-header -->
            <!-- form start -->
            <form name ="stockForm" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url('stock/addStock');?>" method="post">                 
              <div class="box-body">                           
              <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="calculation">                 
                  <tr>
                    <th>Sr.No.</th>
                    <th>Super Category</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Rent Price/Amount</th>                   
                    <th>Quantity</th>               
                  </tr>
                   <?php
                  for($k=1;$k<=7;$k++)
                  {
                    ?>
                  <tr>
                     <td><?php echo $k;?></td>
                     <td>                              
                       
                          <select class="form-control" id="supercategoryName<?php echo $k;?>" name="supercategoryName[]" onchange="return createcategory(<?php echo $k;?>);" onClick="return createproduct(<?php echo $k;?>);">
                             <!-- ADDED ONCLICK NEW : onClick="return createproduct(<?php //echo $k;?>);"-->
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
                      </td>
                     <td>  
                     <select class='form-control' name='categoryName[]' id='categoryName<?php echo $k;?>' onChange="return createproduct(<?php echo $k;?>);">
                          <option value="">Select Category</option>
                            
                         </select>
                          <span style="color:red"><?php echo form_error('categoryName');?></span>
                      </td>
                     
                     <td>            
                         <select class='form-control' name='productName[]' id='productName<?php echo $k;?>' onChange="return createprice(<?php echo $k;?>);">
                          <option value="">Select Product</option>                            
                         </select>
                      </td>
                       <td>                        
                        <input type="text" class="form-control" readonly="" name='price[]' id='price<?php echo $k;?>' >                          
                      </td>                   
                      <td><input type="text" class="form-control" size="20%" name="quantity[]" id="quantity<?php echo $k;?>" placeholder=""  autocomplete="off"></td>
                                           
                   
                  </tr>
                    <?php
                  }
                    ?>
               
      </table>
  </div>
  <br>
<div class="form-group">
                    <div class="col-sm-2 control-label"></div>
                    <div class="col-sm-3">
                  <button type="submit" name="stockSubmit" value="SUBMIT" class="btn btn-block btn-primary">Submit</button> 

                  </div>
                  <div class="col-sm-3">                      
                      <button class="btn btn-block btn-primary" type="reset" value="Clear">Reset</button>
                  </div>
              </div>
  <br>
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

 