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
                    <div class="col-sm-2">
                      <a href="<?php echo base_url('product/addproduct/');?>"><button type="button" class="btn btn-block btn-primary" ><i class="fa fa-user-plus" aria-hidden="true"  ></i>Add Product</button></a>  

                     
                    </div>
                </div>
                  <div class="box-body table-responsive">
                    
            <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 -->
<table class="table table-hover">
         <tr>
                  <th>Sr.</th>
                 <!--  <th>Super Category Name</th> 
                  <th>Category Name</th>     -->
                  <th>Product Name</th> 
                  <th>Product Description</th>
                  <!-- <th>Product Rent Price</th>   -->                
                  <th>Action</th>
                </tr>               
                  <?php
                  $sr = $start;    
                   foreach ($result as $row)
                      { 
                  ?>
                <tr>   
                  <td><?php echo $sr++; ?></td>
                  <!-- <td><?php //echo $row->super_category_name; ?></td>
                  <td><?php //echo $row->category_name; ?></td> -->
                  <td><?php echo $row->product_name; ?></td>
                  <td>
                  	<?php 
                  	$product_description = substr($row->product_description, 0, 210);
                  	if(strlen($row->product_description) > 210)
                  	{
                  		echo $product_description."...."; 
                  	}
                  	else
                  	{
                  		echo $product_description."."; 
                  	}
                  	?>                  		
                  	</td>
                  <!-- <td><?php //echo $row->product_rent_price; ?></td> -->                  
                  <td>   
                    <a data-toggle="modal" data-target="#modal-default<?php echo $row->product_id;?>" style="cursor: pointer;">
                        <span class='glyphicon glyphicon-eye-open'>&nbsp;View</span>
                       </a>&nbsp;&nbsp;|&nbsp;&nbsp;
                   <a href="<?php echo base_url('product/editproduct/'.base64_encode($row->product_id));?>">
                        <span class='glyphicon glyphicon-edit'>&nbsp;Edit</span>
                       </a>&nbsp;&nbsp;|&nbsp;&nbsp;
                   <a href="<?php echo base_url('product/delete/'.$row->product_id);?>">
                   	<span class='glyphicon glyphicon-trash'>&nbsp;Delete</span>
                       </a>
                       <!-- <button type="button" class="btn btn-default">
                        <a href="<?php //echo base_url('product/editproduct/'.base64_encode($row->product_id));?>">
                          <span class="fa fa-edit" style="color: black;">&nbsp;Edit</span>
                        </a>
                      </button>
                      <button type="button" class="btn btn-default">
                        <a href="<?php //echo base_url('product/delete/'.$row->product_id);?>">
                          <span class="fa fa-trash" style="color: black;">&nbsp;Delete</span>
                        </a>
                      </button> -->
                  </td>        
               </tr>
          <?php
   }
?>
                
              </table>

              <?php foreach ($result as $value)
                                      { 
                                ?>
              <div class="modal fade" id="modal-default<?php echo $value->product_id;?>">
              	<div class="modal-dialog" style="width:auto;padding:70px;">
          <!-- <div class="modal-dialog"> -->
          	<!-- <div class="modal-content" style="width:200%;margin-left:-200px;">
             -->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Product Name : <?php echo $value->product_name;?></h4>
              </div>
              <div class="modal-body">
                 <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="col-sm-4">Super Category Name :</label>
                    <div class="col-sm-8"><?php echo $value->super_category_name;?></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4">Category Name :</label>
                    <div class="col-sm-8"><?php echo $value->category_name;?></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4">Product Name :</label>
                    <div class="col-sm-8"><?php echo $value->product_name;?></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4">Product Description :</label>
                    <div class="col-sm-8"><?php echo $value->product_description;?></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4">Product Technical Specification :</label>
                    <div class="col-sm-8"><?php echo $value->product_technical_specification;?></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4">Product Features  :</label>
                    <div class="col-sm-8"><?php echo $value->product_features;?></div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4">Product Price :</label>
                    <div class="col-sm-8"><?php echo $value->product_rent_price;?></div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-12">Product Images :</label>
                    <br><br>
                    <div class="col-sm-3"> <img height='90px' width='90px' src="<?php echo base_url('assets/uploads/').$value->product_image1?>"/><br><strong>Product Image1</strong></div>
                     <div class="col-sm-3"> <img style="" height='90px' width='90px' src="<?php echo base_url('assets/uploads/').$value->product_image2?>"/><br><strong>Product Image2</strong></div>
                      <div class="col-sm-3"> <img style="" height='90px' width='90px' src="<?php echo base_url('assets/uploads/').$value->product_image3?>"/><br><strong>Product Image3</strong></div>
                       <div class="col-sm-3"> <img style="" height='90px' width='90px' src="<?php echo base_url('assets/uploads/').$value->product_image4?>"/><br><strong>Product Image4</strong></div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php
      }
        ?>
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


