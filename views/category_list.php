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
                      <a href="<?php echo base_url('category/addcategory/');?>"><button type="button" class="btn btn-block btn-primary" ><i class="fa fa-user-plus" aria-hidden="true"  ></i>Add Category</button></a>  

                     
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
                  <th>Super Category Name</th> 
                  <th>Category Name</th>    
                  <th>Category Description</th>                  
                  <th>Action</th>
                </tr>               
                  <?php
                  $sr = $start;    
                   foreach ($result as $row)
                      { 
                  ?>
                <tr>   
                  <td><?php echo $sr++; ?></td>
                  <td><?php echo $row->super_category_name; ?></td>
                  <td><?php echo $row->category_name; ?></td>
                  <td><?php echo $row->category_description; ?></td>
                  <td>    
                   <a href="<?php echo base_url('category/editcategory/'.base64_encode($row->category_id));?>">
                        <span class='glyphicon glyphicon-edit'>&nbsp;Edit</span>
                       </a>&nbsp;&nbsp;|&nbsp;&nbsp;
                   <a href="<?php echo base_url('category/delete/'.$row->category_id);?>"><span class='glyphicon glyphicon-trash'>&nbsp;Delete</span>
                       </a>
                  </td>        
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


