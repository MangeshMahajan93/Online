<script>
function createcategory()
        {
          var superCategorySelected="supercategoryName".concat();
          var SuperCategory=document.getElementById(superCategorySelected).value;
          var categoryName="#categoryName".concat();
          $.ajax({
                        url: "<?php echo base_url('booking/getCategory/');?>",
                        method: "post",
                        data: {SuperCategory:SuperCategory},
                        success: function(data){
                           $(categoryName).html(data);                      
                        }
});
        }    
      </script>
<script>
function createproduct()
        {
          var superCategorySelected="supercategoryName".concat();
          var SuperCategory=document.getElementById(superCategorySelected).value;

          var categorySelected="categoryName".concat();
          var category=document.getElementById(categorySelected).value;
          
          var productName="#productName".concat();
          $.ajax({
                        url: "<?php echo base_url('booking/getProduct/');?>",
                        method: "post",
                        data: {SuperCategory:SuperCategory,category:category},
                        success: function(data){
                           $(productName).html(data);                     
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
        
          <!-- quick email widget -->
          <div class="box box-info">
            <br>
            <form name ="stockForm" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url('stock/filterStock/');?>" method="post">   
                <div class="form-group">
                  <label class="col-sm-1 control-label">Super Category</label>
                    <div class="col-sm-2">
                      <select class="form-control" id="supercategoryName" name="supercategoryName" onchange="return createcategory();" onClick="return createproduct();">
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
                    </div>
                    <label class="col-sm-1 control-label">Category</label>
                    <div class="col-sm-2">
                     <select class='form-control' name='categoryName' id='categoryName' onChange="return createproduct();">
                          <option value="">Select Category</option>
                            
                         </select>
                    </div>
                     <label class="col-sm-1 control-label">Product</label>
                    <div class="col-sm-2">
                     <select class='form-control' name='productName' id='productName' onChange="return createprice();">
                          <option value="">Select Product</option>                            
                         </select>
                    </div>
                    
                    <div class="col-sm-2">                      
                        <button type="submit" name="Filter" value="Filter" class="btn btn-block btn-primary">Submit</button> 
                    </div>
                  </div>
                  </form> 
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">                  
                  <div class="col-sm-10 control-label">
                     <center>
                      <h1 class="box-title" style="color: #ff9999"><?php echo $this->session->flashdata('success');?>
                    </h1>
                     <h1 class="box-title" style="color: #ff9999"><?php echo $this->session->flashdata('delete_success');?>
                    </h1>                        
                  </center>   
                  </div>                    
                </div>                
                  <div class="box-body table-responsive">       
                  <table class="table table-hover">
                   <tr>
                    <th>Sr.</th>
                    <th>Super Category Name</th> 
                    <th>Category Name </th>    
                    <th>Product Name </th> 
                    <th>Rent Amount </th>
                    <th>Quantity</th>                  
                   
                  </tr>               
                    <?php
                    $sr = $start;    
                     foreach ($result as $row)
                        { 
                    ?>
                  <tr>   
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $row->super_category_name; ?></td>
                    <td><?php echo $row->category_name  ; ?></td>
                    <td><?php echo $row->product_name ; ?></td>
                     <td><?php echo $row->rent_amount ; ?></td>
                    
                     <td><?php echo $row->quantity ; ?></td>
                                  
                            
                 </tr>
            <?php
     }
  ?>
                       </table>          
  <style>
      li.active a {
      background-color: black;
  }
  .pagination a {
      color: #fff;
      text-decoration: none;
      background-color: transparent;
      -webkit-text-decoration-skip: objects;
      margin: 6px;
      background-color: pink;
      padding: 2px 10px;
      border-radius: 0px;
  }
  .pagination
  {
    float: right;
    padding:2px;
  }
  </style>
  <?php
  if($start > $totalEntries)
  {
    $start = $totalEntries;
  }
  else
  {
    $start = $start;
  }
  if($end > $totalEntries)
  {
    $end = $totalEntries;
  }
  else
  {
    $end = $end;
  }
  echo $this->pagination->create_links();
  echo "<br><h4>&nbsp;Showing&nbsp;".$start."&nbsp;to&nbsp;".$end."&nbsp;of&nbsp;".$totalEntries."&nbsp;entries</h4>";
  ?>
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