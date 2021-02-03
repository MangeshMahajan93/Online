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
              <h3 class="box-title">SUPER CATEGORY</h3>                  
            </div>
            
            <p><div class="form-group">
                    <div class="col-sm-1" style="float: right;">                      
                      <a href="<?php echo base_url('supercategory/super_categories/');?>"><button class="btn btn-block btn-primary" type="button" name="Back">Back</button></a>
                    </div>
                  </div>
                </p>
                <br>
            <!-- /.box-header -->
            <!-- form start -->
            <form name ="superCategoryForm" class="form-horizontal" action="<?php echo base_url('supercategory/addSuperCategory');?>" method="post">                    
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Super Category Name</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="supercategoryName" id="supercategoryName" placeholder="Enter Super Category Name" value="<?php echo @$_POST['supercategoryName']?>">
                      <span style="color:red"><?php echo form_error('supercategoryName');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Super Category Description</label>
                    <div class="col-sm-7">
                      <textarea name="supercategoryDescription" id="supercategoryDescription" rows="10" cols="80">
                      </textarea>
                       <span style="color:red"><?php echo form_error('supercategoryDescription');?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-2 control-label"></div>
                    <div class="col-sm-3">
                  <button type="submit" name="superCategorySubmit" value="SUBMIT" class="btn btn-block btn-primary">Submit</button> 

                     

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
 CKEDITOR.replace('supercategoryDescription');
 </script>
